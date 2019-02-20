<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
require_once 'server.php';

$view = Input::get('view');
$categories = false;
$info1 = false;
$population = false;
$support = false;
switch ($view) {
	case "legals":
		$page = 'legals.php';
		$button = 'legals';
		$breadcrumb = 'Asesoria Legal';
		$categories = true;
		break;
	case "accounting":
		$page = 'accounting.php';
		$button = 'accounting';
		$breadcrumb = 'Asesoria Contable';
		break;
	case "psychological":
		$page = 'psychological.php';
		$button = 'psychological';
		$breadcrumb = 'Consultas Psicologicas';
		break;
	case "recreation":
		$page = 'recreation.php';
		$button = 'recreation';
		$breadcrumb = 'Recreacion';
		$info1 = true;
	 $population = true;
		break;
	case "events":
		$page = 'events.php';
		$button = 'events';
		$breadcrumb = 'Logistica y Eventos';
		$info1 = true;
		$population = true;
		$support = true;
		break;

	}

?>

<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>
<?php
//PHP Goes Here!
?>
<div id="page-wrapper">
<div class="breadcrumb-area">
			<div class="container">
					<div class="row">
							<div class="col-12">
									<nav aria-label="breadcrumb">
											<ol class="breadcrumb">
													<li class="breadcrumb-item"><a href="<?=$us_url_root?>">Inicio</a></li>
													<li class="breadcrumb-item"><a href="<?=$us_url_root?>users/<?=$page?>"><?=$breadcrumb?></a></li>
													<li class="breadcrumb-item active" aria-current="page">Solicitar Cita</li>
											</ol>
									</nav>
							</div>
					</div>
			</div>
</div>
<section class="section-padding-80-0">
	<div class="container">
	<div class="row align-items-md-center">
		<div class="col-md-7 pd-r-75">
		<form class="consult-form py-5" action="dates_form.php?view=<?=$button?>" method="POST">
				<div class="row">
					<div class="errors">
						<?php include('errors.php') ?>
					</div>
				<h4 class="success"><?php echo $sucess ?></h4>
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label for="#">Nombre</label>
						<input class="form-control" type="text" placeholder="Nombre" name="name" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label for="#">Fecha</label>
						<div class="form-field">
							<input class="form-control" type="text" name="date_legals" placeholder="Seleccione Dia" required>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label for="#">Telefono</label>
						<input class="form-control" type="text" placeholder="0412-1234567" name="tlf" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label for="#">Email</label>
						<input class="form-control" type="email" placeholder="Email" name="email" required>
					</div>
				</div>

				<?php if($info1) {
					include($abs_us_root.$us_url_root.'users/views/_info1_form.php');
				}?>

				<div class="col-md-6">
				<div class="form-group mb-4">
					<label for="#">Le gustaria ser contactado via:</label>
					<div class="form-field">
						<div class="select-wrap">
							<div class="icon"><span class="ion-ios-arrow-down"></span></div>
								<select class="form-control" name="contact" required>
									<option value="T">Telefonica</option>
									<option value="E">Email</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<?php if($support) {
					include($abs_us_root.$us_url_root.'users/views/_support_form.php');
				}?>
				<?php if($population) {
					include($abs_us_root.$us_url_root.'users/views/_population_form.php');
				}?>
				<?php if($categories) {
					include($abs_us_root.$us_url_root.'users/views/_categories_form.php');
				}?>

				<div class="col-md-12">
				<div class="form-group mb-4">
				<label for="#">Mensaje</label>
				<textarea class="form-control form-control-2 d-flex align-items-center" placeholder="Mensaje" rows="7" cols="30" name="message" required></textarea>
				</div>
				</div>
				<div class="col-md-12">
				<div class="form-group mb-4">
				<input class="btn crose-btn fa fa-input" type="submit" value="&#xf073 &nbsp;SOLICITAR" name="request_<?=$button?>">
				</div>
				</div>
				</div>
		</form>
	</div>
	<div class="col-md-5 wrap-about pb-5 ftco-animate fadeInUp ftco-animated">
		<div class="heading-section mb-md-5 pl-md-5 mt-md-5 pt-3">
			<div class="pl-md-3">
				<h2 class="mb-4">Make An Appointment</h2>
			</div>
		</div>
		<div class="pl-md-3">
			<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
		</div>
		</div>
	</div>
	</div>
</section>

</div> <!-- /.wrapper -->


	<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>

<script type="text/javascript">
window.addEventListener('DOMContentLoaded', function()
{
	var $myDatepicker = document.querySelector('input[name="date_legals"]');
	$today = new Date();

	$myDatepicker.DatePickerX.init({
		mondayFirst      : true,
		format           : 'yyyy/mm/dd',
		minDate          : $today,
		maxDate          : new Date($today.getFullYear()+2, 11, 31),
		weekDayLabels    : ['Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
		shortMonthLabels : ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		singleMonthLabels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		todayButton      : true,
		todayButtonLabel : 'Hoy',
		clearButton      : true,
		clearButtonLabel : 'Borrar'
	});

});
</script>
