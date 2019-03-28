<div class="row">
	<div class="space2"></div>
	<div class="col-sm-4 col-sm-offset-4 form-reset-password">
		<h3 class="form-forgot-heading">Cambia tu Contraseña</h2>
		<ol>
			<li>Introduce el email asociado con tu cuenta</li>
			<li>Revisa tu correo y clickea el link que te ha sido enviado</li>
			<li>Sigue las instrucciones en pantalla</li>
		</ol>
		<br>
		<?php if(!$errors=='') {?><div class="alert alert-danger"><?=display_errors($errors);?></div><?php } ?>
		<form action="forgot_password.php" method="post" class="form ">

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" placeholder="Email" class="form-control" autofocus autocomplete='email'>
			</div>
<div class="form-group text-center">
			<input type="hidden" name="csrf" value="<?=Token::generate();?>">
			<p><input type="submit" name="forgotten_password" value="Enviar" class="btn crose-btn form-btn"></p>
</div>
		</form>

	</div><!-- /.col -->
</div><!-- /.row -->
