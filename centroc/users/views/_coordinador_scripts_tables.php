<script type="text/javascript" src="js/pagination/datatables.min.js"></script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
$(document).on("click", "#cancel-btn", function () {
       var id = $(this).data('id');
       $(".modal-body .id-cancel").val( id );
});

$(document).on('change',':radio[name="mail"]',function() {
  var mail = $(this).filter(':checked').val();
  if (mail=="true") {
  $('.message-email').removeClass('hide');
  }
  else {
  $('.message-email').addClass('hide');
  }
});
});
</script>
