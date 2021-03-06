<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>
      <?php 
      if(!empty($title))
              echo "Toko Mainan | Admin Dashboard | ".$title;
            else echo "Toko Mainan | Admin Dashboard"?>
    </title>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/admin_template/vendors/jquery/dist/jquery.min.js') ?>"></script>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/admin_template/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/admin_template/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/admin_template/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('assets/admin_template/vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('assets/admin_template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') ?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('assets/admin_template/vendors/jqvmap/dist/jqvmap.min.css') ?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('assets/admin_template/vendors/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/admin_template/build/css/custom.min.css') ?>" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="<?php echo base_url('assets/admin_template/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/admin_template/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/admin_template/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('assets/admin_template/vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="<?php echo base_url('assets/admin_template/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/admin_template/build/css/custom.min.css') ?>" rel="stylesheet">

    <!-- PNotify -->
    <link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.buttons.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.nonblock.css') ?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('admin/dashboard/') ?>" class="site_title"><i class="fa fa-gift"></i> <span>Toko Mainan</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url('assets/images/images_user_admin/'.$usersAdminModel->photo_profile) ?>" class="img-circle profile_img" style="width:65px;height:65px;">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $usersAdminModel->name ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section" <?php if($usersAdminModel->user_role == 'ADO') echo 'hidden' ?> >
                <h3>Pemeliharaan User</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-users"></i> User Admin<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('admin/usersadmin/') ?>">Data User Admin</a></li>
                      <li><a href="<?php echo base_url('admin/usersadmin/form') ?>">Tambah User Admin</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo base_url('admin/usersclient/') ?>"><i class="fa fa-users"></i> Client</a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Pemeliharaan Produk</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-tag"></i> Kategori Mainan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('admin/toyscategory/') ?>">Data Kategori</a></li>
                      <li><a href="<?php echo base_url('admin/toyscategory/form') ?>">Tambah Kategori</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-gift"></i> Mainan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('admin/toys/') ?>">Data Mainan</a></li>
                      <li><a href="<?php echo base_url('admin/toys/form') ?>">Tambah Mainan</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Pemeliharaan Transaksi</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url('admin/cart/') ?>"><i class="fa fa-shopping-cart"></i> Keranjang Belanja </a></li>
                  <li><a href="<?php echo base_url('admin/transaction/') ?>"><i class="fa fa-credit-card"></i> Riwayat Transaksi </a></li>             
                </ul>
              </div>
              <!-- <div class="menu_section">
                <h3>Pengaturan</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url('admin/usersadmin/profil') ?>"><i class="fa fa-leaf"></i> Profile </a></li>
                  <li><a href="<?php echo base_url('admin/usersadmin/password') ?>"><i class="fa fa-key"></i> Ubah Password </a></li>
                  <li><a href="<?php echo base_url('admin/login/logout') ?>"><i class="fa fa-sign-out"></i> Log out </a></li>                
                </ul>
              </div> -->

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url('assets/images/images_user_admin/'.$usersAdminModel->photo_profile) ?>" alt=""><?php echo $usersAdminModel->name ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="<?php echo base_url('admin/usersadmin/profil') ?>"> Profile </a>
                    <a class="dropdown-item"  href="<?php echo base_url('admin/usersadmin/password') ?>"> Ubah Password </a>
                    <a class="dropdown-item"  href="<?php echo base_url('admin/login/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out </a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green" <?php if($countMessage == 0) echo 'hidden'; ?>><?php echo $countMessage; ?></span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <?php 
                    if($messageModel){
                        $id = 1;
                    foreach($messageModel as $message) { ?>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span>
                            <span><strong><?php echo $message->message_from; ?></strong></span>
                          </span>
                          <span class="message">
                            <?php echo $message->subject; ?>
                          </span>
                        </a>
                      </li>
                    <?php }} ?>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item" href="<?php echo base_url('admin/message/')?>">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->