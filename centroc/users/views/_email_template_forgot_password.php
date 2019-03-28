<?php
$db = DB::getInstance();
$query = $db->query("SELECT * FROM email");
$results = $query->first();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <p>Hola <?=$fname;?>,</p>
  <p>Estas recibiendo este email porque has solicitado cambiar tu contraseña. Si no fuiste tu, puedes borarr este correo.</p>
  <p>Si fuiste tu, dale click al link para continuar con el proceso.</p>
  <p><a href="<?php echo $results->verify_url."users/forgot_password_reset.php?email=".$email."&vericode=$vericode&reset=1"; ?>" class="nounderline">Cambiar Contraseña</a></p>
  <p>Sinceramente,</p>
  <p>-Frente Cristiano del Zulia-</p>
  <sup><p>Por favor tomar en cuenta que los links expiran despues de <?=$reset_vericode_expiry?> minutos.</p></sup>
</body>
</html>
