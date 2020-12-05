    <!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Bebas Ongkos Kirim</h4>
						<p>Pemesanan diatas 1 Juta Rupiah</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Pengembalian Barang</h4>
						<p>Garansi Toko selama 3 Hari</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Pembayaran Aman</h4>
						<p>Pembayaran melalui Transfer Rekening Bank</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Harga Terbaik</h4>
						<p>Harga Terbaik dan Termurah, sesuai dengan Kualitas</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="<?php echo base_url('client/dashboard') ?>"><img src="<?php echo base_url('assets/images/images_apps/'.$icon) ?>" alt="#"></a>
							</div>
							<p class="text">Toko Mainan yang berada di jalan Salemba Tengah ini telah berdiri lebih dari 5 Tahun, dan terpercaya sebagai Distributor Mainan Anak yang berkualitas.</p>
							<p class="call">Punya pertanyaan ? Hubungi Kami 24/7<span><a href="tel:+6288784191006">+62 887 8419 1006</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Alamat Toko</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>Jalan Salemba Tengah No.33 RT09 RW02 Kelurahan Salemba, Kecamatan Senen, Jakarta Pusat</li>
									<li>tokomainansupport@gmail.com</li>
									<li>+62 887 8419 1006</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
 
	<script>
      $(document).ready(function () {
    
        $('#datatable-admin-modified').DataTable({
            dom: "Blfrtip",
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excel",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
        });

        $('#datatable-admin-report').DataTable({
            dom: "Blfrtip",
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excel",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                ],
                responsive: true
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust()
            .responsive.recalc();
        });
    });
  	</script>

	<!-- Jquery -->
    <script src="<?php echo base_url('assets/client_template/js/jquery.min.js') ?>"></script>
	<!-- Flex Slider JS -->
	<script src="<?php echo base_url('assets/client_template/js/flex-slider.js') ?>"></script>
    <script src="<?php echo base_url('assets/client_template/js/jquery-migrate-3.0.0.js') ?>"></script>
	<script src="<?php echo base_url('assets/client_template/js/jquery-ui.min.js') ?>"></script>
	<!-- Popper JS -->
	<script src="<?php echo base_url('assets/client_template/js/popper.min.js') ?>"></script>
	<!-- Bootstrap JS -->
	<script src="<?php echo base_url('assets/client_template/js/bootstrap.min.js') ?>"></script>
	<!-- Slicknav JS -->
	<script src="<?php echo base_url('assets/client_template/js/slicknav.min.js') ?>"></script>
	<!-- Owl Carousel JS -->
	<script src="<?php echo base_url('assets/client_template/js/owl-carousel.js') ?>"></script>
	<!-- Magnific Popup JS -->
	<script src="<?php echo base_url('assets/client_template/js/magnific-popup.js') ?>"></script>
	<!-- Waypoints JS -->
	<script src="<?php echo base_url('assets/client_template/js/waypoints.min.js') ?>"></script>
	<!-- Countdown JS -->
	<script src="<?php echo base_url('assets/client_template/js/finalcountdown.min.js') ?>"></script>
	<!-- Nice Select JS -->
	<script src="<?php echo base_url('assets/client_template/js/nicesellect.js') ?>"></script>
	<!-- ScrollUp JS -->
	<script src="<?php echo base_url('assets/client_template/js/scrollup.js') ?>"></script>
	<!-- Onepage Nav JS -->
	<script src="<?php echo base_url('assets/client_template/js/onepage-nav.min.js') ?>"></script>
	<!-- Easing JS -->
	<script src="<?php echo base_url('assets/client_template/js/easing.js') ?>"></script>
	<!-- Active JS -->
	<script src="<?php echo base_url('assets/client_template/js/active.js') ?>"></script>

	<!-- jQuery
	<script src="<?php echo base_url('assets/admin_template/vendors/jquery/dist/jquery.min.js') ?>"></script> -->

	<!-- Datatables -->
	<script src="<?php echo base_url('assets/admin_template/vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/jszip/dist/jszip.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/pdfmake/build/pdfmake.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_template/vendors/pdfmake/build/vfs_fonts.js') ?>"></script>
</body>