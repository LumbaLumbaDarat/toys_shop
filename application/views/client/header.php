<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/images_app/'.$icon) ?>">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	

	<!-- jQuery -->
	<script src="<?php echo base_url('assets/admin_template/vendors/jquery/dist/jquery.min.js') ?>"></script>
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/bootstrap.css') ?>">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/magnific-popup.min.css') ?>">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/font-awesome.css') ?>">
	<!-- Fancybox -->
	<link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/jquery.fancybox.min.css') ?>">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/themify-icons.css') ?>">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/niceselect.css') ?>">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/animate.css') ?>">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/flex-slider.min.css') ?>">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/owl-carousel.css') ?>">
	<!-- Slicknav -->
    <link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/slicknav.min.css') ?>">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/reset.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/client_template/css/responsive.css') ?>">

	<link href="<?php echo base_url('assets/admin_template/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">

</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +62 887 8419 1006</li>
								<li><i class="ti-email"></i> tokomainansupport@gmail.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								<li <?php if(!empty($this->session->userdata('client_data'))) echo 'hidden'; ?>><i class="ti-user"></i><a href="<?php echo base_url('client/registration') ?>">Registrasi</a></li>
								<li <?php if(empty($this->session->userdata('client_data'))) echo 'hidden'; ?>><i class="ti-user"></i> Selamat Datang, <a href="<?php echo base_url('client/usersclient') ?>"><?php echo $this->session->userdata('client_data')->name; ?></a></li>
								<li <?php if(!empty($this->session->userdata('client_data'))) echo 'hidden'; ?>><i class="ti-power-off"></i><a href="<?php echo base_url('client/login') ?>">Login</a></li>
								<li <?php if(empty($this->session->userdata('client_data'))) echo 'hidden'; ?>><i class="ti-power-off"></i><a href="<?php echo base_url('client/login/logout') ?>">Logout</a></li>
							</ul>
						</div>
						
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="<?php echo base_url('client/dashboard') ?>"><img src="<?php echo base_url('assets/images/images_apps/'.$icon) ?>" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar shopping" <?php if(empty($this->session->userdata('client_data'))) echo 'hidden'; ?>>
								<a href="<?php echo base_url('client/cart') ?>" class="single-icon"><i class="ti-bag"></i> <span class="total-count" <?php if(empty($cartCount)) echo 'hidden'; ?>><?php echo $cartCount ?></span></a>
								<!-- Shopping Item -->
								<div class="shopping-item" <?php if(empty($cartCount)) echo 'hidden'; ?>>
									<div class="dropdown-cart-header">
										<span><?php echo $cartCount ?> Items</span>
									</div>
									<ul class="shopping-list">
										<?php 
										if($cartModel){
										foreach($cartModel as $cart) { ?>
											<li>
												<a class="cart-img"><img src="<?php echo base_url('assets/images/images_toys/'.$cart->toy_image) ?>" alt="#"></a>
												<h4><?php echo $cart->toy_name ?></h4>
												<p class="quantity"><?php echo $cart->quantity.'x - ' ?><span class="amount">IDR <?php echo $cart->toy_price_string ?></span></p>
												<form action="<?php echo base_url($base_url_delete_cart) ?>" method="post" novalidate>
													<input type="text" class="form-control" class='id_delete' name="id_delete" value="<?php echo $cart->id ?>" hidden/>
													<button type="submit" class="remove" title="Remove this item"><i class="fa fa-remove"></i></button>
												</form>
											</li>
										<?php }} ?>
									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount">IDR <?php echo $cartSumString ?></span>
										</div>
										<a href="<?php echo base_url('client/checkout/transaction') ?>" class="btn animate">Pembayaran</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner" <?php if(empty($this->session->userdata('client_data'))) echo 'hidden'; ?>>
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
                                                <li><a href="<?php echo base_url('client/dashboard') ?>">Halaman Utama</a></li>
												<li>
													<a href="<?php echo base_url('client/cart') ?>">Keranjang Belanja</i><span class="new" <?php if(empty($cartCount)) echo 'hidden'; ?>><?php echo $cartCount ?></span></a>
												</li>
												<li><a href="<?php echo base_url('client/checkout') ?>">Transaksi</a></li>
												<li><a href="<?php echo base_url('client/contact') ?>">Kontak Kami<i class="ti-angle-down"></i><span class="new" <?php if(empty($countMessage)) echo 'hidden'; ?>><?php echo $countMessage ?> Pesan Masuk</span></a>
														<ul class="dropdown">
															<li>
																<form action="<?php echo base_url('client/contact/data') ?>" method="post" novalidate>
																	<input type="text" class="form-control" class='id_message' name="id_message" value="OUT_MESSAGE" hidden/>
																	<button type="submit" class="btn">Riwayat Pesan Keluar</button>
																</form>
															</li>
															<li>
																<form action="<?php echo base_url('client/contact/data') ?>" method="post" novalidate>
																	<input type="text" class="form-control" class='id_message' name="id_message" value="IN_MESSAGE" hidden/>
																	<button type="submit" class="btn">Riwayat Pesan Masuk</button>
																</form>
															</li>
														</ul>
													</li>
                                            </ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->