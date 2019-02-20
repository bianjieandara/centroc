<?php
if($settings->navigation_type==0) {
$query = $db->query("SELECT * FROM email");
$results = $query->first();

//Value of email_act used to determine whether to display the Resend Verification link
$email_act=$results->email_act;

// Set up notifications button/modal
if ($user->isLoggedIn()) {
    if ($dayLimitQ = $db->query('SELECT notif_daylimit FROM settings', array())) $dayLimit = $dayLimitQ->results()[0]->notif_daylimit;
    else $dayLimit = 7;

    // 2nd parameter- true/false for all notifications or only current
	$notifications = new Notification($user->data()->id, false, $dayLimit);
}

?>
<!-- Navigation -->
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header ">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-top-menu-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="" href="<?=$us_url_root?>">
<div class="vcell"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" height="49.055999755859375" width="303.67962036132815"><defs id="SvgjsDefs1536"></defs><g id="SvgjsG1537" rel="mainfill" name="main_text" xmlns:name="main_text" transform="translate(94.33962765932085,-226.51200103759766)" fill="#865d5d"><path d="M2.50 240L2.50 236.33L8.02 236.33L8.02 234.49L2.50 234.49L2.50 232.63L8.48 232.63L8.48 230.79L0.66 230.79L0.66 240ZM11.24 235.41L11.24 232.63L15.83 232.63L15.83 235.41ZM17.66 240L17.66 238.16L16.75 237.25L17.66 236.33L17.66 231.72L16.75 230.79L9.40 230.79L9.40 240L11.24 240L11.24 237.25L13.99 237.25L14.91 238.16L15.83 239.09L15.83 240ZM26.80 240L26.80 238.16L20.82 238.16L20.82 236.33L26.34 236.33L26.34 234.49L20.82 234.49L20.82 232.63L26.80 232.63L26.80 230.79L18.98 230.79L18.98 240ZM36.25 240L36.25 230.79L34.42 230.79L34.42 236.92L29.82 230.79L27.98 230.79L27.98 240L29.82 240L29.82 233.85L34.42 240ZM42.23 240L42.23 232.63L45.43 232.63L45.43 230.79L37.17 230.79L37.17 232.63L40.39 232.63L40.39 240ZM54.17 240L54.17 238.16L48.20 238.16L48.20 236.33L53.71 236.33L53.71 234.49L48.20 234.49L48.20 232.63L54.17 232.63L54.17 230.79L46.35 230.79L46.35 240ZM67.98 240L68.89 239.09L68.89 237.25L67.06 237.25L67.06 238.16L62.46 238.16L62.46 232.63L67.06 232.63L67.06 233.55L68.89 233.55L68.89 231.72L67.98 230.79L61.53 230.79L60.62 231.72L60.62 239.09L61.53 240ZM71.91 235.41L71.91 232.63L76.51 232.63L76.51 235.41ZM78.34 240L78.34 238.16L77.43 237.25L78.34 236.33L78.34 231.72L77.43 230.79L70.07 230.79L70.07 240L71.91 240L71.91 237.25L74.66 237.25L75.58 238.16L76.51 239.09L76.51 240ZM81.49 240L81.49 230.79L79.65 230.79L79.65 240ZM90.17 240L91.08 239.09L91.08 235.39L90.17 234.47L84.65 234.47L84.65 232.63L89.25 232.63L89.25 233.55L91.08 233.55L91.08 231.72L90.17 230.79L83.72 230.79L82.81 231.72L82.81 235.67L83.72 236.33L89.25 236.33L89.25 238.16L84.65 238.16L84.65 237.25L82.81 237.25L82.81 239.09L83.72 240ZM97.06 240L97.06 232.63L100.26 232.63L100.26 230.79L92.00 230.79L92.00 232.63L95.22 232.63L95.22 240ZM103.03 240L103.03 230.79L101.18 230.79L101.18 240ZM106.05 235.41L106.05 234.49L107.88 232.63L110.65 232.63L110.65 235.41ZM106.05 240L106.05 237.25L110.65 237.25L110.65 240L112.48 240L112.48 230.79L106.96 230.79L104.21 233.56L104.21 240ZM122.06 240L122.06 230.79L120.23 230.79L120.23 236.92L115.63 230.79L113.79 230.79L113.79 240L115.63 240L115.63 233.85L120.23 240ZM125.22 238.16L125.22 232.63L129.81 232.63L129.81 238.16ZM130.73 240L131.64 239.09L131.64 231.72L130.73 230.79L124.28 230.79L123.37 231.72L123.37 239.09L124.28 240ZM146.48 233.55L143.73 230.79L138.22 230.79L138.22 240L145.58 240L146.48 239.09ZM144.65 238.16L140.06 238.16L140.06 232.63L142.81 232.63L144.65 234.47ZM155.49 240L155.49 238.16L149.51 238.16L149.51 236.33L155.03 236.33L155.03 234.49L149.51 234.49L149.51 232.63L155.49 232.63L155.49 230.79L147.67 230.79L147.67 240ZM156.67 230.79L156.67 240L164.49 240L164.49 238.16L158.51 238.16L158.51 230.79ZM178.68 230.79L170.41 230.79L170.41 232.63L175.93 232.63L170.41 238.16L170.41 240L178.68 240L178.68 238.16L173.16 238.16L178.68 232.63ZM179.73 230.79L179.73 239.09L180.64 240L187.09 240L187.99 239.09L187.99 230.79L186.17 230.79L186.17 238.16L181.57 238.16L181.57 230.79ZM189.31 230.79L189.31 240L197.13 240L197.13 238.16L191.15 238.16L191.15 230.79ZM199.89 240L199.89 230.79L198.05 230.79L198.05 240ZM202.92 235.41L202.92 234.49L204.75 232.63L207.51 232.63L207.51 235.41ZM202.92 240L202.92 237.25L207.51 237.25L207.51 240L209.34 240L209.34 230.79L203.83 230.79L201.08 233.56L201.08 240Z" fill="#865d5d" style="fill: rgb(122, 118, 118);"></path></g><g id="SvgjsG1538" rel="mainfill" name="slogan_text" xmlns:name="slogan_text" transform="translate(93.56462488174441,-195.55199432373047)" fill="#865d5d"><path d="M2.19 220.64L2.19 240L11.23 240L11.23 238.11L4.33 238.11L4.33 230.88L10.59 230.88L10.59 229.02L4.33 229.02L4.33 222.50L10.95 222.50L10.95 220.64ZM14.34 219.04L14.34 240L16.44 240L16.44 219.04ZM26.62 220.64L26.62 240L28.76 240L28.76 231.76L29.62 231.76C33.94 231.76 36.69 229.93 36.69 226.11C36.69 221.53 33.30 220.64 29.73 220.64ZM28.76 222.50L29.56 222.50C32.28 222.50 34.44 223.25 34.44 226.11C34.44 229.27 32.06 229.93 29.39 229.93L28.76 229.93ZM44.31 225.58C40.79 225.58 38.74 228.58 38.74 233.01C38.74 237.31 40.85 240.33 44.23 240.33C47.72 240.33 49.72 237.37 49.72 233.01C49.72 228.63 47.72 225.58 44.31 225.58ZM44.23 227.41C46.45 227.41 47.56 229.74 47.56 233.01C47.56 236.23 46.48 238.47 44.28 238.47C42.01 238.47 40.96 236.26 40.96 233.01C40.96 229.77 42.04 227.41 44.23 227.41ZM60.53 227.97C59.95 226.55 58.79 225.58 56.96 225.58C53.88 225.58 51.99 228.80 51.99 233.07C51.99 237.17 53.85 240.33 56.96 240.33C58.70 240.33 59.90 239.25 60.59 237.67L60.65 237.67C60.65 238.59 60.70 239.39 60.76 240L62.75 240C62.64 238.86 62.61 237.34 62.61 235.92L62.61 219.04L60.51 219.04L60.51 224.94C60.51 225.75 60.53 227.36 60.59 227.97ZM57.32 238.59C55.21 238.59 54.16 236.17 54.16 232.96C54.16 229.91 55.27 227.33 57.35 227.33C59.48 227.33 60.67 229.80 60.67 232.87C60.67 236.01 59.48 238.59 57.32 238.59ZM75.95 233.59C75.98 233.26 76.01 232.68 76.01 232.40C76.01 228.02 74.48 225.58 71.13 225.58C67.83 225.58 65.58 228.35 65.58 232.79C65.58 237.56 67.94 240.33 72.07 240.33C73.15 240.33 74.18 240.14 75.15 239.81L75.04 237.92C74.07 238.36 73.24 238.56 72.18 238.56C69.46 238.56 67.77 236.64 67.69 233.59ZM67.72 231.85C67.88 228.85 69.33 227.19 71.07 227.19C73.01 227.19 73.96 228.99 73.96 231.85ZM81.19 228.24C81.19 227.55 81.14 226.52 81.08 225.89L79.06 225.89C79.17 227.05 79.20 228.49 79.20 230.02L79.20 240L81.28 240L81.28 233.10C81.28 231.35 81.42 230.24 81.78 229.43C82.33 228.24 83.33 227.55 84.52 227.55C84.80 227.55 85.02 227.58 85.24 227.63L85.24 225.66C85.02 225.58 84.80 225.58 84.63 225.58C83.13 225.58 81.89 226.66 81.25 228.24ZM101.13 227.97C100.55 226.55 99.38 225.58 97.55 225.58C94.48 225.58 92.59 228.80 92.59 233.07C92.59 237.17 94.45 240.33 97.55 240.33C99.30 240.33 100.49 239.25 101.19 237.67L101.24 237.67C101.24 238.59 101.30 239.39 101.35 240L103.35 240C103.24 238.86 103.21 237.34 103.21 235.92L103.21 219.04L101.10 219.04L101.10 224.94C101.10 225.75 101.13 227.36 101.19 227.97ZM97.91 238.59C95.81 238.59 94.75 236.17 94.75 232.96C94.75 229.91 95.86 227.33 97.94 227.33C100.08 227.33 101.27 229.80 101.27 232.87C101.27 236.01 100.08 238.59 97.91 238.59ZM116.55 233.59C116.58 233.26 116.61 232.68 116.61 232.40C116.61 228.02 115.08 225.58 111.72 225.58C108.42 225.58 106.18 228.35 106.18 232.79C106.18 237.56 108.54 240.33 112.67 240.33C113.75 240.33 114.77 240.14 115.75 239.81L115.63 237.92C114.66 238.36 113.83 238.56 112.78 238.56C110.06 238.56 108.37 236.64 108.29 233.59ZM108.31 231.85C108.48 228.85 109.92 227.19 111.67 227.19C113.61 227.19 114.55 228.99 114.55 231.85ZM119.79 219.04L119.79 240L121.90 240L121.90 219.04ZM140.06 220.95C138.90 220.48 137.82 220.31 136.60 220.31C133.33 220.31 131.25 222.47 131.25 225.47C131.25 227.77 132.11 229.24 135.30 230.88C137.90 232.18 138.65 233.21 138.65 234.95C138.65 237.03 137.32 238.31 135.13 238.31C133.99 238.31 132.77 238.06 131.58 237.42L131.33 239.61C132.44 240.08 133.83 240.33 135.18 240.33C138.68 240.33 140.87 238.00 140.87 234.68C140.87 232.12 139.57 230.49 136.63 229.02C133.88 227.66 133.44 226.58 133.44 225.22C133.44 223.56 134.71 222.23 136.65 222.23C137.62 222.23 138.62 222.39 139.79 222.97ZM153.49 233.59C153.51 233.26 153.54 232.68 153.54 232.40C153.54 228.02 152.02 225.58 148.66 225.58C145.36 225.58 143.12 228.35 143.12 232.79C143.12 237.56 145.47 240.33 149.60 240.33C150.69 240.33 151.71 240.14 152.68 239.81L152.57 237.92C151.60 238.36 150.77 238.56 149.71 238.56C147.00 238.56 145.31 236.64 145.22 233.59ZM145.25 231.85C145.42 228.85 146.86 227.19 148.61 227.19C150.55 227.19 151.49 228.99 151.49 231.85ZM158.73 228.24C158.73 227.55 158.67 226.52 158.62 225.89L156.59 225.89C156.70 227.05 156.73 228.49 156.73 230.02L156.73 240L158.81 240L158.81 233.10C158.81 231.35 158.95 230.24 159.31 229.43C159.86 228.24 160.86 227.55 162.05 227.55C162.33 227.55 162.55 227.58 162.78 227.63L162.78 225.66C162.55 225.58 162.33 225.58 162.17 225.58C160.67 225.58 159.42 226.66 158.78 228.24ZM165.44 225.89L163.19 225.89L167.38 240L169.85 240L174.09 225.89L171.93 225.89C169.29 235.59 168.90 237.17 168.68 238.11L168.63 238.11C168.43 237.17 168.07 235.59 165.44 225.89ZM176.42 225.89L176.42 240L178.50 240L178.50 225.89ZM178.66 220.45L176.25 220.45L176.25 223.06L178.66 223.06ZM189.98 225.97C189.34 225.80 188.70 225.75 188.04 225.75C184.18 225.75 181.74 228.80 181.74 232.98C181.74 237.25 184.13 240.17 187.98 240.17C188.84 240.17 189.54 240.06 190.12 239.89L189.95 238.09C189.42 238.25 188.84 238.34 188.29 238.34C185.54 238.34 183.96 236.01 183.96 232.90C183.96 229.88 185.51 227.55 188.18 227.55C188.76 227.55 189.31 227.60 189.87 227.80ZM193.03 225.89L193.03 240L195.11 240L195.11 225.89ZM195.28 220.45L192.86 220.45L192.86 223.06L195.28 223.06ZM203.95 225.58C200.43 225.58 198.38 228.58 198.38 233.01C198.38 237.31 200.49 240.33 203.87 240.33C207.37 240.33 209.36 237.37 209.36 233.01C209.36 228.63 207.37 225.58 203.95 225.58ZM203.87 227.41C206.09 227.41 207.20 229.74 207.20 233.01C207.20 236.23 206.12 238.47 203.93 238.47C201.65 238.47 200.60 236.26 200.60 233.01C200.60 229.77 201.68 227.41 203.87 227.41Z" fill="#865d5d" style="fill: rgb(122, 118, 118);"></path></g><g id="SvgjsG1539" rel="mainfill" name="symbol" xmlns:name="symbol_mainfill" transform="translate(0.00018987655640358982,-20.8) scale(0.8)" fill="#865d5d"><g fill="#865d5d"><path d="M70.044,30C74,30,77,33.666,77,36.957c0,8.266-10.964,16.485-17,20.067c-6.038-3.584-17-11.802-17-20.067   C43,33.666,45.912,30,49.956,30C56,30,59,36,60,36S64,30,70.044,30z M70.044,26C63,26,60,31,60,31s-3-5-10.044-5   C44,26,39,31,39,36.957c0,13.696,21,24.653,21,24.653s21-10.957,21-24.653C81,31,76,26,70.044,26z" fill="#865d5d" style="fill: rgb(122, 118, 118);"></path><path d="M99.201,64.323c-0.976-1.952-3.553-2.965-6.456-2.965c-1.373,0-2.818,0.227-4.203,0.688c0,0-10.896,3.669-18.842,6.045   c-2.764-1.017-5.903-1.05-9.177-1.08c-2.229-0.021-4.535-0.042-6.873-0.366c-1.752-0.244-6.031-1.516-9.162-2.499   c-4.943-1.809-9.792-3.491-12.842-4.134c-1.417-0.299-3.133-0.426-5.036-0.426c-7.722,0-18.546,2.091-25.148,3.3   c-3.389,4.362-0.479,17.967,4.551,20.244c0.497-0.008,9.39-2.476,13.436-2.476c0.406,0,0.763,0.024,1.058,0.079   c10.582,1.961,29.824,6.587,35.574,6.587c5.75,0,35.305-12.621,38.808-14.374C100.638,70.073,100.638,67.198,99.201,64.323z    M33.436,79.284c-4.506-0.95-8.763-1.847-12.2-2.483c-0.532-0.099-1.116-0.146-1.787-0.146c-3.462,0-9.163,0.825-12.366,1.596   c-0.7-0.877-1.792-2.039-2.469-4.774c-0.778-3.144-0.332-5.327-0.031-6.726c6.455-1.188,15.408-3.164,22.027-3.164   c1.725,0,3.142,0.114,4.211,0.34c2.303,0.485,18.877,6.043,22.095,6.491c2.594,0.36,5.213,0.572,7.569,0.594   c3.958,0.036,10.56-0.392,10.618,3.317c0.021,1.297-1.292,2.154-4.354,2.506c-7.25,0.833-18.833-1.459-18.833-1.459   c-4.708-0.958-7.958,0.375-8.917,0.792c0,0,4.726,1.652,8.288,2.301c0,0,9.421,1.907,16.55,1.995   c0.74,0.009,1.501-0.034,2.229-0.074c-4.744,1.715-8.597,2.928-10,2.932C52.575,83.32,41.97,81.082,33.436,79.284z M96.172,67.406   c-0.01,0.27-0.526,0.689-3.073,1.963c-2.369,1.186-10.978,4.854-19.358,8.131c0.555-0.604,2.302-4.167,0.216-6.51   c4.971-1.53,10.705-3.417,15.851-5.149c0.948-0.315,1.964-0.467,2.938-0.482C95.609,65.313,96.182,67.137,96.172,67.406z" fill="#865d5d" style="fill: rgb(122, 118, 118);"></path></g></g></svg></div>
      </a>
		</div>
		<div class="collapse navbar-collapse navbar-top-menu-collapse navbar-right">
					<ul class="nav navbar-nav ">

				<?php if($user->isLoggedIn()){ //anyone is logged in?>
          <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">SERVICIOS<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?=$us_url_root?>users/legals.php">Asesoria Legal</a></li>
              <li><a href="<?=$us_url_root?>users/accounting.php">Asesoria Contable</a></li>
              <li><a href="<?=$us_url_root?>users/psychological.php">Consultas Psicologicas</a></li>
              <li><a href="<?=$us_url_root?>users/recreation.php">Recreacion</a></li>
              <li><a href="<?=$us_url_root?>users/events.php">Logistica y Eventos</a></li>
            </ul>
          </li>
          <li><a href="<?=$us_url_root?>users/aboutus.php" class="">NOSOTROS</a></li>
          <li><a href="<?=$us_url_root?>users/contactus.php" class="">CONTACTO</a></li>
					<li><a href="<?=$us_url_root?>users/account.php"><i class="fa fa-fw fa-user"></i> <?php echo echousername($user->data()->id);?></a></li> <!-- Common for Hamburger and Regular menus link -->
					<?php if($settings->notifications==1) {?>
            <?php /*<li><a href="portal/'.PAGE_PATH.'#" id="notificationsTrigger" data-toggle="modal" data-target="#notificationsModal"><i class="fa fa-bell"></i> <span id="notifCount" class="badge" style="margin-top: -5px"><?= (($notifications->getUnreadCount() > 0) ? $notifications->getUnreadCount() : ''); ?></span></a></li>*/?>

			<li><a href="#" onclick="displayNotifications('new')" id="notificationsTrigger" data-toggle="modal" data-target="#notificationsModal"  ><i class="fa fa-bell"></i> <span id="notifCount" class="badge" style="margin-top: -5px"><?= (int)$notifications->getUnreadCount(); ?></span></a></li>
          <?php } ?>
					<?php if($settings->messaging == 1){ ?>
						<li><a href="<?=$us_url_root?>users/messages.php"><i class="fa fa-envelope"></i> <span id="msgCount" class="badge" style="margin-top: -5px"><?php if($msgC > 0){ echo $msgC;}?></span></a></li>
					<?php } ?>

<?php require_once $abs_us_root.$us_url_root.'usersc/includes/navigation_right_side.php'; ?>

					 <!-- Hamburger menu link -->
					<?php if (checkMenu(2,$user->data()->id)){  //Links for permission level 2 (default admin) ?>
						<li class="hidden-sm hidden-md hidden-lg"><a href="<?=$us_url_root?>users/admin.php"></i> Admin Dashboard</a></li> <!-- Hamburger menu link -->
						<li class="hidden-sm hidden-md hidden-lg"><a href="<?=$us_url_root?>users/admin.php?view=users">User Management</a></li> <!-- Hamburger menu link -->
						<li class="hidden-sm hidden-md hidden-lg"><a href="<?=$us_url_root?>users/admin.php?view=permissions">User Permissions</a></li> <!-- Hamburger menu link -->
						<li class="hidden-sm hidden-md hidden-lg"><a href="<?=$us_url_root?>users/admin.php?view=pages">System Pages</a></li> <!-- Hamburger menu link -->
						<li class="hidden-sm hidden-md hidden-lg"><a href="<?=$us_url_root?>users/admin.php?view=messages">Messages Admin</a></li> <!-- Hamburger menu link -->
						<?php } // is user an admin ?>

          <?php if (checkMenu(3,$user->data()->id)){  //Links for permission level 2 (default admin) ?>
            <li class="hidden-sm hidden-md hidden-lg"><a href="<?=$us_url_root?>users/requests_dashboard.php">Panel Administrativo</a></li> <!-- Hamburger menu link -->
          <?php } // is user an coordinator ?>

					<li class="dropdown hidden-xs"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-fw fa-cog"></i><b class="caret"></b></a> <!-- regular user menu -->
						<ul class="dropdown-menu"> <!-- open tag for User dropdown menu -->
							<li><a href="<?=$us_url_root?>users/account.php">Cuenta</a></li>

<?php require_once $abs_us_root.$us_url_root.'usersc/includes/navigation_dropdown.php'; ?>
							<!-- regular user menu link -->

							<?php if (checkMenu(2,$user->data()->id)){  //Links for permission level 2 (default admin) ?>
								<li><a href="<?=$us_url_root?>users/admin.php">Panel Administrador</a></li> <!-- regular Admin menu link -->
								<li><a href="<?=$us_url_root?>users/admin.php?view=users">Manejo de Usuarios</a></li>
								<li><a href="<?=$us_url_root?>users/admin.php?view=permissions">Permisos de Paginas</a></li>
								<li><a href="<?=$us_url_root?>users/admin.php?view=pages">Manejo de Paginas</a></li>
								<li><a href="<?=$us_url_root?>users/admin.php?view=messages">Sistema de Mensajeria</a></li>
							<?php } // is user an admin ?>
              <?php if (checkMenu(3,$user->data()->id)){  //Links for permission level 3 (default admin) ?>
								<li><a href="<?=$us_url_root?>users/requests_dashboard.php">Panel Coordinador</a></li><!-- regular Admin menu link -->
              <?php } // is user an coordinator ?>
							<li class="divider"></li>
							<li><a href="<?=$us_url_root?>users/logout.php">Salir</a></li> <!-- regular Logout menu link -->
						</ul> <!-- close tag for User dropdown menu -->
					</li>

					<li class="hidden-sm hidden-md hidden-lg"><a href="<?=$us_url_root?>users/logout.php">Salir</a></li> <!-- regular Hamburger logout menu link -->

				<?php }else{ // no one is logged in so display default items ?>

					<li><a href="<?=$us_url_root?>users/login.php" class=""> INGRESA</a></li>
					<li><a href="<?=$us_url_root?>users/join.php" class=""> REGISTRO</a></li>
          <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">SERVICIOS<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <div class="nav-arrow-inner"></div>
              <li><a href="<?=$us_url_root?>users/legals.php">Asesoria Legal</a></li>
              <li><a href="<?=$us_url_root?>users/accounting.php">Asesoria Contable</a></li>
              <li><a href="<?=$us_url_root?>users/psychological.php">Consultas Psicologicas</a></li>
              <li><a href="<?=$us_url_root?>users/recreation.php">Recreacion</a></li>
              <li><a href="<?=$us_url_root?>users/events.php">Logistica y Eventos</a></li>
            </ul>
          </li>
          <li><a href="<?=$us_url_root?>users/contactus.php" class="">NOSOTROS</a></li>
          <li><a href="<?=$us_url_root?>users/contactus.php" class="">CONTACTO</a></li>
					<li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">AYUDA<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?=$us_url_root?>users/forgot_password.php">Olvide Contraseña</a></li>
							<?php if ($email_act){ //Only display following menu item if activation is enabled ?>
								<li><a href="<?=$us_url_root?>users/verify_resend.php">Reenviar Email de Activacion</a></li>
							<?php }?>
						</ul>
					</li>
				<?php } //end of conditional for menu display ?>
				</ul> <!-- End of UL for navigation link list -->
				</div> <!-- End of Div for right side navigation list -->

		<?php require_once $abs_us_root.$us_url_root.'usersc/includes/navigation.php';?>

	</div> <!-- End of Div for navigation bar -->
</div> <!-- End of Div for navigation bar styling -->
<?php } if($settings->navigation_type==1) {?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/database-navigation.php'; ?>
<?php } ?>
