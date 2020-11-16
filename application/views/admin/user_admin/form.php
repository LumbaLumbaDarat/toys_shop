<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form validation <small>sub title</small></h2>
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
                                    <img class="img-thumbnail avatar-view edit-avatar" src="<?php echo base_url('assets/images/images_user_admin/'.$usersAdminModel->photo_profile) ?>" alt="Avatar" title="Sesuaikan Foto User Admin">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <form class="" id="formUsersAdmin" action="<?php echo base_url($base_url)?>" enctype="multipart/form-data" method="post" novalidate>
                                <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                                </p>
                                <span class="section">Personal Info</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama User Admin<span class="required text-danger">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" id="name" name="name" required="required" value="<?php echo $usersAdminModel->name ?>"/>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email User Admin<span class="required text-danger">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" id="email" name="email" class='email' required="required" type="email" value="<?php echo $usersAdminModel->email ?>" <?php if(!empty($usersAdminModel->email)) echo 'readonly="readonly"'; ?>/>
                                        <label class="text-danger">Email harus unik, Email akan digunakan sebagai User Name Admin.</label>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Kelamin<span class="required text-danger">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <?php 
                                            $oldSex;
                                            $sex = $usersAdminModel->sex;
                                            if($sexTypeModel){
                                            foreach($sexTypeModel as $sexType) { 
                                                if(!empty($sex) && $sexType->id == $sex)
                                                        $oldSex = $sexType->name; ?>
                                        <div class="radio">
                                            <input type="radio" class="flat" name="sex" id="<?php echo 'sex_'.$sexType->id ?>" value="<?php echo $sexType->id ?>" <?php if(empty($sexType->id) && $usersAdminModel->sex == 'L') { echo 'checked'; } else { if($sexType->id == $usersAdminModel->sex) echo 'checked'; } ?> /> <label><?php echo $sexType->name ?></label>
                                        </div>
                                        <?php }} ?>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="control-label col-md-3 col-sm-3 label-align">Tanggal Lahir<span class="required text-danger">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="birthday" name="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?php echo $usersAdminModel->birthday ?>">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat Tempat Tinggal<span class="required text-danger">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea id="address" required="required" class="form-control" id="address" name="address" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="500" data-parsley-minlength-message="Masukkan minimum 10 karater, untuk Alamat Tempat Tinggal..." data-parsley-validation-threshold="10"><?php echo $usersAdminModel->address ?></textarea>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="control-label col-md-3 col-sm-3 label-align">Foto Profil<span class="required text-danger">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" class="form-control-file" id="photo_profile" name="photo_profile" onchange="previewImg()" <?php if(empty($usersAdminModel->id)) echo 'required'; ?>/>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="control-label col-md-3 col-sm-3 label-align">User Admin sebagai<span class="required text-danger">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" class='user_role' id="user_role" name="user_role" required>
                                            <?php 
                                                $oldUserAdminRole;
                                                $userAdminRole = $usersAdminModel->user_role;
                                                if($usersRoleModel){
                                                foreach($usersRoleModel as $usersRole) { 
                                                    if(!empty($userAdminRole) && $usersRole->role_code == $userAdminRole)
                                                        $oldUserAdminRole = $usersRole->role_code.' | '.$usersRole->role_name; ?>
                                                <option <?php if(!empty($userAdminRole) && $usersRole->role_code == $userAdminRole) echo 'selected="selected"'; ?>><?php echo $usersRole->role_code.' | '.$usersRole->role_name; ?></option>    
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Konfirmasi Email<span class="required text-danger">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="email" class='email' id="confirm_email" name="confirm_email" data-validate-linked='email' required='required' />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='id' name="id" value="<?php echo $usersAdminModel->id ?>" hidden/>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="control-label col-md-3 col-sm-3 label-align"></label>
                                    <div class="col-md-6 col-sm-6">
                                        <label class="text-danger">Wajib diisi untuk setiap Form bertanda *</label>
                                    </div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='reset' class="btn btn-success">Reset</button>
                                            <button type="submit" class="btn btn-primary" <?php if(!empty($usersAdminModel->id)) echo 'hidden'; ?>>Submit</button>
                                            <button type='button' class="btn btn-primary" onclick="setNewParamForUpdate()" <?php if(empty($usersAdminModel->id)) echo 'hidden'; ?>>Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade bs-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Ubah User Admin</h4>
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Mohon cek kembali sebelum Anda melakukan perubahan Data.</strong> Apakah Anda yakin ingin melakukan perubahan Data User Admin ini ?</p>
                                                <div class="col-md-6">
                                                    <div class="x_panel">
                                                        <div class="x_title">
                                                            <h2>Data Lama <small>sub title</small></h2>
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
                                                            <label for="old_name">Nama User Admin</label>
                                                            <input type="text" id="old_name" class="form-control" name="old_name" value="<?php echo $usersAdminModel->name ?>" readonly="readonly"/>
                                                            <br>
                                                            
                                                            <label for="old_email">Email User Admin</label>
                                                            <input type="text" id="old_email" class="form-control" name="old_email" value="<?php echo $usersAdminModel->email ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="old_sex">Jenis Kelamin</label>
                                                            <input type="text" id="old_sex" class="form-control" name="old_sex" value="<?php echo $oldSex ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="old_birthday">Tanggal Lahir</label>
                                                            <input type="text" id="old_birthday" class="form-control" name="old_birthday" value="<?php echo $usersAdminModel->birthday ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="old_address">Alamat Tempat Tinggal</label>
                                                            <textarea id="old_address" class="form-control" name="old_address" readonly><?php echo $usersAdminModel->address ?></textarea>
                                                            <br>
                                                            <label for="old_user_role">User Admin sebagai</label>
                                                            <input type="text" id="old_user_role" class="form-control" name="old_user_role" value="<?php echo $oldUserAdminRole ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="old_user_role">Foto Profil</label>
                                                            <img class="img-thumbnail avatar-view old-avatar" src="<?php echo base_url('assets/images/images_user_admin/'.$usersAdminModel->photo_profile) ?>" alt="Avatar" title="Foto User Admin Lama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="x_panel">
                                                        <div class="x_title">
                                                            <h2>Data Baru <small>sub title</small></h2>
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
                                                            <label for="new_name">Nama User Admin</label>
                                                            <input type="text" id="new_name" class="form-control" name="new_name" value="<?php echo $usersAdminModel->name ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="new_email">Email User Admin</label>
                                                            <input type="text" id="new_email" class="form-control" name="new_email" value="<?php echo $usersAdminModel->email ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="new_sex">Jenis Kelamin</label>
                                                            <input type="text" id="new_sex" class="form-control" name="new_sex" value="<?php echo $usersAdminModel->sex ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="new_birthday">Tanggal Lahir</label>
                                                            <input type="text" id="new_birthday" class="form-control" name="new_birthday" value="<?php echo $usersAdminModel->birthday ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="new_address">Alamat Tempat Tinggal</label>
                                                            <textarea id="new_address" class="form-control" name="new_address" readonly><?php echo $usersAdminModel->address ?></textarea>
                                                            <br>
                                                            <label for="new_user_role">User Admin sebagai</label>
                                                            <input type="text" id="new_user_role" class="form-control" name="new_user_role" readonly="readonly"/>
                                                            <br>
                                                            <label for="new_photo_profile">Foto Profil</label>
                                                            <img class="img-thumbnail avatar-view new-avatar" src="<?php echo base_url('assets/images/images_user_admin/'.$usersAdminModel->photo_profile) ?>" alt="Avatar" title="Foto User Admin Baru">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-warning">Ubah</button>
                                            </div>
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
<!-- /page content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/admin_template/vendors/validator/multifield.js') ?>"></script>
<script src="<?php echo base_url('assets/admin_template/vendors/validator/validator.js') ?>"></script>

<script>
    function previewImg()
    {
        const foto = document.querySelector('#photo_profile');
        const imgPreview = document.querySelector('.edit-avatar');
        const newImgPreview = document.querySelector('.new-avatar');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e)
        {
            imgPreview.src = e.target.result;
            newImgPreview.src = e.target.result;
        }
    }
</script>

<script>
    function setNewParamForUpdate()
    {
        if(!document.getElementById("name").value == null || 
            !document.getElementById("name").value == "")
        {
            if(!document.getElementById("address").value == null || 
                !document.getElementById("address").value == "")
            {
                if(!document.getElementById("confirm_email").value == null || 
                    !document.getElementById("confirm_email").value == "")
                {
                    if(document.getElementById("email").value == 
                        document.getElementById("confirm_email").value)
                        {
                            var sex;
                            if(document.querySelector('input[name = sex]:checked').value == "L")
                                sex = "Laki-Laki";
                            else sex = "Perempuan";

                            document.getElementById("new_name").value = document.getElementById("name").value;
                            document.getElementById("new_email").value = document.getElementById("email").value;
                            document.getElementById("new_sex").value = sex;
                            document.getElementById("new_birthday").value = document.getElementById("birthday").value;
                            document.getElementById("new_address").value = document.getElementById("address").value;
                            document.getElementById("new_user_role").value = document.getElementById("user_role").value;

                            $('#updateModal').modal('show'); 
                        }else{
                            errorNotification("Email", "Email dan Konfirmasi Email Tidak Valid !");
                            return false;
                        }
                }else{
                    errorNotification("Konfirmasi Email", "Konfirmasi Email Tidak Valid !");
                    return false;
                }
            }else{
                errorNotification("Alamat Tempat Tinggal", "Alamat Tempat Tinggal Tidak Valid !");
                return false;
            }
        }else{
            errorNotification("Nama User Admin", "Nama User Admin Tidak Valid !");
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