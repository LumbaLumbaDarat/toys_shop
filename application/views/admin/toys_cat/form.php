<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            
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
                        <form class="" action="<?php echo base_url($base_url)?>" method="post" novalidate>
                            <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                            </p>
                            <span class="section">Personal Info</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Kategori<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" id="cat_name" name="cat_name" required="required" value="<?php echo $toysCategoryModel->cat_name ?>"/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Deskripsi Kategori<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea id="cat_desc" required="required" class="form-control" id="cat_desc" name="cat_desc" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="500" data-parsley-minlength-message="Masukkan minimum 10 karater, untuk Deskripsi Kategori Mainan..." data-parsley-validation-threshold="10"><?php echo $toysCategoryModel->cat_desc ?></textarea>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='id' name="id" value="<?php echo $toysCategoryModel->id ?>" hidden/></div>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='reset' class="btn btn-success">Reset</button>
                                        <button type="submit" class="btn btn-primary" <?php if(!empty($toysCategoryModel->id)) echo 'hidden'; ?>>Submit</button>
                                        <button type='button' class="btn btn-primary" onclick="setNewParamForUpdate()" <?php if(empty($toysCategoryModel->id)) echo 'hidden'; ?>>Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade bs-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Ubah Kategori Mainan</h4>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Mohon cek kembali sebelum Anda melakukan perubahan Data.</strong> Apakah Anda yakin ingin melakukan perubahan Data Kategori Mainan ini ?</p>
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
                                                        <label for="old_cat_name">Nama Kategori</label>
                                                        <input type="text" id="old_cat_name" class="form-control" name="old_cat_name" value="<?php echo $toysCategoryModel->cat_name ?>" readonly="readonly"/>
                                                        <br>
                                                        <label for="old_cat_desc">Deskripsi Kategori</label>
                                                        <textarea id="old_cat_desc" class="form-control" name="old_cat_desc" readonly><?php echo $toysCategoryModel->cat_desc ?></textarea>
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
                                                        <label for="new_cat_name">Nama Kategori</label>
                                                        <input type="text" id="new_cat_name" class="form-control" name="new_cat_name" value="<?php echo $toysCategoryModel->cat_name ?>" readonly="readonly"/>
                                                        <br>
                                                        <label for="new_cat_desc">Deskripsi Kategori</label>
                                                        <textarea id="new_cat_desc" class="form-control" name="new_cat_desc" readonly><?php echo $toysCategoryModel->cat_desc ?></textarea>
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
<!-- /page content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/admin_template/vendors/validator/multifield.js') ?>"></script>
<script src="<?php echo base_url('assets/admin_template/vendors/validator/validator.js') ?>"></script>

<script>
    function setNewParamForUpdate()
    {
        if(!document.getElementById("cat_name").value == null || 
            !document.getElementById("cat_name").value == "")
        {
            if(!document.getElementById("cat_desc").value == null || 
                !document.getElementById("cat_desc").value == "")
            {
                document.getElementById("new_cat_name").value = document.getElementById("cat_name").value;
                document.getElementById("new_cat_desc").value = document.getElementById("cat_desc").value;
            
                $('#updateModal').modal('show'); 
            }else{
                errorNotification("Deksripsi Kategori Mainan", "Deskripsi Kategori Mainan Tidak Valid !");
                return false;
            }
        }else{
            errorNotification("Nama Kategori Mainan", "Nama Kategori Mainan Tidak Valid !");
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