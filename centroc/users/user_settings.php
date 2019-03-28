<?php
require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';

if (!securePage($_SERVER['PHP_SELF'])){die();}

//dealing with if the user is logged in
if($user->isLoggedIn() && !checkMenu(2,$user->data()->id)){
	if (($settings->site_offline==1) && (!in_array($user->data()->id, $master_account)) && ($currentPage != 'login.php') && ($currentPage != 'maintenance.php')){
		$user->logout();
		Redirect::to($us_url_root.'users/maintenance.php');
	}
}


$emailQ = $db->query("SELECT * FROM email");
$emailR = $emailQ->first();
// dump($emailR);
// dump($emailR->email_act);
//PHP Goes Here!
$errors=[];
$successes=[];
$userId = $user->data()->id;
$grav = get_gravatar(strtolower(trim($user->data()->email)));
$validation = new Validate();
$userdetails=$user->data();
//Temporary Success Message
$holdover = Input::get('success');
if($holdover == 'true'){
    bold("Account Updated");
}
//Forms posted
if(!empty($_POST)) {
    $token = $_POST['csrf'];
    if(!Token::check($token)){
				include($abs_us_root.$us_url_root.'usersc/scripts/token_error.php');
    }else {
        //Update display name
				//if (($settings->change_un == 0) || (($settings->change_un == 2) && ($user->data()->un_changed == 1)))
        $displayname = Input::get("username");
        if ($userdetails->username != $displayname && ($settings->change_un == 1 || (($settings->change_un == 2) && ($user->data()->un_changed == 0)))){
            $fields=array(
                'username'=>$displayname,
                'un_changed' => 1,
            );
            $validation->check($_POST,array(
                'username' => array(
                    'display' => 'Username',
                    'required' => true,
                    'unique_update' => 'users,'.$userId,
										'min' => $settings->min_un,
					          'max' => $settings->max_un
                )
            ));
            if($validation->passed()){
                if(($settings->change_un == 2) && ($user->data()->un_changed == 1)){
                    Redirect::to($us_url_root.'users/user_settings.php?err=Username+has+already+been+changed+once.');
                }
                $db->update('users',$userId,$fields);
                $successes[]="Username updated.";
								logger($user->data()->id,"User","Changed username from $userdetails->username to $displayname.");
            }else{
                //validation did not pass
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
            }
        }else{
            $displayname=$userdetails->username;
        }
        //Update first name
        $fname = ucfirst(Input::get("fname"));
        if ($userdetails->fname != $fname){
            $fields=array('fname'=>$fname);
            $validation->check($_POST,array(
                'fname' => array(
                    'display' => 'First Name',
                    'required' => true,
                    'min' => 1,
                    'max' => 25
                )
            ));
            if($validation->passed()){
                $db->update('users',$userId,$fields);
                $successes[]='First name updated.';
								logger($user->data()->id,"User","Changed fname from $userdetails->fname to $fname.");
            }else{
                //validation did not pass
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
            }
        }else{
            $fname=$userdetails->fname;
        }
        //Update last name
        $lname = ucfirst(Input::get("lname"));
        if ($userdetails->lname != $lname){
            $fields=array('lname'=>$lname);
            $validation->check($_POST,array(
                'lname' => array(
                    'display' => 'Last Name',
                    'required' => true,
                    'min' => 1,
                    'max' => 25
                )
            ));
            if($validation->passed()){
                $db->update('users',$userId,$fields);
                $successes[]='Last name updated.';
								logger($user->data()->id,"User","Changed lname from $userdetails->lname to $lname.");
            }else{
                //validation did not pass
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
            }
        }else{
            $lname=$userdetails->lname;
        }
				if(!empty($_POST['password']) || $userdetails->email != $_POST['email'] || !empty($_POST['resetPin'])) {
				//Check password for email or pw update
				if (is_null($userdetails->password) || password_verify(Input::get('old'),$user->data()->password)) {
        //Update email
        $email = Input::get("email");
        if ($userdetails->email != $email){
						$confemail = Input::get("confemail");
            $fields=array('email'=>$email);
            $validation->check($_POST,array(
                'email' => array(
                    'display' => 'Email',
                    'required' => true,
                    'valid_email' => true,
                    'unique_update' => 'users,'.$userId,
                    'min' => 3,
                    'max' => 75
                )
            ));
            if($validation->passed()){
							if($confemail == $email) {
                if($emailR->email_act==0){$db->update('users',$userId,$fields); $successes[]='Email updated.'; logger($user->data()->id,"User","Changed email from $userdetails->email to $email."); }
                if($emailR->email_act==1){
									$vericode=randomstring(15);
				          $vericode_expiry=date("Y-m-d H:i:s",strtotime("+$settings->join_vericode_expiry hours",strtotime(date("Y-m-d H:i:s"))));
				          $db->update('users',$userId,['email_new'=>$email,'vericode' => $vericode,'vericode_expiry' => $vericode_expiry]);
										//Send the email
										$options = array(
				              'fname' => $user->data()->fname,
				              'email' => rawurlencode($user->data()->email),
				              'vericode' => $vericode,
											'join_vericode_expiry' => $settings->join_vericode_expiry
				            );
				            $encoded_email=rawurlencode($email);
				            $subject = 'Verify Your Email';
				            $body =  email_body('_email_template_verify_new.php',$options);
				            $email_sent=email($email,$subject,$body);
				            if(!$email_sent) $errors[] = 'Email NOT sent due to error. Please contact site administrator.';
										else $successes[]="Email request received. Please check your email to perform verification. Be sure to check your Spam and Junk folder as the verification link expires in $settings->join_vericode_expiry hours.";
										if($emailR->email_act==1) logger($user->data()->id,"User","Requested change email from $userdetails->email to $email. Verification email sent.");
                }
          }
					else $errors[] = "Your email did not match.";
				 }else{
                //validation did not pass
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
            }
        }else{
            $email=$userdetails->email;
        }
        if(!empty($_POST['password'])) {
            $validation->check($_POST,array(
                'password' => array(
                    'display' => 'New Password',
                    'required' => true,
                    'min' => $settings->min_pw,
                'max' => $settings->max_pw,
                ),
                'confirm' => array(
                    'display' => 'Confirm New Password',
                    'required' => true,
                    'matches' => 'password',
                ),
            ));
            foreach ($validation->errors() as $error) {
                $errors[] = $error;
            }
            if (empty($errors) && Input::get('old')!=Input::get('password')) {
                //process
                $new_password_hash = password_hash(Input::get('password'),PASSWORD_BCRYPT,array('cost' => 12));
                $user->update(array('password' => $new_password_hash,'force_pr' => 0,'vericode' => randomstring(15),),$user->data()->id);
                $successes[]='Password updated.';
								logger($user->data()->id,"User","Updated password.");
								if($settings->session_manager==1) {
									$passwordResetKillSessions=passwordResetKillSessions();
									if(is_numeric($passwordResetKillSessions)) {
										if($passwordResetKillSessions==1) $successes[] = "Successfully Killed 1 Session";
										if($passwordResetKillSessions >1) $successes[] = "Successfully Killed $passwordResetKillSessions Session";
									} else {
										$errors[] = "Failed to kill active sessions, Error: ".$passwordResetKillSessions;
									}
								}
            } else {
							if(Input::get('old')==Input::get('password')) {
								$errors[] = "Your old password cannot be the same as your new";
							}
						}
        }
			if(!empty($_POST['resetPin']) && Input::get('resetPin')==1) {
				$user->update(['pin'=>NULL]);
				logger($user->data()->id,"User","Reset PIN");
				$successes[]='Reset PIN';
				$successes[]='You can set a new PIN the next time you require verification';
			}
    }
	else {
		$errors[]="Current password verification failed. Update failed. Please try again.";
		}
	}
 }
}
// mod to allow edited values to be shown in form after update
$user2 = new User();
$userdetails=$user2->data();
?>
<div id="page-wrapper">
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-sm-12 col-md-2">
                    <p><img src="<?=$grav; ?>" class="img-thumbnail" alt="Generic placeholder thumbnail"></p>
                </div>
                <div class="col-sm-12 col-md-8">
                    <h2>Modifica tus Datos</h2>
                    <strong>Quieres cambiar tu foto de perfil? </strong><br> Visita <a href="https://en.gravatar.com/">https://en.gravatar.com/</a> y crea una cuenta con este correo electronico <?=$userdetails->email?>. Funciona en millones de sitios. Es rapido y facil!<br>
                    <?php if(!$errors=='') {?><div class="alert alert-danger"><?=display_errors($errors);?></div><?php } ?>
                    <?php if(!$successes=='') {?><div class="alert alert-success"><?=display_successes($successes);?></div><?php } ?>

                    <form name='updateAccount' action='user_settings.php' method='post'>


                        <div class="form-group">
                            <label>Nombre</label>
                            <input  class='form-control' type='text' name='fname' value='<?=$userdetails->fname?>' autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <label>Apellido</label>
                            <input  class='form-control' type='text' name='lname' value='<?=$userdetails->lname?>' autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class='form-control' type='text' name='email' value='<?=$userdetails->email?>' autocomplete="off" />
														<?php if(!IS_NULL($userdetails->email_new)) {?><br /><div class="alert alert-danger">
															<p><strong>Advertencia</strong> hay una peticion pendiente para cambiar su email a <?=$userdetails->email_new?>.</p>
                              <p>Un email de verificacion fue enviado a su correo</p>
                              <p>Si necesita que se le envie de nuevo, Por favor ingrese de nuevo el correo en el formulario y envielo de nuevo.</p>
														</div><?php } ?>
                        </div>

												<div class="form-group">
                            <label>Confirmar Email</label>
                            <input class='form-control' type='text' name='confemail' autocomplete="off" />
                        </div>

												<div class="form-group">
												<label>Nueva Contraseña</label>
	                      <div class="input-group" data-container="body">
	                        <span class="btn btn-secondary input-group-addon password_view_control" id="addon1"><span class="fa fa-eye"></span></span>
	                        <input  class="form-control" type="password" autocomplete="off" name="password" id="password" aria-describedby="passwordhelp" autocomplete="off">
													<span class="btn btn-secondary input-group-addon" id="addon2" data-container="body" data-toggle="tooltip" data-placement="top" title="<?=$settings->min_pw?> caracteres minimo, <?=$settings->max_pw?> maximo.">?</span>
	                      </div></div>

	                      <div class="form-group">
													<label>Confirmar Contraseña</label>
	                      <div class="input-group" data-container="body">
	                        <span class="btn btn-secondary input-group-addon password_view_control" id="addon3"><span class="fa fa-eye"></span></span>
	                        <input  type="password" autocomplete="off" id="confirm" name="confirm" class="form-control" autocomplete="off">
	                       <span class="btn btn-secondary input-group-addon" id="addon4" data-container="body" data-toggle="tooltip" data-placement="top" title="Debe coincidir con la Nueva Contraseña">?</span>
											 </div></div>

											 <?php if(!is_null($userdetails->pin)) {?>
												 <div class="form-group">
													 <label>Resetear PIN
													 <input  type="checkbox" id="resetPin" name="resetPin" value="1" /></label>
													</div>
												<?php } ?>

											 <div class="form-group">
													 <label>Contraseña Actual<?php if(!is_null($userdetails->password)) {?>, se requiere para cambiar la Contraseña o el Email<?php } ?></label>
													 <div class="input-group" data-container="body">
														 <span class="btn btn-secondary input-group-addon password_view_control" id="addon6"><span class="fa fa-eye"></span></span>
														 <input class='form-control' type='password' id="old" name='old' <?php if(is_null($userdetails->password)) {?>disabled<?php } ?> autocomplete="off" />
														 <span class="btn btn-secondary input-group-addon" id="addon5" data-container="body" data-toggle="tooltip" data-placement="top" title="Requerido para cambiar la Contraseña">?</span>
													 </div>
											 </div>

                        <input type="hidden" name="csrf" value="<?=Token::generate();?>" />

                        <p><input class='btn crose-btn' type='submit' value='Actualizar' class='submit' /><a class="btn crose-btn pull-right" href="../users/account.php">Cancelar</a></p>


                    </form>
                    <?php
                    if(isset($user->data()->oauth_provider) && $user->data()->oauth_provider != null){
                        echo "<strong>NOTE:</strong> If you originally signed up with your Google/Facebook account, you will need to use the forgot password link to change your password...unless you're really good at guessing.";
                    }
                    ?>
                </div>
            </div>
        </div>


    </div> <!-- /container -->

</div> <!-- /#page-wrapper -->


<!-- footers -->
<?php require_once $abs_us_root . $us_url_root . 'usersc/templates/' . $settings->template . '/container_close.php'; //custom template container    ?>

<?php require_once $abs_us_root . $us_url_root . 'users/includes/page_footer.php'; ?>

<!-- Place any per-page javascript here -->
<script type="text/javascript">
		$(document).ready(function(){
				$('.password_view_control').hover(function () {
						$('#old').attr('type', 'text');
						$('#password').attr('type', 'text');
						$('#confirm').attr('type', 'text');
				}, function () {
						$('#old').attr('type', 'password');
						$('#password').attr('type', 'password');
						$('#confirm').attr('type', 'password');
				});
		});
		$(function () {
			$('[data-toggle="popover"]').popover()
		})
		$('.pwpopover').popover();
		$('.pwpopover').on('click', function (e) {
				$('.pwpopover').not(this).popover('hide');
		});
</script>

<?php require_once $abs_us_root . $us_url_root . 'usersc/templates/' . $settings->template . '/footer.php'; //custom template footer ?>
