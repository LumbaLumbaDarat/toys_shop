<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Toko Mainan | Error</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/admin_template/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/admin_template/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/admin_template/vendors/nprogress/nprogress.css" rel="stylesheet') ?>">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/admin_template/build/css/custom.min.css" rel="stylesheet') ?>">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center">
              <h1 class="error-number">400</h1>
              <h2>Request tambah Data Gagal</h2>
			  <?php 
					  $errorCode = array('Error Number: 1062');
					  foreach($errorCode as $errCd)
					  {
							if(strpos($message, $errCd))
								echo '<p><h2>Kami menemukan Duplikat Data Email pada Sistem, Alamat Email yang Anda masukkan sudah Terdaftar !</h2></p>';
							else echo $message;
					  }
			  ?>
              <div class="mid_center">

              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/admin_template/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
   <script src="<?php echo base_url('assets/admin_template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/admin_template/vendors/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/admin_template/vendors/nprogress/nprogress.js') ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/admin_template/build/js/custom.min.js') ?>"></script>
  </body>
</html>