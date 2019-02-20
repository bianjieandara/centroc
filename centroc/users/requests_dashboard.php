<?php require_once 'init.php';
$db = DB::getInstance();
$settings = $db->query("SELECT * FROM settings")->first();
?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/user_spice_ver.php'; ?>
<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>
<?php require_once $abs_us_root.$us_url_root.'users/views/_coordinador_menu.php'; ?>
<div id="right-panel" class="right-panel">

  <div id="messages" class="sufee-alert alert with-close alert-primary alert-dismissible fade show d-none">
    <span id="message" >Testing123</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <?php require_once $abs_us_root.$us_url_root.'users/views/_coordinador_header.php'; ?>
  <?php
  function usView($file){
    global $abs_us_root;
    global $us_url_root;
    if(file_exists($abs_us_root.$us_url_root.'usersc/includes/admin/'.$file)){
      $path = $abs_us_root.$us_url_root.'usersc/admin/'.$file;
    }else{
      $path = $abs_us_root.$us_url_root.'users/views/'.$file;
    }
    return $path;
  }
  $view = Input::get('view');

  switch ($view) {
    case "legals":
      $path = usView('_coordinador_legals.php');
      include($path);
      break;
    case "accounting":
      $path = usView('_coordinador_accounting.php');
      include($path);
      break;
    case "psychological":
      $path = usView('_coordinador_psychological.php');
      include($path);
      break;
    case "recreation":
      $path = usView('_coordinador_recreation.php');
      include($path);
      break;
    case "events":
      $path = usView('_coordinador_events.php');
      include($path);
      break;
    default:
    if($view != ''){
    logger($user->data()->id,"Errors","Tried to visit unsupported view ($view) in request_legals.php");
    }
    include($abs_us_root.$us_url_root.'users/views/_coordinador_dashboard.php');
    }
?>
<div class="col-sm-12">
  <p align="center">
  <font color='black'><br>&copy;<?=date("Y ")?><?=$settings->copyright; ?></font>
  </p>
</div>



</div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->



<script type="text/javascript">
$(document).ready(function() {

//Transaction total in the lower right
function messages(data) {
$('#messages').removeClass();
$('#message').text("");
$('#messages').show();
if(data.success == "true"){
$('#messages').addClass("sufee-alert alert with-close alert-success alert-dismissible fade show");
}else{
$('#messages').addClass("sufee-alert alert with-close alert-success alert-dismissible fade show");
}
$('#message').text(data.msg);
$('#messages').delay(3000).fadeOut('slow');

}

$( ".toggle" ).change(function() { //use event delegation
var value = $(this).prop("checked");
$(this).prop("checked",value);

var field = $(this).attr("id"); //the id in the input tells which field to update
var desc = $(this).attr("data-desc"); //For messages
var formData = {
'value' 				: value,
'field'					: field,
'desc'					: desc,
'type'          : 'toggle',
};

$.ajax({
type 		: 'POST',
url 		: 'parsers/admin_settings.php',
data 		: formData,
dataType 	: 'json',
})

.done(function(data) {
messages(data);
})
});

$( ".ajxnum" ).change(function() { //use event delegation
var value = $(this).val();
// console.log(value);

var field = $(this).attr("id"); //the id in the input tells which field to update
var desc = $(this).attr("data-desc"); //For messages
var formData = {
'value' 				: value,
'field'					: field,
'desc'					: desc,
'type'          : 'num',
};

$.ajax({
type 		: 'POST',
url 		: 'parsers/admin_settings.php',
data 		: formData,
dataType 	: 'json',
})

.done(function(data) {
messages(data);
})
});

$( ".ajxtxt" ).change(function() { //use event delegation
var value = $(this).val();
console.log(value);

var field = $(this).attr("id"); //the id in the input tells which field to update
var desc = $(this).attr("data-desc"); //For messages
var formData = {
'value' 				: value,
'field'					: field,
'desc'					: desc,
'type'          : 'txt',
};

$.ajax({
type 		: 'POST',
url 		: 'parsers/admin_settings.php',
data 		: formData,
dataType 	: 'json',
})

.done(function(data) {
messages(data);
})
});

// Toggle menu
$('#menuToggle').on('click', function() {
$('body').toggleClass('open');
});

$('.search-trigger').on('click', function() {
$('.search-trigger').parent('.header-left').addClass('open');
});

$('.search-close').on('click', function() {
$('.search-trigger').parent('.header-left').removeClass('open');
});
});
</script>
</body>
</html>
