<?php
/*
UserSpice 4
An Open Source PHP User Management System
by the UserSpice Team at http://UserSpice.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
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
