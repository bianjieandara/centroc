<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UserSpice Dashboard</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="css/dashboard/normalize.css">
  <link rel="stylesheet" href="css/dashboard/bootstrap.min.css">
  <link rel="stylesheet" href="<?=$us_url_root?>users/fonts/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/dashboard/style.css">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style>
.btn-circle.btn-lg {
  width: 40px;
  height: 40px;
  padding: 5px 8px;
  font-size: 12px;
  line-height: 1.33;
  border-radius: 25px;
}

.feedback{position: fixed;}

.feedback.left{left:5px; bottom:15px}
.feedback.right{right:5px; bottom:15px}

.feedback .dropdown-menu{width: 290px;height: 250px;bottom: 50px;}
.feedback.left .dropdown-menu{ left: 0px}
.feedback.right .dropdown-menu{ right: 0px}
.feedback .hideme{ display: none}
</style>
</head>
<body>
<?php
//Notifications and messages
  if ($dayLimitQ = $db->query('SELECT notif_daylimit FROM settings', array()))
  $dayLimit = $dayLimitQ->results()[0]->notif_daylimit;
  else
  $dayLimit = 7;

  // 2nd parameter- true/false for all notifications or only current
  $notifications = new Notification($user->data()->id, false, $dayLimit);
  if($settings->messaging == 1){
    $msgQ = $db->query("SELECT id FROM messages WHERE msg_to = ? AND msg_read = 0 AND deleted = 0",array($user->data()->id));
    $msgC = $msgQ->count();
    if($msgC == 1){
      $grammar = 'Message';
    }else{
      $grammar = 'Messages';
    }
  }
?>

  <!-- Left Panel -->

  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="<?=$us_url_root?>index.php"><img src="images/logo.png" alt="Logo"></a>
        <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
      </div>

      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="admin.php"> <i class="menu-icon fa fa-dashboard"></i>Panel Administrador </a>
          </li>
          <!-- <h3 class="menu-title">Settings</h3> -->
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gear"></i>Configuracion</a>
            <ul class="sub-menu children dropdown-menu">
              <li><i class="fa fa-gears"></i><a href="admin.php?view=general">General</a></li>
              <li><i class="fa fa-users"></i><a href="admin.php?view=reg">Registro</a></li>
              <li><i class="fa fa-facebook-square"></i><a href="admin.php?view=social">Redes sociales</a></li>
              <li><i class="fa fa-envelope"></i><a href="admin.php?view=email">Email</a></li>
            </ul>
          </li>
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Herramientas</a>
            <ul class="sub-menu children dropdown-menu">
              <li><i class="menu-icon fa fa-warning"></i><a href="admin.php?view=ip">Lista de IP</a></li>
              <li><i class="menu-icon fa fa-comments"></i><a href="admin.php?view=messages">Sistema de Mensajeria</a></li>
            </ul>
          </li>
          <?php if(file_exists($abs_us_root.$us_url_root.'usersc/includes/admin_panels.php')){ ?>
            <li class="menu-item">
                <a href="admin.php?view=legacy"><i class="menu-icon fa fa-clock-o"></i>Legacy Buttons</a>
            </li>
          <?php } ?>
          <h3 class="menu-title">Maneja</h3><!-- /.menu-title -->
          <li class="menu-item">
            <a href="admin.php?view=pages"><i class="menu-icon fa fa-file"></i>Paginas</a>
            <a href="admin.php?view=permissions"><i class="menu-icon fa fa-lock"></i>Permisos</a>
            <a href="admin.php?view=users"><i class="menu-icon fa fa-user"></i>Usuarios</a>
          </li>

          <h3 class="menu-title">Misc</h3><!-- /.menu-title -->
          <li class="menu-item">
            <a href="<?=$us_url_root?>index.php"><i class="menu-icon fa fa-home"></i>Inicio</a>
            <a href="<?=$us_url_root?>users/account.php"><i class="menu-icon fa fa-qq"></i>Tu cuenta</a>
            <a href="<?=$us_url_root?>users/logout.php"><i class="menu-icon fa fa-hand-peace-o"></i>Salir</a>

          </li>

        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>

  </aside><!-- /#left-panel -->

  <!-- Left Panel -->
<script>
(function ( $ ) {
    $.fn.feedback = function(success, fail) {
    	self=$(this);
		self.find('.dropdown-menu-form').on('click', function(e){e.stopPropagation()})
    	self.find('.do-close').on('click', function(){
			self.find('.dropdown-toggle').dropdown('toggle');
			self.find('.report').show();
		});
	};
}( jQuery ));

$(document).ready(function () {
	// $('.feedback').feedback();
});
</script>
  <!-- Right Panel -->
