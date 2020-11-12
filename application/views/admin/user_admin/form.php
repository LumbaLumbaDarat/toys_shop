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
                                    <img class="img-thumbnail avatar-view" src="<?php echo base_url('assets/images/images_user_admin/'.$usersAdminModel->photo_profile) ?>" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <form class="" id="formUsersAdmin" action="<?php echo base_url($base_url)?>" enctype="multipart/form-data" method="post" novalidate>
                                <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                                </p>
                                <span class="section">Personal Info</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" required="required" value="<?php echo $usersAdminModel->name ?>"/>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">email<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="email" class='email' required="required" type="email" value="<?php echo $usersAdminModel->email ?>" <?php if(!empty($usersAdminModel->email)) echo 'readonly="readonly"'; ?>/></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Confirm email address<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="email" class='email' name="confirm_email" data-validate-linked='email' required='required' /></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="control-label col-md-3 col-sm-3 label-align">Select<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" class='user_role' name="user_role" required>
                                            <?php 
                                                $userAdminRole = $usersAdminModel->user_role;
                                                if($usersRoleModel){
                                                foreach($usersRoleModel as $usersRole) { ?>
                                                <option <?php if(!empty($userAdminRole) && $usersRole->role_code == $userAdminRole) echo 'selected="selected"'; ?>><?php echo $usersRole->role_code.' | '.$usersRole->role_name; ?></option>    
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="control-label col-md-3 col-sm-3 label-align">Example file input</label>
                                    <div class="col-md-6 col-sm-6 ">
                                    <input type="file" class="form-control-file" id="photo_profile" name="photo_profile" onchange="previewImg()" <?php if(empty($usersAdminModel->id)) echo 'required'; ?>/>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='id' name="id" value="<?php echo $usersAdminModel->id ?>" hidden/></div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>
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
        const imgPreview = document.querySelector('.avatar-view');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e)
        {
            imgPreview.src = e.target.result;
        }
    }
</script>

<!-- Javascript functions	-->
<!-- <script>
    function hideshow(){
        var password = document.getElementById("password1");
        var slash = document.getElementById("slash");
        var eye = document.getElementById("eye");
        
        if(password.type === 'password'){
            password.type = "text";
            slash.style.display = "block";
            eye.style.display = "none";
        }
        else{
            password.type = "password";
            slash.style.display = "none";
            eye.style.display = "block";
        }

    }
</script> -->

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