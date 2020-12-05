        <!-- PNotify -->
        <link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.buttons.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.nonblock.css') ?>" rel="stylesheet">

        <!-- Start Checkout -->
        <section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12">
						<div class="checkout-form">
                            <?php if($this->session->flashdata('message')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?php echo $this->session->flashdata('message'); ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif ?>
							<h2><?php echo $label ?></h2>
							<!-- Form -->
							<form class="form" name="form_update" method="post" action="#">
								<div class="row">
									<div class="col-12" <?php if($state_update == $update_password) echo 'hidden'; ?>>
										<div class="form-group">
											<label>Nama<span>*</span></label>
											<input type="text" name="name" id="name" placeholder="" required="required" value="<?php echo $usersClientModel->name ?>">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12" <?php if($state_update == $update_password) echo 'hidden'; ?>>
										<div class="form-group">
											<label>Email<span>*</span></label>
											<input type="email" name="email" id="email" placeholder="" required="required" value="<?php echo $usersClientModel->email ?>" readonly>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12" <?php if($state_update == $update_password) echo 'hidden'; ?>>
										<div class="form-group">
											<label>Nomor Telephone<span>*</span></label>
											<input type="text" name="phone" id="phone" placeholder="" required="required" value="<?php echo $usersClientModel->phone ?>">
                                            <small style="color:red">Contoh : 088784191006</small>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group" <?php if($state_update == $update_password) echo 'hidden'; ?>>
											<label>Alamat Rumah<span>*</span></label>
											<textarea name="address" id="address" placeholder="" required="required"><?php echo $usersClientModel->address ?></textarea>
                                            <small style="color:red">Alamat Rumah akan digunakan untuk Alamat Tujuan Pengiriman. Mohon diisi dengan benar.</small>
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12" <?php if($state_update == $update_password) echo 'hidden'; ?>>
										<div class="form-group">
											<label>Kelurahan<span>*</span></label>
											<input type="text" name="sub_district" id="sub_district" placeholder="" required="required" value="<?php echo $usersClientModel->sub_district ?>">
                                            <small style="color:red">Disesuaikan dengan Alamat Rumah</small>
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12" <?php if($state_update == $update_password) echo 'hidden'; ?>>
										<div class="form-group">
											<label>Kecamatan<span>*</span></label>
											<input type="text" name="district" id="district" placeholder="" required="required" value="<?php echo $usersClientModel->district ?>">
                                            <small style="color:red">Disesuaikan dengan Alamat Rumah</small>
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12" <?php if($state_update == $update_password) echo 'hidden'; ?>>
										<div class="form-group">
											<label>Kota<span>*</span></label>
											<input type="text" name="city" id="city" placeholder="" required="required" value="<?php echo $usersClientModel->city ?>">
                                            <small style="color:red">Disesuaikan dengan Alamat Rumah</small>
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12" <?php if($state_update == $update_password) echo 'hidden'; ?>>
										<div class="form-group">
											<label>Kode Pos<span>*</span></label>
											<input type="text" name="postal" id="postal" placeholder="" required="required" value="<?php echo $usersClientModel->postal ?>">
                                            <small style="color:red">Disesuaikan dengan Alamat Rumah. Contoh : 11112</small>
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12" <?php if($state_update == $update_profil) echo 'hidden'; ?>>
										<div class="form-group">
											<label>Password Lama<span>*</span></label>
											<input type="password" name="old_password" id="old_password" placeholder="" required="required">
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12" <?php if($state_update == $update_profil) echo 'hidden'; ?>>
										<div class="form-group">
											
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12" <?php if($state_update == $update_profil) echo 'hidden'; ?>>
										<div class="form-group">
											<label>Password Baru<span>*</span></label>
											<input type="password" name="new_password" id="new_password" placeholder="" required="required">
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12" <?php if($state_update == $update_profil) echo 'hidden'; ?>>
										<div class="form-group">
											<label>Konfirmasi Password<span>*</span></label>
											<input type="password" name="conf_new_password" id="conf_new_password" placeholder="" required="required">
										</div>
									</div>
								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
                            <div class="single-widget payement">
								<div class="content">
								    <p style="text-align:justify">Form bertanda <span style="color:red">*</span> (Bintang) Wajib diisi.</p>
                                </div>
							</div>
                            <div class="single-widget payement" <?php if($state_update == $update_password) echo 'hidden'; ?>>
								<div class="content">
								    <p style="text-align:justify">Mohon cek kembali pengisian Form Profil Anda, pastikan Alamat Rumah atau Alamat Tujuan Pengiriman Barang tidak salah, agar memudahkan proses pengiriman Barang ke Alamat Tujuan Anda.</p>
                                </div>
							</div>
							<!--/ End Order Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
                                        <form class="form" method="post" action="<?php echo base_url('client/usersclient/update') ?>">
                                            <textarea name="update" id="update" placeholder="" required="required" hidden></textarea>
                                            <button type="submit" class="btn" onclick="return validateUpdate('<?php echo $state_update ?>', '<?php echo $update_profil ?>')"><?php echo $label ?></button>
                                        </form>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <a href="<?php echo base_url('client/usersclient') ?>" class="btn">Batal</a>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->

        <script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.js') ?>"></script>
        <script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.buttons.js') ?>"></script>
        <script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.nonblock.js') ?>"></script>

        <script>
            function validateUpdate(state, paramState)
            {
                if(state.match(paramState))
                    return validateUpdateProfil(state);
                else return validateUpdatePassword(state);
            }

            function validateUpdateProfil(state)
            {
                var name          = document.querySelector('#name').value;
                var email         = document.querySelector('#email').value;
                var phone         = document.querySelector('#phone').value;
                var address       = document.querySelector('#address').value;
                var subDistrict   = document.querySelector('#sub_district').value;
                var district      = document.querySelector('#district').value;
                var city          = document.querySelector('#city').value;
                var postal        = document.querySelector('#postal').value;

                var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

                if(name == '')
                {
                    errorNotification("Nama", "Nama Tidak Valid !");
                    document.form_update.name.focus();
                    return false;
                }else{
                    if(email == '')
                    {
                        errorNotification("Email", "Email Tidak Valid !");
                        document.form_update.email.focus();
                        return false;
                    }else{
                        if(email.match(mailformat))
                        {
                            if(phone == '')
                            {
                                errorNotification("Nomor Telephone", "Nomor Telephone Tidak Valid !");
                                document.form_update.phone.focus();
                                return false;
                            }else{
                                if(isNaN(phone))
                                {
                                    errorNotification("Nomor Telephone", "Nomor Telephone Tidak Valid !");
                                    document.form_update.phone.focus();
                                    return false;
                                }else{
                                    if(phone.length <= 10)
                                    {
                                        errorNotification("Nomor Telephone", "Nomor Telephone Tidak Valid !");
                                        document.form_update.phone.focus();
                                        return false;
                                    }else{
                                        if(address == '')
                                        {
                                            errorNotification("Alamat Rumah", "Alamat Rumah Tidak Valid !");
                                            document.form_update.address.focus();
                                            return false;
                                        }else{
                                            if(subDistrict == '')
                                            {
                                                errorNotification("Kelurahan", "Kelurahan Tidak Valid !");
                                                document.form_update.sub_district.focus();
                                                return false;
                                            }else{
                                                if(district == '')
                                                {
                                                    errorNotification("Kecamatan", "Kecamatan Tidak Valid !");
                                                    document.form_update.district.focus();
                                                    return false;
                                                }else{
                                                    if(city == '')
                                                    {
                                                        errorNotification("Kota", "Kota Tidak Valid !");
                                                        document.form_update.city.focus();
                                                        return false;
                                                    }else{
                                                        if(postal == '')
                                                        {
                                                            errorNotification("Kode Pos", "Kode Pos Tidak Valid !");
                                                            document.form_update.postal.focus();
                                                            return false;
                                                        }else{
                                                            if(isNaN(postal))
                                                            {
                                                                errorNotification("Kode Pos", "Kode Pos Tidak Valid !");
                                                                document.form_update.postal.focus();
                                                                return false;
                                                            }else{
                                                                if(postal.length != 5)
                                                                {
                                                                    errorNotification("Kode Pos", "Kode Pos Tidak Valid !");
                                                                    document.form_update.postal.focus();
                                                                    return false;
                                                                }else{
                                                                    var updateObject = {
                                                                        name:name,
                                                                        email:email,
                                                                        phone:phone,
                                                                        address:address,
                                                                        sub_district:subDistrict,
                                                                        district:district,
                                                                        city:city,
                                                                        postal:postal,
                                                                        state:state
                                                                    }

                                                                    var updateJSON = JSON.stringify(updateObject);
                                                                    document.getElementById("update").value = updateJSON;
                                                                    return true;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }else{
                            errorNotification("Email", "Format Email Tidak Valid !");
                            document.form_update.email.focus();
                            return false;
                        }
                    }
                }
            }

            function validateUpdatePassword(state)
            {
                var oldPassword     = document.querySelector('#old_password').value;
                var newPassword     = document.querySelector('#new_password').value;
                var confNewPassword = document.querySelector('#conf_new_password').value;

                if(oldPassword == '')
                {
                    errorNotification("Password", "Password Tidak Valid !");
                    document.form_update.old_password.focus();
                    return false;
                }else{
                    if(newPassword == '')
                    {
                        errorNotification("Password Baru", "Password Baru Tidak Valid !");
                        document.form_update.new_password.focus();
                        return false;
                    }else{
                        if(newPassword.length < 5)
                        {
                            errorNotification("Password Baru", "Password Baru Tidak Valid !");
                            document.form_update.new_password.focus();
                            return false;
                        }else{
                            if(confNewPassword == newPassword)
                            {
                                var updateObject = {
                                    oldPassword:oldPassword,
                                    newPassword:newPassword,
                                    confNewPassword:confNewPassword,
                                    state:state
                                }

                                var updateJSON = JSON.stringify(updateObject);
                                document.getElementById("update").value = updateJSON;
                                return true;
                            }else{
                                errorNotification("Konfirmasi Password Baru", "Password Baru dan Konfirmasi Password Baru Tidak Sama !");
                                document.form_update.conf_new_password.focus();
                                return false;
                            }
                        }
                    }
                }
            }

            function errorNotification(errorTitle, errorMessage)
            {
                new PNotify({
                    title: errorTitle,
                    text: errorMessage,
                    type: 'error',
                    hide: true,
                    delay: 1000,
                    styling: 'bootstrap3'
                });
            }
        </script>