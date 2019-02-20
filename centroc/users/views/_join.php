<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=$us_url_root?>">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Crea tu Cuenta</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="row">
  <div class="col-sm-4 col-sm-offset-4">
    <?php
    if (!$form_valid && Input::exists()){?>
      <?php if(!$validation->errors()=='') {?><div class="alert alert-danger"><?=display_errors($validation->errors());?></div><?php } ?>
    <?php }

    ?>

    <form class="form-signup" action="<?=$form_action;?>" method="<?=$form_method;?>">

      <h2 class="form-signin-heading"> <?=lang("SIGNUP_TEXT","");?></h2>

      <div class="form-group">

        <?php if($settings->auto_assign_un==0) {?><label>Usuario</label>&nbsp;&nbsp;<span id="usernameCheck" class="small"></span>
        <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" value="<?php if (!$form_valid && !empty($_POST)){ echo $username;} ?>" required autofocus autocomplete="username"><?php } ?>


        <label for="fname">Nombre</label>
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Nombre" value="<?php if (!$form_valid && !empty($_POST)){ echo $fname;} ?>" required autofocus autocomplete="given-name">

        <label for="lname">Apellido</label>
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Apellido" value="<?php if (!$form_valid && !empty($_POST)){ echo $lname;} ?>" required autocomplete="family-name">

        <label for="email">Email</label>
        <input  class="form-control" type="text" name="email" id="email" placeholder="Email" value="<?php if (!$form_valid && !empty($_POST)){ echo $email;} ?>" required autocomplete="email">

        <?php

        $character_range = 'Entre '.$settings->min_pw . ' y ' . $settings->max_pw;
        $character_statement = '<span id="character_range" class="gray_out_text">' . $character_range . ' caracteres</span>';

        if ($settings->req_cap == 1){
          $num_caps = '1'; //Password must have at least 1 capital
          if($num_caps != 1){
            $num_caps_s = 's';
          }
          $num_caps_statement = '<span id="caps" class="gray_out_text">Tener al menos ' . $num_caps . ' mayuscula </span>';
        }

        if ($settings->req_num == 1){
          $num_numbers = '1'; //Password must have at least 1 number
          if($num_numbers != 1){
            $num_numbers_s = 's';
          }

          $num_numbers_statement = '<span id="number" class="gray_out_text">Tener al menos ' . $num_numbers . ' numeros</span>';
        }
        $password_match_statement = '<span id="password_match" class="gray_out_text">Estar escritas correctamente dos veces</span>';


        //2.) Apply default class to gray out green check icon
        echo '
        <style>
        .gray_out_icon{
          -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
          filter: grayscale(100%);
        }
        .gray_out_text{
          opacity: .5;
        }
        </style>
        ';

        //3.) Javascript to check to see if user has met conditions on keyup (NOTE: It seems like we shouldn't have to include jquery here because it's already included by UserSpice, but the code doesn't work without it.)
        echo '
        <script type="text/javascript">
        $(document).ready(function(){

          $( "#password" ).keyup(function() {
            var pswd = $("#password").val();

            //validate the length
            if ( pswd.length >= ' . $settings->min_pw . ' && pswd.length <= ' . $settings->max_pw . ' ) {
              $("#character_range_icon").removeClass("gray_out_icon");
              $("#character_range").removeClass("gray_out_text");
            } else {
              $("#character_range_icon").addClass("gray_out_icon");
              $("#character_range").addClass("gray_out_text");
            }

            //validate capital letter
            if ( pswd.match(/[A-Z]/) ) {
              $("#num_caps_icon").removeClass("gray_out_icon");
              $("#caps").removeClass("gray_out_text");
            } else {
              $("#num_caps_icon").addClass("gray_out_icon");
              $("#caps").addClass("gray_out_text");
            }

            //validate number
            if ( pswd.match(/\d/) ) {
              $("#num_numbers_icon").removeClass("gray_out_icon");
              $("#number").removeClass("gray_out_text");
            } else {
              $("#num_numbers_icon").addClass("gray_out_icon");
              $("#number").addClass("gray_out_text");
            }
          });

          $( "#confirm" ).keyup(function() {
            var pswd = $("#password").val();
            var confirm_pswd = $("#confirm").val();

            //validate password_match
            if (pswd == confirm_pswd) {
              $("#password_match_icon").removeClass("gray_out_icon");
              $("#password_match").removeClass("gray_out_text");
            } else {
              $("#password_match_icon").addClass("gray_out_icon");
              $("#password_match").addClass("gray_out_text");
            }

          });
        });
        </script>
        ';

        ?>

        <div style="display: inline-block">
          <label for="password">Contraseña (Entre <?=$settings->min_pw?> y <?=$settings->max_pw?> caracteres)</label>
          <input  class="form-control" type="password" name="password" id="password" placeholder="Contraseña" required autocomplete="password" aria-describedby="passwordhelp">

          <label for="confirm">Confirmar Contraseña</label>
          <input  type="password" id="confirm" name="confirm" class="form-control" placeholder="Confirmar Contraseña" required autocomplete="password" >
        </div>
        <div style="display: inline-block; padding-left: 20px">
          <strong>Contraseñas Deberian...</strong><br>
          <span id="character_range_icon" class="fa fa-thumbs-o-up gray_out_icon" style="color: green"></span>&nbsp;&nbsp;<?php echo $character_statement;?>
          <br>
          <?php
          if ($settings->req_cap == 1){ ?>
            <span id="num_caps_icon" class="fa fa-thumbs-o-up gray_out_icon" style="color: green"></span>&nbsp;&nbsp;<?php echo $num_caps_statement;?>
            <br>
          <?php }

          if ($settings->req_num == 1){ ?>
            <span id="num_numbers_icon" class="fa fa-thumbs-o-up gray_out_icon" style="color: green"></span>&nbsp;&nbsp;<?php echo $num_numbers_statement;?>
            <br>
          <?php } ?>
          <span id="password_match_icon" class="fa fa-thumbs-o-up gray_out_icon" style="color: green"></span>&nbsp;&nbsp;<?php echo $password_match_statement;?>
          <br><br>
          <a class="nounderline" id="password_view_control"><span class="fa fa-eye"></span> Mostrar Contraseñas</a>
        </div>
        <br><br>

        <?php include($abs_us_root.$us_url_root.'usersc/scripts/additional_join_form_fields.php'); ?>
        <?php if($settings->show_tos == 1){ ?>
          <label for="confirm">Terminos y Condiciones</label>
          <textarea id="agreement" name="agreement" rows="5" class="form-control" disabled ><?php require $abs_us_root.$us_url_root.'usersc/includes/user_agreement.php'; ?></textarea>

          <label><input type="checkbox" id="agreement_checkbox" name="agreement_checkbox"> Marca para aceptar los terminos</label>
        <?php } //if TOS enabled ?>
      </div>
  <div class="form-group text-center">
      <input type="hidden" value="<?=Token::generate();?>" name="csrf">
      <button class="submit btn crose-btn" type="submit" id="next_button">Registrate</button>
  </div>
      <?php if($settings->recaptcha == 1|| $settings->recaptcha == 2){ ?>
        <div class="g-recaptcha" data-sitekey="<?=$settings->recap_public; ?>" data-bind="next_button" data-callback="submitForm"></div>
      <?php } ?>
    </form><br />
  </div>
</div>
