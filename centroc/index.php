<?php
require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>
<?php
//PHP Goes Here!
?>
<div id="page-wrapper2">
	<!-- ##### Preloader ##### -->
	<div class="preloader d-flex align-items-center justify-content-center">
			<!-- Line -->
			<div class="line-preloader"></div>
	</div>

	<!-- ##### Hero Area Start ##### -->
	<section class="hero-area hero-post-slides owl-carousel">
			<!-- Single Hero Slide -->
			<div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(./users/images/bg-img/39.jpg);">
					<!-- Post Content -->
					<div class="container">
							<div class="row">
									<div class="col-12">
											<div class="hero-slides-content">
													<h2 data-animation="fadeInUp" data-delay="100ms">Construyendo la Esperanza</h2>
													<p data-animation="fadeInUp" data-delay="300ms">Aprende acerca de nuestra mision, nuestras creencias y la esperanza que ponemos en Cristo</p>
													<a href="users/contactus.php" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms">Contactanos</a>
											</div>
									</div>
							</div>
					</div>
			</div>

			<!-- Single Hero Slide -->
			<div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(./users/images/bg-img/37.jpg);">
					<!-- Post Content -->
					<div class="container">
							<div class="row">
									<div class="col-12">
											<div class="hero-slides-content">
													<h2 data-animation="fadeInUp" data-delay="100ms">Por Gracia de Dios</h2>
													<p data-animation="fadeInUp" data-delay="300ms">Aprende acerca de nuestra mision, nuestras creencias y la esperanza que ponemos en Cristo</p>
													<a href="users/contactus.php" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms">Contactanos</a>
											</div>
									</div>
							</div>
					</div>
			</div>
	</section>
	<!-- ##### Hero Area End ##### -->

	<!-- ##### About Area Start ##### -->
	<section class="about-area section-padding-100-0">
			<div class="container">
					<div class="row">
							<!-- Section Heading -->
							<div class="col-12">
									<div class="section-heading">
											<h2>Bienvenido</h2>
											<h3>Frente Cristiano del Zulia</h3>
											<div class="section_subtitle">El Poder del Servicio</div>
											<p>Cuando hagan cualquier trabajo, háganlo de todo corazón, como si estuvieran trabajando para el Señor y no para los seres humanos.<br> <b>Colosenses 3:23</b>
											</p>
									</div>
							</div>
					</div>

					<div class="row about-content justify-content-center">
							<!-- Single About Us Content -->
							<div class="col-12 col-md-6 col-lg-6">
									<div class="about-us-content mb-100">
										<div class="img-our">
											<img src="<?=$us_url_root?>users/images/bg-img/12.jpg" alt="">
										</div>

											<div class="about-text">
													<h4>Mision</h4>
													<p>Ser una entidad asesora del Gobierno en materias de índole religioso, que administra los programas
														de Ejecutivo hacia las Iglesias y garantiza con eficacia la igualdad de todas estas organizaciones ante
														el Estado.</p>
											</div>
									</div>
							</div>

							<!-- Single About Us Content -->
							<div class="col-12 col-md-6 col-lg-6">
									<div class="about-us-content mb-100">
										<div class="img-our">
											<img src="<?=$us_url_root?>users/images/bg-img/40.jpg" alt="">
										</div>
											<div class="about-text">
													<h4>Vision</h4>
													<p>Representar al Gobierno frente a todas las entidades religiosas del estado Zulia, con el fin de canalizar y responder las solicitudes o inquietudes que ellas presenten, así como asesorar al Ejecutivo en materias que se relacionen con el ejercicio igualitario de la Libertad de Culto en nuestro país.</p>
											</div>
									</div>
							</div>

					</div>
			</div>
	</section>
	<!-- ##### About Area End ##### -->
	<div class="section-padding-0-100">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container">
						<div class="section_image"><img src="<?=$us_url_root?>users/images/icon_box_1.png" alt=""></div>
						<div class="section_title"><h2>Nuestros Servicios</h2></div>
						<div class="section_subtitle">Dios nos ama a todos</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="causes_slider_container">

						<!-- Causes Slider -->
						<div class="owl-carousel owl-theme causes_slider">

							<!-- Causes Slider Item -->
							<div class="owl-item text-center causes_item">
								<div class="causes_item_image"><img src="<?=$us_url_root?>users/images/service1.jpg" alt=""></div>
								<div class="causes_item_title">Asesoria Legal</div>
							</div>

							<!-- Causes Slider Item -->
							<div class="owl-item text-center causes_item">
								<div class="causes_item_image"><img src="<?=$us_url_root?>users/images/service2.jpg" alt=""></div>
								<div class="causes_item_title">Asesoria Contable</div>
							</div>

							<!-- Causes Slider Item -->
							<div class="owl-item text-center causes_item">
								<div class="causes_item_image"><img src="<?=$us_url_root?>users/images/service3.jpg" alt=""></div>
								<div class="causes_item_title">Ayuda Psicologica</div>
							</div>

							<!-- Causes Slider Item -->
							<div class="owl-item text-center causes_item">
								<div class="causes_item_image"><img src="<?=$us_url_root?>users/images/service41.jpg" alt=""></div>
								<div class="causes_item_title">Recreacion</div>
							</div>

							<!-- Causes Slider Item -->
							<div class="owl-item text-center causes_item">
								<div class="causes_item_image"><img src="<?=$us_url_root?>users/images/service51.jpg" alt=""></div>
								<div class="causes_item_title">Logistica y Eventos</div>
							</div>

						</div>

						<div class="causes_slider_nav causes_slider_prev trans_200 d-flex flex-column align-items-center justify-content-center"><img src="<?=$us_url_root?>users/images/arrow_l.png" alt=""></div>
						<div class="causes_slider_nav causes_slider_next trans_200 d-flex flex-column align-items-center justify-content-center"><img src="<?=$us_url_root?>users/images/arrow_r.png" alt=""></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ##### Call To Action Area Start ##### -->
	<section class="call-to-action-area section-padding-100 bg-img bg-overlay" style="background-image: url(./users/images/bg-img/38.jpg)">
			<div class="container">
					<div class="row">
							<div class="col-12">
									<div class="call-to-action-content text-center">
											<h6>Un Lugar Para Ti</h6>
											<h2>Forma parte del grupo de iglesias, organizaciones y fundaciones que componen el Frente Cristiano del Zulia.</h2>
											<a href="users/join.php" class="btn crose-btn btn-2">EMPIEZA AQUI</a>
									</div>
							</div>
					</div>
			</div>
	</section>
	<!-- ##### Call To Action Area End ##### -->
</div> <!-- /.wrapper -->


	<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
