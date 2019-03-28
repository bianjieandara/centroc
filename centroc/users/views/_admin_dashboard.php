<div class="col-sm-8">
  <div class="page-header float-right">
    <div class="page-title">
      <ol class="breadcrumb text-right">
        <li class="active">Panel Administrativo</li>
      </ol>
    </div>
  </div>
</div>
</div>
</header><!-- /header -->
<script src="js/Chart.bundle.js"></script>
<div class="content mt-3">

  <?php
  // UserSpice Announcements
  $filename= 'https://rss.userspice.com/rss.xml';
  $file_headers = @get_headers($filename);
  if(($file_headers[0] != 'HTTP/1.1 200 OK') && ($file_headers[1] != 'HTTP/1.1 200 OK')){
    //logger($user->data()->id,"Errors","UserSpice Announcements feed not found. Please tell UserSpice!");
  } else {
    $limit = 0;
    $dis = $db->query("SELECT * FROM us_announcements")->results();
    $dismissed = [];
    foreach($dis as $d){
      $dismissed[] = $d->dismissed;
    }
    $xmlDoc = new DOMDocument();
    $xmlDoc->load('https://rss.userspice.com/rss.xml');
    $x=$xmlDoc->getElementsByTagName('item');
    for ($i=0; $i<=2; $i++) {
      if($limit == 1){
        continue;
      }

      $dis=$x->item($i)->getElementsByTagName('dis')
      ->item(0)->childNodes->item(0)->nodeValue;

      if(!in_array($dis,$dismissed) && $dis != 0){
        $limit = 1;
        $ignore=$x->item($i)->getElementsByTagName('ignore')
        ->item(0)->childNodes->item(0)->nodeValue;
        $title=$x->item($i)->getElementsByTagName('title')
        ->item(0)->childNodes->item(0)->nodeValue;
        $class=$x->item($i)->getElementsByTagName('class')
        ->item(0)->childNodes->item(0)->nodeValue;
        $link=$x->item($i)->getElementsByTagName('link')
        ->item(0)->childNodes->item(0)->nodeValue;
        $message=$x->item($i)->getElementsByTagName('message')
        ->item(0)->childNodes->item(0)->nodeValue;
        if(version_compare($ignore, $user_spice_ver) !=  1){
          continue;
        }
        ?>
        <div class="sufee-alert alert with-close alert-<?=$class?> alert-dismissible fade show">
          <span class="badge badge-pill badge-<?=$class?>"><?php echo htmlspecialchars($title);?></span> <a href="<?php echo htmlspecialchars($link);?>"><?php echo htmlspecialchars($message);?></a>
          <button type="button" class="close dismiss-announcement" data-dismiss="alert"
          data-dis="<?=$dis?>"
          data-ignore="<?=$ignore?>"
          data-title="<?=$title?>"
          data-class="<?=$class?>"
          data-link="<?=$link?>"
          data-message="<?=$message?>"
          aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    }
  }
  }
?>




<div class="col-sm-12 mb-4">

  <div class="card-group">
    <!-- Begin Users Panel -->
    <?php $count = $db->query("SELECT id from users")->count();?>
    <div class="card col-md-6 no-padding ">
      <div class="card-body">
        <div class="dropdown float-left">
          <button class="btn bg-transparent dropdown-toggle theme-toggle text-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="dropdown-menu-content">
              <a class="dropdown-item" href="admin.php?view=users">Manejar Usuarios</a>
            </div>
          </div>
        </div>
        <div class="h1 text-muted text-right mb-4">
          <i class="fa fa-users"></i>
        </div>

        <div class="h4 mb-0">
          <span class="count"><?=$count?></span>
        </div>

        <small class="text-muted  font-weight-bold">Usuarios</small>
        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
      </div>
    </div>
    <!-- End Users Panel -->


    <!-- Begin Pages Panel -->
    <?php $count = $db->query("SELECT id from pages")->count();?>
    <div class="card col-md-6 no-padding ">
      <div class="card-body">
        <div class="dropdown float-left">
          <button class="btn bg-transparent dropdown-toggle theme-toggle text-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="dropdown-menu-content">
              <a class="dropdown-item" href="admin.php?view=pages">Manejar Paginas</a>
            </div>
          </div>
        </div>
        <div class="h1 text-muted text-right mb-4">
          <i class="fa fa-file-text"></i>
        </div>

        <div class="h4 mb-0">
          <span class="count"><?=$count?></span>
        </div>

        <small class="text-muted  font-weight-bold">Paginas</small>
        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
      </div>
    </div>
    <!-- End Pages Panel -->


    <!-- Begin Permissions Panel -->
    <?php $count = $db->query("SELECT id from permissions")->count();?>
    <div class="card col-md-6 no-padding ">
      <div class="card-body">
        <div class="dropdown float-left">
          <button class="btn bg-transparent dropdown-toggle theme-toggle text-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="dropdown-menu-content">
              <a class="dropdown-item" href="admin.php?view=permissions">Manejar Permisos</a>
            </div>
          </div>
        </div>
        <div class="h1 text-muted text-right mb-4">
          <i class="fa fa-lock"></i>
        </div>

        <div class="h4 mb-0">
          <span class="count"><?=$count?></span>
        </div>

        <small class="text-muted  font-weight-bold">Niveles de Permisos</small>
        <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
      </div>
    </div>
    <!-- End Permissions Panel -->
    <!-- End of Row 1 -->
  </div>
</div>
</div>

<!-- Begin Widgets -->
<div class="col-sm-12 mb-6">
  <?php
  $widgets = glob($abs_us_root.$us_url_root.'usersc/widgets/*' , GLOB_ONLYDIR);
  foreach($widgets as $w){
    include($w.'/widget.php');
  }
  ?>
</div>
<!-- End Widgets -->


  <script type="text/javascript">
  $(document).ready(function() {


    //dismiss notifications
    $(".dismiss-announcement").click(function(event) {
      event.preventDefault();
      console.log("clicked");

      var formData = {
        'dismissed' 					: $(this).attr("data-dis"),
        'link' 					: $(this).attr("data-link"),
        'title' 					: $(this).attr("data-title"),
        'class' 					: $(this).attr("data-class"),
        'message' 					: $(this).attr("data-message"),
        'ignore' 					: $(this).attr("data-ignore")
      };
      //
      $.ajax({
        type 		: 'POST',
        url 		: 'parsers/dismiss_announcements.php',
        data 		: formData,
        dataType 	: 'json',
        encode 		: true
      })
    });


  }); //End DocReady
</script>
