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
                                    <img class="img-circle profile_img edit-avatar" src="<?php echo base_url('assets/images/images_toys/'.$toysModel->toy_image) ?>" alt="Avatar" title="Sesuaikan Foto Mainan" style="width:200px;height:200px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <?php echo form_open_multipart(base_url($base_url), array('id' => 'form_toys')) ?>
                            <form class="" id="form_toys" name="form_toys" enctype="multipart/form-data" method="post" novalidate>
                                <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                                </p>
                                <span class="section">Personal Info</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Mainan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="toy_name" id="toy_name" required="required" value="<?php echo $toysModel->toy_name ?>"/>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="control-label col-md-3 col-sm-3 label-align">Kategori Mainan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" class='id_cat' name="id_cat"  id="id_cat" required>
                                            <?php 
                                                $oldToysCategory;
                                                $category = $toysModel->id_cat;
                                                if($toysCategoryModel){
                                                foreach($toysCategoryModel as $toysCategory) { 
                                                    if(!empty($category) && $toysCategory->id == $category)
                                                        $oldToysCategory = $toysCategory->cat_name; ?>
                                                <option value="<?php echo $toysCategory->id; ?>" <?php if(!empty($category) && $toysCategory->id == $category) echo 'selected="selected"'; ?>><?php echo $toysCategory->cat_name; ?></option>    
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Stok Mainan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="toy_quantity" id="toy_quantity" required="required" value="<?php echo $toysModel->toy_quantity ?>"/>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Harga Satuan IDR<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="toy_price" id="toy_price" required="required" value="<?php echo $toysModel->toy_price ?>"/>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Deskripsi Mainan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea id="toy_desc" required="required" class="form-control" name="toy_desc" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="500" data-parsley-minlength-message="Masukkan minimum 10 karater, untuk Deskripsi Kategori Mainan..." data-parsley-validation-threshold="10"><?php echo $toysModel->toy_desc ?></textarea>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="control-label col-md-3 col-sm-3 label-align">Foto Mainan<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                    <input type="file" class="form-control-file" id="toy_image" name="toy_image" onchange="previewImg()" <?php if(empty($toysModel->id)) echo 'required'; ?>/>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='id' name="id" value="<?php echo $toysModel->id ?>" hidden/></div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='reset' class="btn btn-success">Reset</button>
                                            <button type="submit" class="btn btn-primary" <?php if(!empty($toysModel->id)) echo 'hidden'; ?>>Submit</button>
                                            <button type='button' class="btn btn-primary" onclick="setNewParamForUpdate()" <?php if(empty($toysModel->id)) echo 'hidden'; ?>>Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade bs-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Ubah Mainan</h4>
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Mohon cek kembali sebelum Anda melakukan perubahan Data.</strong> Apakah Anda yakin ingin melakukan perubahan Data Mainan ini ?</p>
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
                                                            <label for="old_toy_name">Nama Mainan</label>
                                                            <input type="text" id="old_toy_name" class="form-control" name="old_toy_name" value="<?php echo $toysModel->toy_name ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="old_toy_cat">Kategori Mainan</label>
                                                            <input type="text" id="old_toy_cat" class="form-control" name="old_toy_cat" value="<?php echo $oldToysCategory ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="old_toy_quantity">Stok Mainan</label>
                                                            <input type="text" id="old_toy_quantity" class="form-control" name="old_toy_quantity" value="<?php echo $toysModel->toy_quantity ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="old_toy_price">Harga Satuan IDR</label>
                                                            <input type="text" id="old_toy_price" class="form-control" name="old_toy_price" value="<?php echo $toysModel->toy_price ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="old_toy_desc">Deskripsi Mainan</label>
                                                            <textarea id="old_toy_desc" class="form-control" name="old_toy_desc" readonly><?php echo $toysModel->toy_desc ?></textarea>
                                                            <br>
                                                            <img class="img-circle profile_img old-avatar" src="<?php echo base_url('assets/images/images_toys/'.$toysModel->toy_image) ?>" alt="Avatar" title="Foto Mainan Lama" style="width:200px;height:200px;">
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
                                                        <label for="new_toy_name">Nama Mainan</label>
                                                            <input type="text" id="new_toy_name" class="form-control" name="new_toy_name" value="<?php echo $toysModel->toy_name ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="new_toy_cat">Kategori Mainan</label>
                                                            <input type="text" id="new_toy_cat" class="form-control" name="new_toy_cat" value="<?php echo $oldToysCategory ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="new_toy_quantity">Stok Mainan</label>
                                                            <input type="text" id="new_toy_quantity" class="form-control" name="new_toy_quantity" value="<?php echo $toysModel->toy_quantity ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="new_toy_price">Harga Satuan IDR</label>
                                                            <input type="text" id="new_toy_price" class="form-control" name="new_toy_price" value="<?php echo $toysModel->toy_price ?>" readonly="readonly"/>
                                                            <br>
                                                            <label for="new_toy_desc">Deskripsi Mainan</label>
                                                            <textarea id="new_toy_desc" class="form-control" name="new_toy_desc" readonly><?php echo $toysModel->toy_desc ?></textarea>
                                                            <br>
                                                            <img class="img-circle profile_img new-avatar" src="<?php echo base_url('assets/images/images_toys/'.$toysModel->toy_image) ?>" alt="Avatar" title="Foto Mainan Baru" style="width:200px;height:200px;">
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
                            <?php echo form_close() ?>
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
    $(function() {
        $("#form_toys").on('submit', function(e) {
            var toyQuantity = document.getElementById("toy_quantity").value;
            var toyPrice    = document.getElementById("toy_price").value;

            if(isNaN(toyQuantity))
            {
                errorNotification("Stok", "Stok Tidak Valid !");
                return false;
            }

            if(isNaN(toyPrice))
            {
                errorNotification("Harga Satuan", "Harga Satuan Tidak Valid !");
                return false;
            }

        });
    });
</script>

<script>
    function previewImg()
    {
        const foto = document.querySelector('#toy_image');
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
        var toyName     = document.getElementById("toy_name").value;
        var toyQuantity = document.getElementById("toy_quantity").value;
        var toyPrice    = document.getElementById("toy_price").value;
        var toyDesc     = document.getElementById("toy_desc").value;

        if(toyName.length == 0 || toyName == "")
        {
            errorNotification("Nama Mainan", "Nama Mainan Tidak Valid !");
            return false
        }else{
            if(toyQuantity.length == 0 || toyQuantity == "" || isNaN(toyQuantity))
            {
                errorNotification("Stok", "Stok Tidak Valid !");
                return false
            }else{
                if(toyPrice.length == 0 || toyPrice == "" || isNaN(toyPrice))
                {
                    errorNotification("Harga Satuan", "Harga Satuan Tidak Valid !");
                    return false
                }else{
                    if(toyDesc.length == 0 || toyDesc == "")
                    {
                        errorNotification("Deskripsi", "Deskripsi Tidak Valid !");
                        return false
                    }else{
                        idCat = document.getElementById("id_cat");
                        
                        document.getElementById("new_toy_name").value = document.getElementById("toy_name").value;
                        document.getElementById("new_toy_cat").value = idCat.options[idCat.selectedIndex].text;
                        document.getElementById("new_toy_quantity").value = document.getElementById("toy_quantity").value;
                        document.getElementById("new_toy_price").value = document.getElementById("toy_price").value;
                        document.getElementById("new_toy_desc").value = document.getElementById("toy_desc").value;

                        $('#updateModal').modal('show'); 
                    }
                }
            }
        }
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