	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Produk Mainan yang Kami Jual</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
								<?php 
									if($toysCategoryModel){
									foreach($toysCategoryModel as $toysCategory) { ?>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="<?php echo '#'.$toysCategory->id ?>" role="tab"><?php echo $toysCategory->cat_name ?></a></li>
								<?php }} ?>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<?php 
									if($toysModel){
									foreach($toysModel as $toys) { 
										// var_dump($toys) ?>
										<div class="tab-pane fade show active" id="<?php echo $toys->id_cat ?>" role="tabpanel">
											<div class="tab-single">
												<div class="row">
													<?php 
														$newToysModel = $toys->toys;
														if($newToysModel){
														foreach($newToysModel as $toysModel) { 
															// var_dump($toysModel) ?>
															<div class="col-xl-3 col-lg-4 col-md-4 col-12">
																<div class="single-product">
																	<div class="product-img">
																		<a data-toggle="modal" data-target="#exampleModal" href="" onclick="detail(<?php echo $toysModel->id ?>)">
																			<img class="default-img" src="<?php echo base_url('assets/images/images_toys/'.$toysModel->toy_image) ?>" alt="#">
																			<img class="hover-img" src="<?php echo base_url('assets/images/images_toys/'.$toysModel->toy_image) ?>" alt="#">
																		</a>
																		<div class="button-head" <?php if(empty($this->session->userdata('client_data'))) echo 'hidden'; ?>>
																			<div class="product-action">
																			
																			</div>
																			<div class="product-action-2">
																				<form action="<?php echo base_url($base_url_cart) ?>" method="post" novalidate>
																					<label name="toy_model" id="toy_model<?php echo $toysModel->id ?>" hidden><?php echo json_encode($toysModel); ?></label>	
																					<input class="form-control" class='id' name="id" value="<?php echo $toysModel->id ?>" hidden/>
																					<button type="submit" class="btn btn-primary" >Add to cart</button>
																				</form>
																			</div>
																		</div>
																	</div>
																	<div class="product-content">
																		<h3><a data-toggle="modal" data-target="#exampleModal" href="" onclick="detail(<?php echo $toysModel->id ?>)"><?php echo $toysModel->toy_name ?></a></h3>
																		<div class="product-price">
																			<span>IDR <?php echo $toysModel->toy_price_string ?></span>
																		</div>
																	</div>
																</div>
															</div>
													<?php }} ?>
												</div>
											</div>
										</div>
								<?php }} ?>
								<!--/ End Single Tab -->
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- End Product Area -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                                <div class="product-gallery">
                                	<img id="new_toy_img" src="" alt="#" style="height:510px;">
                                </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2 id="new_toy_name">Flared Shift Dress</h2>
                                <div class="quickview-ratting-review">
                                    <div>
										<button class="btn remove" id="new_toy_quantity"> 5 </button> Stok Barang
                                    </div>
                                </div>
                                <h3 id="new_toy_price">$29.00</h3>
                                <div class="quickview-peragraph">
                                    <p id="new_toy_desc" style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        
                                    </div>
                                </div>
								<form action="<?php echo base_url($base_url_cart) ?>" method="post" novalidate <?php if(empty($this->session->userdata('client_data'))) echo 'hidden'; ?>>
									<div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quantity">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" id='quantity' name="quantity" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quantity">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<input type="text" class="form-control" class='id_add' id='id_add' name="id_add" hidden/>
										<button type="submit" class="btn btn-primary">Add to cart</button>
									</div>
								</form>
                                <div class="default-social">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

	<script>
		function detail(id)
		{
			var toysRaw = document.getElementById("toy_model"+id).textContent;
			var toysModel = JSON.parse(toysRaw);

			document.getElementById("new_toy_name").innerHTML = toysModel.toy_name;
			document.getElementById("new_toy_quantity").innerHTML = toysModel.toy_quantity_ready;
			document.getElementById("new_toy_price").innerHTML = "IDR " + toysModel.toy_price_string;
			document.getElementById("new_toy_desc").innerHTML = toysModel.toy_desc;
			document.getElementById("new_toy_img").src = toysModel.toy_image_url;
			document.getElementById("id_add").value = toysModel.id;
		}
	</script>

