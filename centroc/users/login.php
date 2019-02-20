<?php
ini_set("allow_url_fopen", 1);
if(isset($_SESSION)){session_destroy();}
require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';

if($settings->twofa == 1){
  $google2fa = new PragmaRX\Google2FA\Google2FA();
}
?>
<?php
if(ipCheckBan()){Redirect::to($us_url_root.'usersc/scripts/banned.php');die();}
$errors = [];
$successes = [];
if (@$_REQUEST['err']) $errors[] = $_REQUEST['err']; // allow redirects to display a message
$reCaptchaValid=FALSE;
if($user->isLoggedIn()) Redirect::to($us_url_root.'index.php');

if (Input::exists()) {
  $token = Input::get('csrf');
  if(!Token::check($token)){
    include($abs_us_root.$us_url_root.'usersc/scripts/token_error.php');
  }
  //Check to see if recaptcha is enabled
  if($settings->recaptcha == 1){
    //require_once $abs_us_root.$us_url_root.'users/includes/recaptcha.config.php';

    //reCAPTCHA 2.0 check
    $response = null;

    // check secret key
    $reCaptcha = new \ReCaptcha\ReCaptcha($settings->recap_private);

    // if submitted check response
    if ($_POST["g-recaptcha-response"]) {
      $response = $reCaptcha->verify($_POST["g-recaptcha-response"],$_SERVER["REMOTE_ADDR"]);
    }
    if ($response != null && $response->isSuccess()) {
      $reCaptchaValid=TRUE;
    }else{
      $reCaptchaValid=FALSE;
      $errors[] = 'reCaptcha check failed, please contact the Administrator';
      $reCapErrors = $response->getErrorCodes();
      foreach($reCapErrors as $error) {
        logger(1,"Recapatcha","Error with reCaptcha: ".$error);
      }
    }
  }else{
    $reCaptchaValid=TRUE;
  }

  if($reCaptchaValid || $settings->recaptcha == 0){ //if recaptcha valid or recaptcha disabled

    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'username' => array('display' => 'Username','required' => true),
      'password' => array('display' => 'Password', 'required' => true)));

      if ($validation->passed()) {
        //Log user in
        $remember = (Input::get('remember') === 'on') ? true : false;
        $user = new User();
        $login = $user->loginEmail(Input::get('username'), trim(Input::get('password')), $remember);
        if ($login) {
          $dest = sanitizedDest('dest');
          $twoQ = $db->query("select twoKey from users where id = ? and twoEnabled = 1",[$user->data()->id]);
          if($twoQ->count()>0) {
            $_SESSION['twofa']=1;
            if(!empty($dest)) {
              $page=encodeURIComponent(Input::get('redirect'));
              logger($user->data()->id,"Two FA","Two FA being requested.");
              Redirect::to($us_url_root.'users/twofa.php?dest='.$dest.'&redirect='.$page); }
              else Redirect::To($us_url_root.'users/twofa.php');
            } else {
              # if user was attempting to get to a page before login, go there
              $_SESSION['last_confirm']=date("Y-m-d H:i:s");

              //check for need to reAck terms of service
              if($settings->show_tos == 1){
                if($user->data()->oauth_tos_accepted == 0){
                  Redirect::to($us_url_root.'usersc/includes/user_agreement_acknowledge.php');
                }
              }

              if (!empty($dest)) {
                $redirect=htmlspecialchars_decode(Input::get('redirect'));
                if(!empty($redirect) || $redirect!=='') Redirect::to($redirect);
                else Redirect::to($dest);
              } elseif (file_exists($abs_us_root.$us_url_root.'usersc/scripts/custom_login_script.php')) {

                # if site has custom login script, use it
                # Note that the custom_login_script.php normally contains a Redirect::to() call
                require_once $abs_us_root.$us_url_root.'usersc/scripts/custom_login_script.php';
              } else {
                if (($dest = Config::get('homepage')) ||
                ($dest = 'account.php')) {
                  #echo "DEBUG: dest=$dest<br />\n";
                  #die;
                  Redirect::to($dest);
                }
              }
            }
          } else {
            $errors[] = '<strong>Error</strong>. Por favor verifica tu usuario y contraseña e intenta otra vez.';
          }
        }
      }
    }
    if (empty($dest = sanitizedDest('dest'))) {
      $dest = '';
    }
    ?>
    <div id="page-wrapper">

      <div class="breadcrumb-area">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?=$us_url_root?>">Inicio</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Ingresa</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <div class="container">
        <?=resultBlock($errors,$successes);?>
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <?php

            if($settings->glogin==1 && !$user->isLoggedIn()){
              require_once $abs_us_root.$us_url_root.'users/includes/google_oauth_login.php';
            }
            if($settings->fblogin==1 && !$user->isLoggedIn()){
              require_once $abs_us_root.$us_url_root.'users/includes/facebook_oauth.php';
            }
            ?>
            <form name="login" id="login-form" class="form-signin" action="login.php" method="post">
              <h2 class="form-signin-heading"><?=lang("SIGNIN_TITLE","");?></h2>
              <input type="hidden" name="dest" value="<?= $dest ?>" />

              <div class="form-group">
                <label for="username">Usuario o Email</label>
                <input  class="form-control" type="text" name="username" id="username" placeholder="Usuario/Email" required autofocus autocomplete="username">
              </div>

              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control"  name="password" id="password"  placeholder="Contraseña" required autocomplete="current-password">
              </div>

              <div class="form-group">
                <label for="remember">
                  <input type="checkbox" name="remember" id="remember" >Recuerdame</label>
                </div>

            <div class="form-group text-center">
                <input type="hidden" name="csrf" value="<?=Token::generate(); ?>">
                <input type="hidden" name="redirect" value="<?=Input::get('redirect')?>" />
                <button class="submit btn crose-btn" id="next_button" type="submit"><?=lang("SIGNIN_BUTTONTEXT","");?></button>
            </div>
                <?php
                if($settings->recaptcha == 1){
                  ?>
                  <div class="g-recaptcha" data-sitekey="<?=$settings->recap_public; ?>" data-bind="next_button" data-callback="submitForm"></div>
                <?php } ?>
              </form>
              <div class="row">
                <div class="col-sm-6"><br>
                  <a class="pull-left" href='../users/forgot_password.php'>Olvide Contraseña</a><br><br>
                </div>
                <?php if($settings->registration==1) {?>
                  <div class="col-sm-6"><br>
                    <a class="pull-right" href='../users/join.php'><?=lang("SIGNUP_TEXT","");?></a><br><br>
                  </div><?php } ?>
                </div>
            </div>
          </div>

        </div>
      </div>

        <?php require_once $abs_us_root.$us_url_root.'usersc/templates/'.$settings->template.'/container_close.php'; //custom template container ?>

        <!-- footers -->
        <?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

        <!-- Place any per-page javascript here -->

        <?php   if($settings->recaptcha == 1){ ?>
          <script src="https://www.google.com/recaptcha/api.js" async defer></script>
          <script>
          function submitForm() {
            document.getElementById("login-form").submit();
          }
          </script>
        <?php } ?>
        <?php require_once $abs_us_root.$us_url_root.'usersc/templates/'.$settings->template.'/footer.php'; //custom template footer?>
