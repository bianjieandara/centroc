<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
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
													<li class="breadcrumb-item active" aria-current="page">Consultas Psicologicas</li>
											</ol>
									</nav>
							</div>
					</div>
			</div>
	</div>

	<div class="">
			<div class="container">
					<div class="row">
							<!-- Section Heading -->
							<div class="col-12">
									<div class="section-heading">
											<h2>Consultas Psicologicas</h2>
											<p>Loaded with fast-paced worship, activities, and video teachings to address real issues that students face each day</p>
									</div>
							</div>
					</div>
			</div>
	</div>
	<!-- ##### Why Choose Us Area End ##### -->
<div class="bg-gray section-padding-80">
	<div class="container">
		<div class="col-md-7">
			<h3>Practice Center</h3>
				<p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis
				natoque penatibus et magnis dis parturient montes, nascetur ridicu-lus mus. Nulla dui. Fusce feugiat malesuada odio</p>
				<p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis
				natoque penatibus et magnis dis parturient montes, nascetur ridicu-lus mus. Nulla dui. Fusce feugiat malesuada odio</p>
				<p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta.</p>
				<br>
				<div class="text-center">
				<a href="dates_form.php?view=psychological" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i> SOLICITA TU CITA</a>
				</div>

		</div>
		<div class="col-md-1">
		</div>
		<div class="col-md-4">
			<h3>Requisitos</h3>
				<ul>
					<li>Cédula de identidad laminada.</li>
					<li>Menores de Edad:</li>
						<ul>
							<li>Partida de nacimiento.</li>
							<li>Presencia y acompañamiento de algún padre, representante o responsable.</li>
						</ul>
				</ul>
		</div>
	</div>
</div>
</div> <!-- /.wrapper -->


	<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
