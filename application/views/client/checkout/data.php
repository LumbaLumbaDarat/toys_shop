	
	<!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="<?php echo base_url('assets/admin_template/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
	
	<!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li class="active">Riwayat Transaksi</li>
                            <li <?php if($cartCount == 0) echo 'hidden'; ?>><i class="ti-arrow-right"></i><a href="<?php echo base_url('client/checkout/transaction') ?>">Proses Transaksi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table id="datatable-admin-modified" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Nomor Transaksi</th>
								<th>Total Pembayaran</th>
								<th>Tanggal Transaksi</th>
								<th>Status Pembayaran</th>
								<th>Tanggal Pembayaran</th>
								<th>Status Penerimaan</th>
								<th>Tanggal Penerimaan</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								if($transactionModel){
								$id = 1;
								foreach($transactionModel as $transaction) { ?>
								<tr>
									<td><?php echo $id++ ?></td>
									<td>
										<form action="<?php echo base_url('client/checkout/detail') ?>" method="post" novalidate>	
											<input class="form-control" class='ref_no' name="ref_no" value="<?php echo $transaction->ref_no ?>" hidden/>
											<button type="submit" class="btn" ><?php echo $transaction->ref_no ?></button>
										</form>
									</td>
									<td>IDR <?php echo $transaction->total_payment_string ?></td>
									<td><?php echo $transaction->transaction_date ?></td>
									<td><?php echo $transaction->is_payment_string ?></td>
									<td><?php echo $transaction->payment_date ?></td>
									<td><?php echo $transaction->is_received_string ?></td>
									<td><?php echo $transaction->received_date ?></td>
								</tr>
							<?php }} ?>
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->

	<!-- Bootstrap -->
	<script src="<?php echo base_url('assets/admin_template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>