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
    <h2><b>Configuracion del sitio web</b></h2>
    <div class="row">
      <div class="col-sm-6">
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
              <button type="button" name="force_user_pr" id="force_user_pr" class="btn btn-danger input-group-addon">Forzar Reinicio</button>
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

            <!-- right column -->
            <div class="col-sm-6">
              <!-- Force Password Reset -->
              <h2>Mensajes & Notificaciones</h2>

              <!-- Messaging Option -->
              <div class="form-group">
                <label for="messaging">Activar Sistema de Mensajeria<a class="nounderline" data-toggle="tooltip" title="Enable or disable the built in messaging system which features Mass Messaging, user-specific messaging with replies in thread format and email notifications. Default: Disabled."><font color="blue">?</font></a></label>
                <span style="float:right;">
                  <label class="switch switch-text switch-success">
                    <input id="messaging" type="checkbox" class="switch-input toggle" data-desc="Messaging System Status" <?php if($settings->messaging==1) echo 'checked="true"'; ?>>
                    <span data-on="Si" data-off="No" class="switch-label"></span>
                    <span class="switch-handle"></span>
                  </label>
                </span>
              </div>


              <!-- Notification System -->
              <div class="form-group">
                <label for="notifications">Activar Sistema de Notificaciones <a class="nounderline" data-toggle="tooltip" title="Enable or disable the notification system. Default: Disabled."><font color="blue">?</font></a></label>
                <span style="float:right;">
                  <label class="switch switch-text switch-success">
                    <input id="notifications" type="checkbox" class="switch-input toggle" data-desc="Notification System Status" <?php if($settings->notifications==1) echo 'checked="true"'; ?>>
                    <span data-on="Si" data-off="No" class="switch-label"></span>
                    <span class="switch-handle"></span>
                  </label>
                </span>
              </div>

              <!-- Notification System -->
              <div class="form-group">
                <label for="force_notif">Forzar usuarios a ver notificaciones <a class="nounderline" data-toggle="tooltip" title="With this enabled, notifications will popup automatically for your users. It could be annoying, but in some situatuons, notifications are crucial."><font color="blue">?</font></a></label>
                <span style="float:right;">
                  <label class="switch switch-text switch-success">
                    <input id="force_notif" type="checkbox" class="switch-input toggle" data-desc="Force Notifications Setting" <?php if($settings->force_notif==1) echo 'checked="true"'; ?>>
                    <span data-on="Si" data-off="No" class="switch-label"></span>
                    <span class="switch-handle"></span>
                  </label>
                </span>
              </div>

              <!-- Expiration for Notifications Setting -->
              <div class="form-group">
                <label for="notif_daylimit">Expiracion de Notificaciones<a class="nounderline" data-toggle="tooltip" title="Notifications are archived from user views automatically when they load a page that has the HTML footer (by default all US files) based on the date of the notification, and the difference between that date and now. Change this to increase or decrease the amount of days. Minimum: 1, Maximum: 999, Default: 7."><font color="blue">?</font></a></label>
                <div class="input-group">
                  <input type="number" step="1" min="1" max="999" class="form-control ajxnum" data-desc="Expiration For Notifications" name="notif_daylimit" id="notif_daylimit" value="<?=$settings->notif_daylimit?>">
                  <span class="input-group-addon">Dias</span>
                </div>
              </div>

              <br>
              <h2>Configuraciones de Usuario</h2>
              <br>


              <div class="form-group">
                <label for="redirect_uri_after_login">Redireccionar despues de Ingresar <a class="nounderline" data-toggle="tooltip" title="The folder and file that you wish to redirect the user to after login. Default: users/account.php. Note that admins get redirected to this dashboard by default unless you intercept that call with something in usersc/scripts/custom_login_script.php"><font color="blue">?</font></a></label>
                <input type="text" class="form-control ajxtxt" data-desc="Redirect After Login" name="redirect_uri_after_login" id="redirect_uri_after_login" value="<?=$settings->redirect_uri_after_login?>">
              </div>

              <!-- echouser Option
              <div class="form-group">
                <label for="echouser">echouser Function <a class="nounderline" data-toggle="tooltip" title="What do you want to echo when you use the echouser function? You can use this to echo their name in several different formats. Need their username instead? Use echousername. If it cannot find the user, it will echo Deleted. Default: FName LName."><font color="blue">?</font></a></label>
                <select id="echouser" class="form-control ajxnum" data-desc="echouser Function" name="echouser">
                  <option value="0" <?php if($settings->echouser==0) echo 'selected="selected"'; ?> >FName LName</option>
                  <option value="1" <?php if($settings->echouser==1) echo 'selected="selected"'; ?> >Username</option>
                  <option value="2" <?php if($settings->echouser==2) echo 'selected="selected"'; ?> >Username (FName LName)</option>
                  <option value="3" <?php if($settings->echouser==3) echo 'selected="selected"'; ?> >Username (FName)</option>
                </select>
              </div>
              -->
              <br>
              <h2>Invisible Recaptcha</h2>
              <br>
              <!-- Recaptcha Option -->
              <div class="form-group">
                <label for="recaptcha">Invisible Recaptcha <a class="nounderline" data-toggle="tooltip" title="Use the Google Recaptcha to protect yourself from spam registrations and logins, and to verify the legitimacy of a users session. You can set this to Enabled for Registration and Logins, or just Registrations. Default: Disabled."><font color="blue">?</font></a></label>
                <select id="recaptcha" class="form-control ajxnum" data-desc="Invisible Recaptcha" name="recaptcha">
                  <option value="1" <?php if($settings->recaptcha==1) echo 'selected="selected"'; ?> >Activar</option>
                  <option value="0" <?php if($settings->recaptcha==0) echo 'selected="selected"'; ?> >Desactivar</option>
                  <option value="2" <?php if($settings->recaptcha==2) echo 'selected="selected"'; ?> >Solo para Registros</option>
                </select>
              </div>

              <div class="form-group">
                <label for="min_pw">Invisible Recaptcha Publica (Sitio) Key</label> <?php if(in_array($user->data()->id, $master_account)) {?><a href="#" class="nounderline" id="recapatcha_public_show"><span class="fa fa-eye"></span> show</a><?php } ?>
                <input type="password" autocomplete="off" class="form-control ajxtxt" data-desc="Recaptcha Site Key" name="recap_public" id="recap_public" value="<?=$settings->recap_public?>">
              </div>

              <div class="form-group">
                <label for="max_pw">Invisible Recaptcha Privada (Secreta) Key</label> <?php if(in_array($user->data()->id, $master_account)) {?><a href="#" class="nounderline" id="recapatcha_private_show"><span class="fa fa-eye"></span> show</a><?php } ?>
                <input type="password" autocomplete="off" class="form-control ajxtxt" data-desc="Recaptcha Private Key" name="recap_private" id="recap_private" value="<?=$settings->recap_private?>">
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
