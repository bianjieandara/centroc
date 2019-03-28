<div class="col-sm-8">
  <div class="page-header float-right">
    <div class="page-title">
      <ol class="breadcrumb text-right">
        <li><a href="<?=$us_url_root?>users/admin.php">Panel Administrador</a></li>
        <li>Configuracion</li>
        <li class="active">General</li>
      </ol>
    </div>
  </div>
</div>
</div>
</header>

<div class="content mt-3">

  <!-- Site Settings -->
  <form class="" action="admin.php?view=<?=$view?>" name="settings" method="post">

    <div class="row">
      <div class="col-sm-12 col-md-8 offset-md-2">
          <h2><b>Configuracion del sitio web</b></h2><br>
        <!-- Left -->
        <h2>General</h2>
        <!-- Site Name -->
        <div class="form-group">
          <label for="site_name">Nombre del Sitio Web <a class="nounderline" data-toggle="tooltip" title="Modifica esto para cambiar el nombre del sitio web, incluyendo la etiqueta <title>, la pagina de mantenimiento y algunos emails del sistema."><font color="blue">?</font></a></label>
            <input type="text" class="form-control ajxtxt" data-desc="Site Name" name="site_name" id="site_name" value="<?=$settings->site_name?>">

          </div>

          <!-- Copyright Option -->
          <div class="form-group">
            <label for="copyright">Mensaje Derechos de Autor <a class="nounderline" data-toggle="tooltip" title="Este mensaje aparecera al final de cada pagina. El simbolo de derechos de autor y el año se añadiran automaticamente."><font color="blue">?</font></a></label>
            <input type="text" class="form-control ajxtxt" data-desc="Copyright Message" name="copyright" id="copyright" value="<?=$settings->copyright?>">
          </div>

          <!-- Site Offline -->
          <div class="form-group">
            <label for="site_offline">Sitio Web Desactivado <a class="nounderline" data-toggle="tooltip" title="necesitas hacer un mantenimiento de la pagina y desactivarla por un tiempo? activa esta opcion! esta opcion causara que la pagina muestre un mensaje de 'modo de mantenimiento activado' para los que tienen permisos de administrador y redireccionara al resto de los usuarios a la pagina de mantenimiento. esto ocurrira hasta que la opcion se desactive. Por defecto: No."><font color="blue">?</font></a></label>
            <span style="float:right;">
              <label class="switch switch-text switch-success">
                <input id="site_offline" type="checkbox" class="switch-input toggle" data-desc="Site offline" <?php if($settings->site_offline==1) echo 'checked="true"'; ?>>
                <span data-on="Si" data-off="No" class="switch-label"></span>
                <span class="switch-handle"></span>
              </label>
            </span>
          </div>


          <!-- Track Guests -->
          <div class="form-group">
            <label for="track_guest">Seguimiento de visitantes <a class="nounderline" data-toggle="tooltip" title="quieres seguir en detalle cuantos visitantes estan entrando en tu pagina? manten esta opcion activada! la pagina esta muy lenta y con problemas? Desactiva esta opcion a ver si ayuda. por defecto: Si."><font color="blue">?</font></a></label>
            <span style="float:right;">
              <label class="switch switch-text switch-success">
                <input id="track_guest" type="checkbox" class="switch-input toggle" data-desc="Track Guests" <?php if($settings->track_guest==1) echo 'checked="true"'; ?>>
                <span data-on="Si" data-off="No" class="switch-label"></span>
                <span class="switch-handle"></span>
              </label>
            </span>
          </div>

          <br>
          <h2>Seguridad</h2>
          <br>

          <!-- Force SSL -->
          <div class="form-group">
            <label for="force_ssl">Forzar Conexiones HTTPS <a class="nounderline" data-toggle="tooltip" title="No quieres nadie accediendo tu sitiendo de manera insegura? Activa esta opcion. esta opcion redireccionara cualquier usuario de una conexion HTTP (no segura) a una conexion HTTPS. ASegurate que tu certificado SSL es valido antes de activar esta opcion!. Por defecto: No."><font color="blue">?</font></a></label>
            <span style="float:right;">
              <label class="switch switch-text switch-success">
                <input id="force_ssl" type="checkbox" class="switch-input toggle" data-desc="Force HTTPS" <?php if($settings->force_ssl==1) echo 'checked="true"'; ?>>
                <span data-on="Si" data-off="No" class="switch-label"></span>
                <span class="switch-handle"></span>
              </label>
            </span>
          </div>

          <div class="form-group">
            <label for="twofa">Autentificacion de 2 factores <a class="nounderline" data-toggle="tooltip" title="activa esta opcion para validar los usuarios por correo. Por defecto: No.">?</a></label>
            <select id="twofa" class="form-control ajxnum" name="twofa" data-desc="Two Factor Authentication" >
              <option value="1" <?php if($settings->twofa==1) echo 'selected="selected"'; ?> >Activado</option>
              <option value="0" <?php if($settings->twofa==0) echo 'selected="selected"'; ?> >Desactivado</option>
              <option value="-1">Desactiva y reinicia todos los usuarios A2F</option>
            </select>
          </div>

          <div class="form-group">
            <label for="force_user_pr">Forzar reinicio de contraseña <a class="nounderline" data-toggle="tooltip" title="esta opcion causara que todos los usuarios incluyendo quien activo esta opcion a reiniciar su contraseña. ningun usuario podra salir de la pagina de opciones hasta que coloquen su nueva contraseña. Usar esta funcion con cuidado"><font color="blue">?</font></a></label>
            <span style="float:right;">
              <button type="button" name="force_user_pr" id="force_user_pr" class="btn btn-danger input-group-addon">Forzar</button>
              <span>
              </div>

              <div class="form-group">
                <label for="permission_restriction">Activar Permisos de Usuario <a class="nounderline" data-toggle="tooltip" title="Use this as a safeguard to only allow users to add/remove permission levels they have access to. You might use this in a format to give certain users access to add/remove users or make site changes, but you don't want them to give other users permissions they don't have, or take those away. Your safeguard for this (in your own case if you have certain permissions not assigned to yourself) is by restricting the page administration to the default Level 2 as you can do anything from these pages currently. This will still show the user the levels on user administration but will have a disabled attribute. Default: Disabled."><font color="blue">?</font></a></label>
                <span style="float:right;">
                  <label class="switch switch-text switch-success">
                    <input id="permission_restriction" type="checkbox" class="switch-input toggle" data-desc="Password Restriction Setting" <?php if($settings->permission_restriction==1) echo 'checked="true"'; ?>>
                    <span data-on="Si" data-off="No" class="switch-label"></span>
                    <span class="switch-handle"></span>
                  </label>
                </span>
              </div>

              <div class="form-group">
                <label for="page_permission_restriction">Activar Permisos de Pagina <a class="nounderline" data-toggle="tooltip" title="Only allow one permission level per page using this setting. This is particularly good for ensuring no overlap in permission levels. You can have a permission group hierarchy such as this: User, User Manager, Database Manager, Administrator. In this case you want to give all your User Managers access to the user administration section, and yourself of course, but many not to those who manage your database only (maybe you want to give them access to site and email settings only). In any case, it will change the checkboxes on Admin Page section to radio buttons under Add Permission Level and restrict addition from the permission level settings to be added only if no other level has it. Default: Disabled."><font color="blue">?</font></a></label>
                <span style="float:right;">
                  <label class="switch switch-text switch-success">
                    <input id="page_permission_restriction" type="checkbox" class="switch-input toggle" data-desc="Page Permission Restriction Setting" <?php if($settings->page_permission_restriction==1) echo 'checked="true"'; ?>>
                    <span data-on="Si" data-off="No" class="switch-label"></span>
                    <span class="switch-handle"></span>
                  </label>
                </span>
              </div>



              <div class="form-group">
                <label for="session_manager">Activar Manejo de Sesiones <a class="nounderline" data-toggle="tooltip" title="Session Management will track unique details about users including their unique fingerprint, IP, OS, Browser, Session Start Time, End Time and their last activity and page. Session Management can allow forceful and soft ending of sessions including a kill switch via the Admin Panel to log all users out. Default: Enabled."><font color="blue">?</font></a></label>
                <span style="float:right;">
                  <label class="switch switch-text switch-success">
                    <input id="session_manager" type="checkbox" class="switch-input toggle" data-desc="Session Management Setting" <?php if($settings->session_manager==1) echo 'checked="true"'; ?>>
                    <span data-on="Si" data-off="No" class="switch-label"></span>
                    <span class="switch-handle"></span>
                  </label>
                </span>
              </div>

            </div>

          </div>

          <input type="hidden" name="csrf" value="<?=$token?>" />
        </form>

        <?php if(in_array($user->data()->id, $master_account)) {?>
          <script type="text/javascript">
          $(document).ready(function(){
            $('#recapatcha_public_show').hover(function () {
              $('#recap_public').attr('type', 'text');
            }, function () {
              $('#recap_public').attr('type', 'password');
            });
            $('#recapatcha_private_show').hover(function () {
              $('#recap_private').attr('type', 'text');
            }, function () {
              $('#recap_private').attr('type', 'password');
            });
          });
        </script>
      <?php } ?>
