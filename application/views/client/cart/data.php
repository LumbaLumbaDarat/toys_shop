<!-- Shopping Cart -->
<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUK</th>
								<th>NAMA</th>
								<th class="text-center">HARGA SATUAN</th>
								<th class="text-center">KUANTITAS</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                                if($cartModel){
                                foreach($cartModel as $cart) { ?>
                                    <tr>
                                        <td class="image" data-title="No"><img src="<?php echo base_url('assets/images/images_toys/'.$cart->toy_image) ?>" alt="#"></td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-name"><?php echo $cart->toy_name ?></p>
                                        </td>
                                        <td class="price" data-title="Price"><span>IDR <?php echo $cart->toy_price_string ?></span></td>
                                        <td class="qty" data-title="Qty"><!-- Input Order -->
                                            <div class="input-group">
                                                
                                                <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="<?php echo $cart->quantity ?>" readonly>
                                                
                                            </div>
                                            <!--/ End Input Order -->
                                        </td>
                                        <td class="total-amount" data-title="Total"><span>IDR <?php echo $cart->sub_total_string ?></span></td>
                                        <td class="action" data-title="Remove">
                                            <form action="<?php echo base_url($base_url_delete_cart) ?>" method="post" novalidate>
                                                <input type="text" class="form-control" class='id_delete' name="id_delete" value="<?php echo $cart->id ?>" hidden/>
                                                <button type="submit" class="btn remove" ><i class="ti-trash remove-icon"></i></button>
                                            </form>
                                        </td>
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
										<a href="<?php echo base_url('client/checkout/transaction') ?>" class="btn" <?php if($cartCount == 0) echo 'hidden'; ?> >Pembayaran</a>
										<a href="<?php echo base_url('client/dashboard') ?>" class="btn">Lanjut Belanja</a>
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