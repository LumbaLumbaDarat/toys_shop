	<!-- Bootstrap -->
	<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="<?php echo base_url('assets/admin_template/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
			
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
								<th><?php if($inOutMessage == 'OUT_MESSAGE') echo 'Pesan Untuk'; else echo 'Pesan Dari'; ?></th>
								<th>Subjek</th>
								<th>Tanggal dibuat</th>
								<th>Dibaca oleh</th>
								<th>Tanggal dibaca</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								if($messageModel){
								$id = 1;
								foreach($messageModel as $message) { ?>
								<tr>
									<td><?php echo $id++ ?></td>
									<td><?php if($message->inOut == 'OUT_MESSAGE') echo $message->message_to_string; else echo $message->message_from; ?></td>
									<td>
										<form action="<?php echo base_url('client/contact') ?>" method="post" novalidate>	
											<input class="form-control" class='id_detail' name="id_detail" value="<?php echo $message->id ?>" hidden/>
											<button type="submit" class="btn" ><?php echo $message->subject ?></button>
										</form>
									</td>
									<td><?php echo $message->created_date ?></td>
									<td><?php echo $message->read_by ?></td>
									<td><?php echo $message->read_date ?></td>
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