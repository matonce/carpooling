<?php
require_once __SITE_PATH . '/view/_header.php';
?>

 <title> Contact </title>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php
require_once __SITE_PATH . '/view/menu.php';
?>

  <div class="content-wrapper">
	<div class="card card-register mx-auto mt-5">
    <div class="card-header">Ova aplikacija je napravljena za potrebe kolegija RP2</div>
	<div class="card-header">Creators</div>
        <div class="card-body">
    		<div class="form-group">
    			Ema Dogančić: emdogan@student.math.hr
    		</div>
            <div class="form-group">
                Anastasija Jezernik: anastasija.jezernik@gmail.com
            </div>
            <div class="form-group">
    			Ana Peterfaj: ana.peterfaj@student.math.hr
    		</div>
            <div class="form-group">
    			Maja Tonček: matonce@student.math.hr
    		</div>
        </div>
	</div>


    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>

<?php
require_once __SITE_PATH . '/view/message.php';
require_once __SITE_PATH . '/view/_footer.php';
?>