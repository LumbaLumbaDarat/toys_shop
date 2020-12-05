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
                    <h2>Login</h2>
                    <p>Masukkan Email dan Password Anda</p>
                    <!-- Form -->
                    <form class="form" name="form_login" method="post" action="">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Email<span>*</span></label>
                                    <input type="email" name="email" id="email" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Password<span>*</span></label>
                                    <input type="password" name="password" id="password" placeholder="" required="required">
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
                            <p style="text-align:justify">Untuk melakukan Belanja dan Transaksi Anda harus memiliki Akun Toko Kami. Belum memiliki Akun Toko Kami ?</p>
                        </div>
                    </div>
                    <div class="single-widget get-button">
                        <div class="content">
                            <div class="button">
                                <a href="<?php echo base_url('client/registration') ?>" class="btn">Registrasi</a>
                            </div>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Button Widget -->
                    <div class="single-widget get-button">
                        <div class="content">
                            <div class="button">
                                <form class="form" method="post" action="<?php echo base_url('client/login/verify') ?>">
                                    <textarea name="login" id="login" placeholder="" required="required" hidden></textarea>
                                    <button type="submit" class="btn" onclick="return validateLogin()">Login</button>
                                </form>
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

<script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.js') ?>"></script>
<script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.buttons.js') ?>"></script>
<script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.nonblock.js') ?>"></script>

<script>
function validateLogin()
{
    var email         = document.querySelector('#email').value;
    var password      = document.querySelector('#password').value;

    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if(email == '')
    {
        errorNotification("Email", "Email Tidak Valid !");
        document.form_login.email.focus();
        return false;
    }else{
        if(email.match(mailformat))
        {
            if(password == '')
            {
                errorNotification("Password", "Password Tidak Valid !");
                document.form_login.password.focus();
                return false;
            }else{

                var loginObject = {
                    email:email,
                    password:password
                }

                var loginJSON = JSON.stringify(loginObject);
                document.getElementById("login").value = loginJSON;
                return true;
            }
        }else{
            errorNotification("Email", "Email Tidak Valid !");
            document.form_login.email.focus();
            return false;
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