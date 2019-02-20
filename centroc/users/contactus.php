<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>
<?php
if(isset($_POST['contact-form'])){
      $name = $_POST['name']; // required
      $email = $_POST['email']; // required
      $tlf = $_POST['tlf']; // required
      $message = $_POST['message']; // required

      $error_message = "";
      $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email)) {
      $error_message .= 'La dirrecion de correo que ingreso no es valida...<br />';
    }

      $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$name)) {
      $error_message .= 'El nombre que ingreso no es valido...<br />';
    }

    if(strlen($message) < 2) {
      $error_message .= 'El mensaje que ingreso no es valido....<br />';
    }

    if(strlen($error_message) > 0) {
      died($error_message);
    }
      $subject="Formulario de Contacto";
      $email_message = "Detalles del formulario:\n\n";


      function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
      }



      $email_message .= "Nombre: ".clean_string($name)."\n";
      $email_message .= "Email: ".clean_string($email)."\n";
      $email_message .= "Telefono: ".clean_string($tlf)."\n";
      $email_message .= "Mensaje: ".clean_string($message)."\n";

      $to = "bianjieandara@gmail.com";

      $mail_result=email($to,$subject,$email_message);
      if($mail_result){
            echo '<div class="toast__container">
            <div class="toast__cell">
            <div class="toast toast--green">
              <div class="toast__icon">
                <svg version="1.1" class="toast__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g><g><path d="M504.502,75.496c-9.997-9.998-26.205-9.998-36.204,0L161.594,382.203L43.702,264.311c-9.997-9.998-26.205-9.997-36.204,0    c-9.998,9.997-9.998,26.205,0,36.203l135.994,135.992c9.994,9.997,26.214,9.99,36.204,0L504.502,111.7    C514.5,101.703,514.499,85.494,504.502,75.496z"></path>
            	</g></g>
                </svg>
              </div>
              <div class="toast__content">
                <p class="toast__type">Se ha enviado exitosamente</p>
                <p class="toast__message">Gracias por escribirnos. Te contactaremos lo mas pronto posible.</p>
              </div>
              <div class="toast__close">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.642 15.642" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 15.642 15.642">
                <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
                </svg>
              </div>

            </div>
            </div>
            </div>';
      }else{
            echo '<div class="toast__container">
            <div class="toast__cell">
            <div class="toast toast--yellow add-margin">
            <div class="toast__icon">
            <svg version="1.1" class="toast__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 301.691 301.691" style="enable-background:new 0 0 301.691 301.691;" xml:space="preserve">
            <g>
            	<polygon points="119.151,0 129.6,218.406 172.06,218.406 182.54,0  "></polygon>
            	<rect x="130.563" y="261.168" width="40.525" height="40.523"></rect>
            </g>
                </svg>
              </div>
              <div class="toast__content">
                <p class="toast__type">Error al Enviar</p>
                <p class="toast__message">Ha ocurrido un error al intentar enviar su correo.</p>
              </div>
              <div class="toast__close">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.642 15.642" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 15.642 15.642">
              <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
            </svg>
            </div>
            </div>
            </div>
            </div>';
      }

}
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
													<li class="breadcrumb-item active" aria-current="page">Contactanos</li>
											</ol>
									</nav>
							</div>
					</div>
			</div>
	</div>
	<!-- ##### Breadcrumb Area End ##### -->
  <!-- ##### Google Maps Start ##### -->
  <div class="map-area mt-30">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d490.265477655329!2d-71.6175342!3d10.5694826!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1349656d9619219a!2sConsejo+Municipal+San+Francisco!5e0!3m2!1ses-419!2sve!4v1550539223418" allowfullscreen></iframe>
  </div>



  <!-- ##### Google Maps End ##### -->

  <!-- ##### Contact Area Start ##### -->
  <section class="contact-area">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="contact-content-area">
                      <div class="row">
                          <div class="col-12 col-md-4">
                              <div class="contact-content contact-information">
                                  <h4>Contacto</h4>
                                  <p>info.deercreative@gmail.com</p>
                                  <p>(+12) 345 - 678 - 1000</p>
                              </div>
                          </div>
                          <div class="col-12 col-md-4">
                              <div class="contact-content contact-information">
                                  <h4>Direccion</h4>
                                  <p>Consejo Municipal de San Francisco</p>
                                  <p>Avenida San Francisco, Maracaibo 4004, Zulia</p>
                              </div>
                          </div>
                          <div class="col-12 col-md-4">
                              <div class="contact-content contact-information">
                                  <h4>Horario de Atencion</h4>
                                  <p>Lun-Vie: 9 Am a 4 Pm</p>
                                  <p>Sabado y Domingo: Cerrado</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- ##### Contact Area End ##### -->

  <!-- ##### Contact Form Area Start ##### -->
  <div class="contact-form section-padding-0-100">
      <div class="container">
          <div class="row">
              <!-- Section Heading -->
              <div class="col-12">
                  <div class="section-heading">
                      <h2>Deja tu Mensaje</h2>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-12">
                  <!-- Contact Form Area -->
                  <div class="contact-form-area">
                      <form action="contactus.php" method="post">
                          <div class="row">
                              <div class="col-12 col-lg-4">
                                  <div class="form-group">
                                      <label for="contact-name">Nombre:</label>
                                      <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                                  </div>
                              </div>
                              <div class="col-12 col-lg-4">
                                  <div class="form-group">
                                      <label for="contact-email">Email:</label>
                                      <input type="email" class="form-control" name="email" placeholder="mi.correo@gmail.com" required>
                                  </div>
                              </div>
                              <div class="col-12 col-lg-4">
                                  <div class="form-group">
                                      <label for="contact-number">Telefono:</label>
                                      <input type="text" class="form-control" name="tlf" placeholder="0412-4567910" required>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="message">Mensaje:</label>
                                      <textarea class="form-control" name="message" cols="30" rows="10" placeholder="Mensaje" required></textarea>
                                  </div>
                              </div>
                              <div class="col-12 text-center">
                                  <input type="submit" class="btn crose-btn mt-15" name="contact-form" value="Enviar">
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- ##### Contact Form Area End ##### -->

</div> <!-- /.wrapper -->


	<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery('.toast__close').click(function(e){
    e.preventDefault();
    var parent = $(this).parent('.toast');
    parent.fadeOut("slow", function() { $(this).remove(); } );
  });
});
</script>

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
