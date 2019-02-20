<?php if (isset($user) && $user->isLoggedIn() && $settings->notifications == 1) {
require_once $abs_us_root.$us_url_root.'users/includes/notifications.php';
$not = $notifications->getUnreadCount();
if($settings->force_notif == 1 && $not > 0 && $currentPage != 'admin_verify.php' && $currentPage != 'admin_pin.php?view=pin' && !isset($_SESSION['cloak_to'])){ ?>
  <script type="text/javascript">
  $(document).ready(function() {
    displayNotifications('new');
    $('#notificationsModal').modal('show');
    })
  </script>
<?php }
}?>
<?php if($user->isLoggedIn() && $settings->session_manager==1) {?>
<script>
    $(document).ready(function() {
				setInterval(function(){
            $.ajax({
                type: "POST",
                url: "<?=$us_url_root?>users/api/",
                data: {
                    action: "checkSessionStatus",
                },
                success: function(result) {
                    var resultO = JSON.parse(result);
                    if(resultO.error){
												window.location.replace("<?=$us_url_root?>users/logout.php");
                    }
                },
            });
        }, 5000);
    });
</script>
<?php } ?>
