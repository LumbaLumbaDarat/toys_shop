        <!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
                            <?php if($this->session->flashdata('message')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?php echo $this->session->flashdata('message'); ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
							<h2>Profil</h2>
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
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<form class="form" method="post" action="<?php echo base_url('client/usersclient/form') ?>">
											<input type="text" name="state_update" id="state_update" value="UPDATE_PASSWORD" hidden>
											<button type="submit" class="btn">Ubah Password</button>
										</form>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<form class="form" method="post" action="<?php echo base_url('client/usersclient/form') ?>">
											<input type="text" name="state_update" id="state_update" value="UPDATE_PROFIL" hidden>
											<button type="submit" class="btn">Ubah Profil</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->