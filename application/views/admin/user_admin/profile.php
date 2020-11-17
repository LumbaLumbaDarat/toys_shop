<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <?php if($this->session->flashdata('message')) : 
                        $messages = explode('|', $this->session->flashdata('message'));
                        $alert = trim($messages[0], ' ');
                        $message = trim($messages[1], ' ');
                    ?>
                    <div class="alert <?php echo $alert; ?> alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <?php echo $message; ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User Report <small>Activity report</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-circle profile_img edit-avatar" src="<?php echo base_url('assets/images/images_user_admin/'.$usersAdminModel->photo_profile)?>" alt="Avatar" title="Sesuaikan Foto User Admin" style="width:200px;height:200px;">
                                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel">
                                            <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h4 class="panel-title">Ubah Foto Profil</h4>
                                            </a>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <form class="" action="<?php echo base_url($base_url)?>" enctype="multipart/form-data" method="post" novalidate>
                                                        <div class="field item form-group">
                                                            <div class="col-md-6 col-sm-6">
                                                                <input type="file" class="form-control-file" id="photo_profile" name="photo_profile" onchange="previewImg()" required/>
                                                                <input class="form-control" class='id' name="id" value="EDIT_PHOTO_PROFILE_VIA_PROFILE | <?php echo $usersAdminModel->id ?>" hidden/>
                                                            </div>
                                                        </div>
                                                        <div class="ln_solid">
                                                            <div class="field form-group">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <button type='reset' class="btn btn-success" onclick="resetImg('<?php echo base_url('assets/images/images_user_admin/'.$usersAdminModel->photo_profile)?>')"> Reset</button>
                                                                    <button type="submit" class="btn btn-primary" >Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="profile_title">
                                <div class="col-md-6">
                                    <h2><?php echo $usersAdminModel->name ?></h2>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="message_wrapper">
                                    <br />
                                    <h4 class="heading"><i class="fa fa-user"></i> Username dan <i class="fa fa-envelope"></i> Email</h4>
                                    <h4><blockquote class="message"><?php echo $usersAdminModel->email ?></blockquote></h4>
                                    <br />
                                    <h4 class="heading"><i class="fa fa-users"></i> Role User</h4>
                                    <h4><blockquote class="message"><?php echo $usersAdminModel->user_role ?></blockquote></h4>
                                    <br />
                                    <h4 class="heading"><i class="fa fa-male"></i><i class="fa fa-female"></i> Jenis Kelamin</h4>
                                    <h4><blockquote class="message"><?php echo $usersAdminModel->sex_name ?></blockquote></h4>
                                    <br />
                                    <h4 class="heading"><i class="fa fa-birthday-cake"></i> Tanggal Lahir</h4>
                                    <h4><blockquote class="message"><?php echo $usersAdminModel->birthday ?></blockquote></h4>
                                    <br />
                                    <h4 class="heading"><i class="fa fa-home"></i> Alamat, Tempat Tinggal</h4>
                                    <h4><blockquote class="message"><?php echo $usersAdminModel->address ?></blockquote></h4>
                                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel">
                                            <a class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <h4 class="panel-title">Ubah Alamat</h4>
                                            </a>
                                            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    <form class="" id="form_edit_profile_address" action="<?php echo base_url($base_url)?>" enctype="multipart/form-data" method="post" novalidate>
                                                        <div class="field item form-group">
                                                            <div class="col-md-6 col-sm-6">
                                                                <textarea id="address" required="required" class="form-control" id="address" name="address" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="500" data-parsley-minlength-message="Masukkan minimum 10 karater, untuk Alamat Tempat Tinggal..." data-parsley-validation-threshold="10"><?php echo $usersAdminModel->address ?></textarea>
                                                                <input class="form-control" class='id' name="id" value="EDIT_ADDRESS_VIA_PROFILE | <?php echo $usersAdminModel->id ?>" hidden/>
                                                            </div>
                                                        </div>
                                                        <div class="ln_solid">
                                                            <div class="field form-group">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <button type='reset' class="btn btn-success" >Reset</button>
                                                                    <button type="submit" class="btn btn-primary" onclick="return setNewParamForUpdate()">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <h4 class="heading"><i class="fa fa-calendar"></i> Tanggal User dibuat</h4>
                                    <h4><blockquote class="message"><?php echo $usersAdminModel->created_date ?></blockquote></h4>
                                    <br />
                                    <div class="ln_solid">
                                        <div class="field form-group">
                                        </div>
                                    </div>
                                    <p class="text-danger" <?php if($usersAdminModel->user_role_code == 'ADM') echo 'hidden'; ?>>
                                        Anda bukan Admin Master, Anda hanya bisa mengubah  
                                        beberapa data profil saja, seperti foto dan alamat 
                                        tempat tinggal. Jika Anda ingin mengubah data lainnya, mohon hubungi Admin Master.</p>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/admin_template/vendors/validator/multifield.js') ?>"></script>
<script src="<?php echo base_url('assets/admin_template/vendors/validator/validator.js') ?>"></script>

<script>
    function previewImg()
    {
        const foto = document.querySelector('#photo_profile');
        const imgPreview = document.querySelector('.edit-avatar');
        
        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e)
        {
            imgPreview.src = e.target.result;
        }
    }
</script>

<script>
    function resetImg(oldImage)
    {
        // alert(oldImage);
        document.querySelector('.edit-avatar').src = oldImage;
    }
</script>

<script>
    function setNewParamForUpdate()
    {
        if(!document.getElementById("address").value == null || 
            !document.getElementById("address").value == "")
        {
            return true;
        }else{
            errorNotification("Alamat Tempat Tinggal", "Alamat Tempat Tinggal Tidak Valid !");
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

<script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({
        "events": ['blur', 'input', 'change']
    }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function(e) {
        var submit = true,
            validatorResult = validator.checkAll(this);
        console.log(validatorResult);
        return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function(e) {
        validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function() {
        validator.settings.alerts = !this.checked;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);

</script>