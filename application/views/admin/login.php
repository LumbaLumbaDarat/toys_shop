<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Toko Mainan | Dashboard Login</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/admin_template/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url('assets/admin_template/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo base_url('assets/admin_template/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
        <!-- Animate.css -->
        <link href="<?php echo base_url('assets/admin_template/vendors/animate.css/animate.min.css') ?>" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?php echo base_url('assets/admin_template/build/css/custom.min.css') ?>" rel="stylesheet">

        <!-- PNotify -->
        <link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.buttons.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.nonblock.css') ?>" rel="stylesheet">

        <!-- jQuery -->
        <script src="<?php echo base_url('assets/admin_template/vendors/jquery/dist/jquery.min.js') ?>"></script>

        <script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.js') ?>"></script>
        <script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.buttons.js') ?>"></script>
        <script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.nonblock.js') ?>"></script>
    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <?php if($this->session->flashdata('message')) : 
                                $messages = explode('|', $this->session->flashdata('message'));
                                $alert = trim($messages[0], ' ');
                                $message = trim($messages[1], ' '); ?>
                                <div class="alert <?php echo $alert; ?> alert-dismissible " role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <?php echo $message; ?>
                                </div>
                        <?php endif ?>
                        <form class="" action="<?php echo base_url($base_url)?>" method="post" novalidate>
                            <h1>Login Dashboard Toko Mainan</h1>
                            <div>
                                <input type="email" class='form-control' id="email" name="email" placeholder="Username" required='required' />
                            </div>
                            <div>
                                <input type="password" class='form-control' id="password" name="password" placeholder="Password" required />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-default submit" onclick="return validateLogin()">Log In</button>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><i class="fa fa-gift"></i> Toko Mainan</h1>
                                    <p>©<?php echo $copyrightDate ?> All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template, 
                                        <a href="<?php echo $gentelellaLink ?>" target="_blank">get it here !</a>. 
                                        CodeIgniter 3.11 PHP framework <a href="<?php echo $codeIginiterLink ?>" target="_blank">get it here !</a>.
                                        Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>

    <script>
        function validateLogin()
        {
            if(!document.getElementById("email").value == null || 
                !document.getElementById("email").value == "")
            {
                if(!document.getElementById("password").value == null || 
                    !document.getElementById("password").value == "")
                {
                    return true;
                }else{
                    errorNotification("Password", "Password Tidak Valid !");
                    return false;
                }
            }else{
                errorNotification("Username", "Username Tidak Valid !");
                return false;
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
</html>
