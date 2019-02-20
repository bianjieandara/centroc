<?php
require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';
if (!securePage($_SERVER['PHP_SELF'])){die();}
?>

<?php
//php goes here
?>

<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

			</div>
		</div>
	</div>
</div>


<?php require_once $abs_us_root.$us_url_root.'usersc/templates/'.$settings->template.'/container_close.php'; //custom template container ?>

<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'usersc/templates/'.$settings->template.'/footer.php'; //custom template footer?>
