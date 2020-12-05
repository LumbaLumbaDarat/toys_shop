        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="<?php echo base_url('client/checkout/') ?>">Riwayat Transaksi<i class="ti-arrow-right"></i></a></li>
								<li class="active">Detail Transaksi</li>
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
                        <table class="table shopping-summery">
                            <thead>
                                <tr class="main-hading">
                                    <th>NAMA</th>
                                    <th class="text-center">HARGA SATUAN</th>
                                    <th class="text-center">KUANTITAS</th>
                                    <th class="text-center">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if($detailTransactionModel){
                                    foreach($detailTransactionModel as $detailTransaction) { ?>
                                        <tr>
                                            <td class="product-des" data-title="Description">
                                                <p class="product-name"><?php echo $detailTransaction->toy_name ?></p>
                                            </td>
                                            <td class="price" data-title="Price"><span>IDR <?php echo $detailTransaction->toy_price_string ?></span></td>
                                            <td class="qty" data-title="Qty"><!-- Input Order -->
                                                <div class="input-group">
                                                    
                                                    <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="<?php echo $detailTransaction->quantity ?>" readonly>
                                                    
                                                </div>
                                                <!--/ End Input Order -->
                                            </td>
                                            <td class="total-amount" data-title="Total"><span>IDR <?php echo $detailTransaction->sub_total_string ?></span></td>
                                        </tr>
                                    <?php }} ?>
                            </tbody>
                        </table>
                        <!--/ End Shopping Summery -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Total Amount -->
                        <div class="total-amount">
                            <div class="row">
                                <div class="col-lg-8 col-md-5 col-12">
                                    <div class="left">
                                        <div class="coupon">
                                            
                                        </div>
                                        <div class="checkbox">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-7 col-12">
                                    <div class="right">
                                        <ul>
                                            <li>Sub Total<span>IDR <?php echo $cartSumString ?></span></li>
                                            <li>Ongkos Kirim<span>Free</span></li>
                                            <li class="last">Pembayaran<span>IDR <?php echo $cartSumString ?></span></li>
                                        </ul>
                                        <div class="button5">
                                            <form class="form" method="post" action="<?php echo base_url('client/contact') ?>">
                                                <input class="form-control" class='ref_no' name="ref_no" value="<?php echo $ref_no ?>" hidden/>
                                                <button type="submit" class="btn "><?php echo $button_submit_name ?></button>
                                            </form>
                                            <!-- <a href="<?php echo base_url('client/contact') ?>" class="btn" <?php if($is_payment == 'Y') echo 'hidden'; ?> >Kirim Bukti Pembayaran</a>
                                            <a href="<?php echo base_url('client/contact') ?>" class="btn" <?php if($is_payment == 'N' || $is_received == 'Y') echo 'hidden'; ?> >Kirim Bukti Barang Sampai</a>
                                            <a href="<?php echo base_url('client/contact') ?>" class="btn" <?php if($is_payment == 'N' && $is_received == 'N') echo 'hidden'; ?>>Selesaikan Transaksi</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Total Amount -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Shopping Cart -->