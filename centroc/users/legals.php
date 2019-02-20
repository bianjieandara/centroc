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

	<!-- ##### Breadcrumb Area Start ##### -->
	<div class="breadcrumb-area">
			<div class="container">
					<div class="row">
							<div class="col-12">
									<nav aria-label="breadcrumb">
											<ol class="breadcrumb">
													<li class="breadcrumb-item"><a href="<?=$us_url_root?>">Inicio</a></li>
													<li class="breadcrumb-item active" aria-current="page">Asesoria Legal</li>
											</ol>
									</nav>
							</div>
					</div>
			</div>
	</div>
	<!-- ##### Breadcrumb Area End ##### -->
	<!-- ##### Why Choose Us Area Start ##### -->
	<div class="why-choose-us">
			<div class="container">
					<div class="row">
							<!-- Section Heading -->
							<div class="col-12">
									<div class="section-heading">
											<h2>Asesoria Legal</h2>
											<p>Loaded with fast-paced worship, activities, and video teachings to address real issues that students face each day</p>
									</div>
							</div>
					</div>

					<div class="row justify-content-center">
							<!-- Single Why Choose Area -->
							<div class="col-12 col-sm-6 col-lg-3">
									<div class="single-why-choose-us mb-100">
											<img src="images/core-img/why1.png" alt="">
											<h4>Asesoría para la Elaboración <br>	 Actas de Asamblea General</h4>
									</div>
							</div>
							<!-- Single Why Choose Area -->
							<div class="col-12 col-sm-6 col-lg-3">
									<div class="single-why-choose-us mb-100">
											<img src="images/core-img/why2.png" alt="">
											<h4>Visto Bueno</h4>
											</div>
							</div>
							<!-- Single Why Choose Area -->
							<div class="col-12 col-sm-6 col-lg-3">
									<div class="single-why-choose-us mb-100">
											<img src="images/core-img/why3.png" alt="">
											<h4>Asesoría para Elaboración <br>de Actas Constitutivas</h4>
											</div>
							</div>
							<!-- Single Why Choose Area -->
							<div class="col-12 col-sm-6 col-lg-3">
									<div class="single-why-choose-us mb-100">
											<img src="images/core-img/why2.png" alt="">
											<h4>Inscripción a Culto</h4>
									</div>
							</div>
					</div>
			</div>
	</div>
	<!-- ##### Why Choose Us Area End ##### -->
<div class="bg-gray section-padding-80">
	<div class="container">
		<div class="col-md-6">
			<h3>Practice Center</h3>
				<p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis
				natoque penatibus et magnis dis parturient montes, nascetur ridicu-lus mus. Nulla dui. Fusce feugiat malesuada odio</p>
				<p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis
				natoque penatibus et magnis dis parturient montes, nascetur ridicu-lus mus. Nulla dui. Fusce feugiat malesuada odio</p>
				<p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta.</p><br>
				<div class="text-center">
				<a href="dates_form.php?view=legals" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i> SOLICITA TU CITA</a>
				</div>

		</div>
		<div class="col-md-6">
			<h3>Requisitos</h3>
				<ul>
					<li>Actas constitutiva de la Iglesia (Visado por un Abogado)</li>
					<li>Conformación de la Junta Directiva (miembros 3 o mas personas que sean numero impar)</li>
					<li>Dos copias de Cedula de Identidad y del RIF de cada uno de los miembros de la Junta Directiva</li>
					<li>Original y Copia de la carta de residencia emitida por el CNE de cada uno de los miembros de la Junta Directiva</li>
					<li>Original y copia de la Constancia de funcionamiento de la Iglesia emitida por el Consejo Comunal indicando el tiempo de funcionamiento, nombre y cedula del pastor o de la pastora, encargado o encargada</li>
					<li>Dos copias Contrato de Arrendamiento de local donde funciona la iglesia o en su defecto constancia de propiedad o carta de ocupación pacifica de tierra emanada por el Consejo Comunal</li>
					<li>Dos copias de la Constancia de Estudios Teológicos o Constancia de Ministro de Culto del Pastor Principal</li>
					<li>Dos fotos tipo carnet del Pastor Principal</li>
					<li>Doce Hojas blancas tipo oficio</li>
					<li>Quince Hojas blancas tipo oficio</li>
					<li>Dos carpetas marrones tipo oficio</li>
					<li>Un juego de Separadores de colores</li>
				</ul>
		</div>
	</div>
</div>

</div> <!-- /.wrapper -->


	<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
