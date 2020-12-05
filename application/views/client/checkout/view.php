        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="<?php echo base_url('client/checkout/') ?>">Riwayat Transaksi<i class="ti-arrow-right"></i></a></li>
								<li class="active">Proses Transaksi</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
							<h2>Proses Transaksi Anda</h2>
							<p>Mohon Periksa kembali Alamat Pengiriman Anda</p>
							<!-- Form -->
							<form class="form" method="post" action="">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="single-widget">
											<h2><label>Nama</label></h2>
											<div class="content">
												<ul>
													<li><?php echo $usersClientModel->name ?></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="single-widget">
											<h2><label>Email</label></h2>
											<div class="content">
												<ul>
													<li><?php echo $usersClientModel->email ?></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="single-widget">
											<h2><label>Nomor Telephone</label></h2>
											<div class="content">
												<ul>
													<li><?php echo $usersClientModel->phone ?></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="single-widget">
											<h2><label>Alamat Rumah</label></h2>
											<div class="content">
												<ul>
													<li><?php echo $usersClientModel->address ?></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="single-widget">
											<h2><label>Kecamatan</label></h2>
											<div class="content">
												<ul>
													<li><?php echo $usersClientModel->sub_district ?></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="single-widget">
											<h2><label>Kelurahan</label></h2>
											<div class="content">
												<ul>
													<li><?php echo $usersClientModel->district ?></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="single-widget">
											<h2><label>Kota</label></h2>
											<div class="content">
												<ul>
													<li><?php echo $usersClientModel->city ?></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="single-widget">
											<h2><label>Kode Pos</label></h2>
											<div class="content">
												<ul>
													<li><?php echo $usersClientModel->postal ?></li>
												</ul>
											</div>
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        
                                    </div>
								</div>
							</form>
							<div class="single-widget get-button col-lg-6 col-md-6 col-12">
								<div class="content">
									<div class="button">
										<a href="" class="btn">Edit Alamat Tujuan</a>
									</div>
								</div>
							</div>
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>TOTAL PEMBAYARAN</h2>
								<div class="content">
									<ul>
										<li>Sub Total<span> IDR <?php echo $cartSumString ?></span></li>
										<li>Ongkos Kirim<span> Free</span></li>
										<li class="last">Total<span>IDR <?php echo $cartSumString ?></span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
                            <div class="single-widget">
								<h2>METODE PEMBAYARAN</h2>
								<div class="content">
									<ul>
										<li>Transfer Rekening BCA 1400999 A/N EDWIN RUDINI</li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<p style="text-align:justify">Mohon lakukan Transfer Rekening dalam waktu 24 Jam setelah menekan Tombol Proses. Pengiriman Barang akan dilakukan setelah Proses Transfer Rekening berhasil, dan kirim Bukti Foto Rekening melalu Halaman <a href="#">Hubungi Kami</a>. Jika Transfer Rekening dalam Waktu 24 Jam tidak dilakukan maka Proses Pembelian Barang akan Kami anggap Tidak Jadi.</p>
								</div>
							</div>
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<a href="<?php echo base_url('client/checkout/save') ?>" class="btn">Jalankan Transaksi</a>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->