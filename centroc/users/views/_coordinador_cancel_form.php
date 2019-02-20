<div id="cancel-form" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Rechazar Solicitud</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form name="cancel_request" action="requests_dashboard.php" method="post">
            <label class="radio-inline"><input type="radio" name="mail" value="true" checked> Enviar Correo Electronico</label>
            <label class="radio-inline"><input type="radio" name="mail" value="false"> No Enviar Ningun Correo </label>
          <div class="message-email">
            <textarea name="message-email" rows="8" cols="60">Lo sentimos pero no podemos aceptar su solicitud.</textarea>
          </div>
          <input type="hidden" name="id-cancel" class="id-cancel" value="" />
          <input type="hidden" name="view" value="<?=$page;?>" />
          <br />
        </div>
        <div class="modal-footer">
          <div class="btn-group">
            <input class='btn btn-primary' type='submit' name="cancel_request" value='Aceptar' class='submit' /></div>
          </form>
          <div class="btn-group"><button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button></div>
        </div>
      </div>
    </div>
  </div>
