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
													<a href="#" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms">Quienes somos</a>
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
													<a href="#" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms">Contactanos</a>
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
											<p>A church isn't a building—it's the people. We meet in locations around the United States and globally at Life.Church Online. No matter where you join us.</p>
									</div>
							</div>
					</div>

					<div class="row about-content justify-content-center">
							<!-- Single About Us Content -->
							<div class="col-12 col-md-6 col-lg-4">
									<div class="about-us-content mb-100">
											<img src="<?=$us_url_root?>users/images/bg-img/3.jpg" alt="">
											<div class="about-text">
													<h4>Our Church</h4>
													<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
													<a href="#">Read More <i class="fa fa-angle-double-right"></i></a>
											</div>
									</div>
							</div>

							<!-- Single About Us Content -->
							<div class="col-12 col-md-6 col-lg-4">
									<div class="about-us-content mb-100">
											<img src="<?=$us_url_root?>users/images/bg-img/4.jpg" alt="">
											<div class="about-text">
													<h4>Our History</h4>
													<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
													<a href="#">Read More <i class="fa fa-angle-double-right"></i></a>
											</div>
									</div>
							</div>

							<!-- Single About Us Content -->
							<div class="col-12 col-md-6 col-lg-4">
									<div class="about-us-content mb-100">
											<img src="<?=$us_url_root?>users/images/bg-img/5.jpg" alt="">
											<div class="about-text">
													<h4>Our Sermons</h4>
													<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
													<a href="#">Read More <i class="fa fa-angle-double-right"></i></a>
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
								<div class="causes_item_image"><img src="<?=$us_url_root?>users/images/causes_1.jpg" alt=""></div>
								<div class="causes_item_title">Children's aid</div>
								<div class="causes_item_text">
									<p>Praesent malesuada congue magna at finibus. In hac habitasse platea dictumst.</p>
								</div>
							</div>

							<!-- Causes Slider Item -->
							<div class="owl-item text-center causes_item">
								<div class="causes_item_image"><img src="<?=$us_url_root?>users/images/causes_2.jpg" alt=""></div>
								<div class="causes_item_title">Aid for the Elderly</div>
								<div class="causes_item_text">
									<p>Praesent malesuada congue magna at finibus. In hac habitasse platea dictumst.</p>
								</div>
							</div>

							<!-- Causes Slider Item -->
							<div class="owl-item text-center causes_item">
								<div class="causes_item_image"><img src="<?=$us_url_root?>users/images/causes_3.jpg" alt=""></div>
								<div class="causes_item_title">Community Food</div>
								<div class="causes_item_text">
									<p>Praesent malesuada congue magna at finibus. In hac habitasse platea dictumst.</p>
								</div>
							</div>

							<!-- Causes Slider Item -->
							<div class="owl-item text-center causes_item">
								<div class="causes_item_image"><img src="<?=$us_url_root?>users/images/causes_4.jpg" alt=""></div>
								<div class="causes_item_title">After School</div>
								<div class="causes_item_text">
									<p>Praesent malesuada congue magna at finibus. In hac habitasse platea dictumst.</p>
								</div>
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
											<a href="#" class="btn crose-btn btn-2">EMPIEZA AQUI</a>
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
