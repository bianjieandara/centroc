<?php
require_once '../users/init.php';
// dump($_SESSION);
// if($user->isLoggedIn()){
// 	dump("yes");
// }else{
// 	dump("no");
// }
// dump($user->data());
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';

if(!empty($_POST['uncloak'])){
	logger($user->data()->id,"Cloaking","Attempting Uncloak");
	if(isset($_SESSION['cloak_to'])){
		$to = $_SESSION['cloak_to'];
		$from = $_SESSION['cloak_from'];
		unset($_SESSION['cloak_to']);
		$_SESSION['user'] = $_SESSION['cloak_from'];
		unset($_SESSION['cloak_from']);
		logger($from,"Cloaking","uncloaked from ".$to);
		Redirect::to($us_url_root.'users/admin.php?view=users&err=You+are+now+you!');
		}else{
			Redirect::to($us_url_root.'users/logout.php?err=Something+went+wrong.+Please+login+again');
		}
}


//dealing with if the user is logged in
if($user->isLoggedIn() || !$user->isLoggedIn() && !checkMenu(2,$user->data()->id)){
	if (($settings->site_offline==1) && (!in_array($user->data()->id, $master_account)) && ($currentPage != 'login.php') && ($currentPage != 'maintenance.php')){
		$user->logout();
		logger($user->data()->id,"Errors","Sending to Maint");
		Redirect::to($us_url_root.'users/maintenance.php');
	}
}
$grav = get_gravatar(strtolower(trim($user->data()->email)));
$get_info_id = $user->data()->id;
// $groupname = ucfirst($loggedInUser->title);
$raw = date_parse($user->data()->join_date);
$raw2 = date_parse($user->data()->last_login);
$signupdate = $raw['day']."/".$raw['month']."/".$raw['year'];
$lastlogin = $raw2['day']."/".$raw2['month']."/".$raw2['year'];
$userdetails = fetchUserDetails(NULL, NULL, $get_info_id); //Fetch user details
?>

<div id="page-wrapper">
<div class="container">
<div class="well">
<div class="row">
	<div class="col-sm-12 col-md-3">

		<p><img src="<?=$grav; ?>" class="img-thumbnail" alt="Generic placeholder thumbnail"></p>
		<p><a href="../users/user_settings.php" class="btn crose-btn">Editar</a></p>
		<?php
		if($settings->twofa == 1){
		$twoQ = $db->query("select twoKey from users where id = ? and twoEnabled = 0", [$userdetails->id]);
		if($twoQ->count() > 0){ ?>
			<p><a class="btn btn-primary " href="../users/enable2fa.php" role="button">Manage 2 Factor Auth</a></p>
	<?php	} else { ?>
			<p><a class="btn btn-primary " href="../users/manage2fa.php" role="button">Manage 2 Factor Auth</a></p>
	<?php }} ?>
	<?php if($settings->session_manager==1) {?><p><a class="btn btn-primary " href="../users/manage_sessions.php" role="button">Manage Sessions</a></p><?php } ?>
	<?php if(isset($_SESSION['cloak_to'])){ ?>
		<form class="" action="account.php" method="post">
			<input type="submit" name="uncloak" value="Uncloak!" class='btn crose-btn'>
		</form><br>
		<?php }
		?>
	</div>
	<div class="col-sm-12 col-md-9">
		<h2><?=echousername($user->data()->id)?></h2>
		<p><?=ucfirst($user->data()->fname)." ".ucfirst($user->data()->lname)?></p>
		<p>Email: <?=ucfirst($user->data()->email)?></p>
		<p>Ultima Vez Conectado: <?=$lastlogin?></p>
		<p>Miembro Desde: <?=$signupdate?></p>
		<?php if($settings->session_manager==1) {?><p>Number of Active Sessions: <?=UserSessionCount()?> <sup><a class="nounderline" data-toggle="tooltip" title="Click the Manage Sessions button in the left sidebar for more information.">?</a></sup></p><?php } ?>
		<p>This is the private account page for your users. It can be whatever you want it to be; This code serves as a guide on how to use some of the built-in UserSpice functionality. </p>
	</div>
</div>
</div>

</div> <!-- /container -->

</div> <!-- /#page-wrapper -->

<!-- footers -->

<?php require_once $abs_us_root . $us_url_root . 'usersc/templates/' . $settings->template . '/footer.php'; //custom template footer ?>

<?php unset($_SESSION['last_confirm']); ?>
