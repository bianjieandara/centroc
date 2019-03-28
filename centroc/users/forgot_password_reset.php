<?php

require_once '../users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';

if (!securePage($_SERVER['PHP_SELF'])){die();}

if ($user->isLoggedIn()) $user->logout();
if(ipCheckBan()){Redirect::to($us_url_root.'usersc/scripts/banned.php');die();}
$error_message = null;
$errors = array();
$reset_password_success=FALSE;
$password_change_form=FALSE;


$token = Input::get('csrf');
if(Input::exists()){
	if(!Token::check($token)){
		include($abs_us_root.$us_url_root.'usersc/scripts/token_error.php');
	}
}

if(Input::get('reset') == 1){ //$_GET['reset'] is set when clicking the link in the password reset email.

	//display the reset form.
	$email = Input::get('email');
	$vericode = Input::get('vericode');
	$ruser = new User($email);
	if (Input::get('resetPassword')) {

		$validate = new Validate();
		$validation = $validate->check($_POST,array(
		'password' => array(
		  'display' => 'New Password',
		  'required' => true,
		  'min' => 6,
		),
		'confirm' => array(
		  'display' => 'Confirm Password',
		  'required' => true,
		  'matches' => 'password',
		),
		));
		if($validation->passed()){
			if($ruser->data()->vericode != $vericode || (strtotime($ruser->data()->vericode_expiry) - strtotime(date("Y-m-d H:i:s")) <= 0)){
				Redirect::to($us_url_root.'users/forgot_password_reset.php?err=Something+went+wrong.+Please+try+again.');
			}
			//update password
			$ruser->update(array(
			  'password' => password_hash(Input::get('password'), PASSWORD_BCRYPT, array('cost' => 12)),
			  'vericode' => randomstring(15),
				'vericode_expiry' => date("Y-m-d H:i:s"),
				'email_verified' => true,
				'force_pr' => 0,
			),$ruser->data()->id);
			$reset_password_success=TRUE;
			logger($ruser->data()->id,"User","Reset password.");
			if($settings->session_manager==1) {
				$passwordResetKillSessions=passwordResetKillSessions();
				if(is_numeric($passwordResetKillSessions)) {
					if($passwordResetKillSessions==1) $successes[] = "Successfully Killed 1 Session";
					if($passwordResetKillSessions >1) $successes[] = "Successfully Killed $passwordResetKillSessions Session";
				} else {
					$errors[] = "Failed to kill active sessions, Error: ".$passwordResetKillSessions;
				}
			}
		}else{
			$reset_password_success=FALSE;
			$errors = $validation->errors();
		}
	}
	if ($ruser->exists() && $ruser->data()->vericode == $vericode) {
		//if the user email is in DB and verification code is correct, show the form
		$password_change_form=TRUE;
	}
}

?>

<div id="page-wrapper">
<div class="container">

<?php
if ((Input::get('reset') == 1)){
	if($reset_password_success){
		require $abs_us_root.$us_url_root.'users/views/_forgot_password_reset_success.php';
	}elseif((!Input::get('resetPassword') || !$reset_password_success) && $password_change_form){
		require $abs_us_root.$us_url_root.'users/views/_forgot_password_reset.php';
	}else{
		require $abs_us_root.$us_url_root.'users/views/_forgot_password_reset_error.php';
	}
}else{
	require $abs_us_root.$us_url_root.'users/views/_forgot_password_reset_error.php';
}
?>

</div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- footer -->
<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
