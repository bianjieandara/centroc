<?php

if(hasPerm([2],$user->data()->id)){
  Redirect::to($us_url_root.'users/admin.php');
}elseif (hasPerm([3],$user->data()->id)){
  Redirect::to($us_url_root.'users/requests_dashboard.php');
}
else {
Redirect::to($us_url_root.$settings->redirect_uri_after_login);
}
?>
