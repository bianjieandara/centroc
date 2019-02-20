<div class="col-sm-8">
  <div class="page-header float-right">
    <div class="page-title">
      <ol class="breadcrumb text-right">
        <li class="active">Panel Coordinador</li>
      </ol>
    </div>
  </div>
</div>
</div>
</header><!-- /header -->

<section class="section-padding-50">

<!-- Important Info -->

<div class="col-lg-4 col-md-6">
<a href="requests_dashboard.php?view=legals">
  <aside class="profile-nav alt">
    <section class="card">
      <div class="card-header user-header alt bg-dark">
        <div class="media">
          <img class="align-self-center" style="width:85px; height:85px;" alt="" src="./images/icon-legals.jpg">
        <div class="media-body">
          <h2 align="center" class="text-light display-6">Asesoria Legal</h2>
        </div>
      </div>
    </div>
  </section>
</aside>
</a>
</div>
<!-- Important Info -->


<!-- Support Info -->
<div class="col-lg-4 col-md-6">
  <a href="requests_dashboard.php?view=accounting">
  <aside class="profile-nav alt">
    <section class="card">
      <div class="card-header user-header alt bg-dark">
        <div class="media">
            <img class="align-self-center" style="width:85px; height:85px;" alt="" src="./images/icon-acco.jpg">
        <div class="media-body">
          <h2 align="center" class="text-light display-6">Asesoria Contable</h2>
        </div>
      </div>
    </div>
  </section>
</aside>
</a>
</div>
<!-- Support Info -->



<div class="col-lg-4 col-md-6">
<a href="requests_dashboard.php?view=psychological">
  <aside class="profile-nav alt">
    <section class="card">
      <div class="card-header user-header alt bg-dark">
        <div class="media">
            <img class="align-self-center" style="width:85px; height:85px;" alt="" src="./images/icon-psico.jpg">
        <div class="media-body">
          <h2 align="center" class="text-light display-6">Consultas Psicologicas</h2>
        </div>
      </div>
    </div>
  </section>
</aside>
</a>
<div class="space12"></div>
</div>

<div class="col-lg-4 col-md-6">
<a href="requests_dashboard.php?view=recreation">
  <aside class="profile-nav alt">
    <section class="card">
      <div class="card-header user-header alt bg-dark">
        <div class="media">
            <img class="align-self-center" style="width:85px; height:85px;" alt="" src="./images/icon-commu.jpg">
        <div class="media-body">
          <h2 align="center" class="text-light display-6">Solicitud Recreadores</h2>
        </div>
      </div>
    </div>
  </section>
</aside>
</a>
</div>


<div class="col-lg-4 col-md-6">
<a href="requests_dashboard.php?view=events">
  <aside class="profile-nav alt">
    <section class="card">
      <div class="card-header user-header alt bg-dark">
        <div class="media">
            <img class="align-self-center" style="width:85px; height:85px;" alt="" src="./images/icon-crea.jpg">
        <div class="media-body">
          <h2 align="center" class="text-light display-6">Eventos y Logistica</h2>
        </div>
      </div>
    </div>
  </section>
</aside>
</a>
</div>


</section>

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
