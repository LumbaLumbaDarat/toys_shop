<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                    <!-- <div class="alert alert-success alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Penambahan Data User Admin berhasil dilakukan !</strong> 
                        <br>
                        Data User Admin baru, <strong>Data Berhasil ditambahkan !</strong> berhasil ditambahkan !
                    </div> -->
                <?php if($this->session->flashdata('message')) : ?>
                    <div class="alert alert-success alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <?php echo $this->session->flashdata('message');?>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Button Example <small>Users</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="admin-modified-tab" data-toggle="tab" href="#admin-modified" role="tab" aria-controls="admin-modified" aria-selected="true">Modified Access</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="admin-report-tab" data-toggle="tab" href="#admin-report" role="tab" aria-controls="admin-report" aria-selected="false">Data Report</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="admin-modified" role="tabpanel" aria-labelledby="admin-modified-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <p class="text-muted font-13 m-b-30">
                                            The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                            </p>
                                            <table id="datatable-admin-modified" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kategori</th>
                                                        <th>Tanggal dibuat</th>
                                                        <th>Dibuat oleh</th>
                                                        <th>Tanggal diubah</th>
                                                        <th>Diubah oleh</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    if($toysCategoryModel){
                                                        $id = 1;
                                                    foreach($toysCategoryModel as $categoryModel) { ?>
                                                        <tr>
                                                            <td><?php echo $id++ ?></td>
                                                            <td><?php echo $categoryModel->cat_name; ?></td>
                                                            <td><?php echo $categoryModel->created_date; ?></td>
                                                            <td><?php echo $categoryModel->created_by; ?></td>
                                                            <td><?php echo $categoryModel->updated_date; ?></td>
                                                            <td><?php echo $categoryModel->updated_by; ?></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    Aksi
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <form role="form" action="<?php echo base_url('admin/toyscategory/form')?>" method="post">
                                                                            <input type="hidden" name="id_update" value="<?php echo $categoryModel->id; ?>">
                                                                            <button type="submit" class="dropdown-item btn-primary">
                                                                                <i class="fa fa-edit"></i> Ubah
                                                                            </button>
                                                                        </form>
                                                                        <div class="dropdown-divider"></div>
                                                                        <button type="button" class="dropdown-item btn-primary" onclick="deleteAlert('<?php echo $categoryModel->id; ?>', '<?php echo $categoryModel->cat_name; ?>')">
                                                                            <i class="fa fa-trash"></i> Hapus
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php }} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="admin-report" role="tabpanel" aria-labelledby="admin-report-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <p class="text-muted font-13 m-b-30">
                                            The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                            </p>
                                            <table id="datatable-admin-report" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kategori</th>
                                                        <th>Tanggal dibuat</th>
                                                        <th>Dibuat oleh</th>
                                                        <th>Tanggal diubah</th>
                                                        <th>Diubah oleh</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    if($toysCategoryModel){
                                                        $id = 1;
                                                    foreach($toysCategoryModel as $categoryModel) { ?>
                                                        <tr>
                                                            <td><?php echo $id++ ?></td>
                                                            <td><?php echo $categoryModel->cat_name; ?></td>
                                                            <td><?php echo $categoryModel->created_date; ?></td>
                                                            <td><?php echo $categoryModel->created_by; ?></td>
                                                            <td><?php echo $categoryModel->updated_date; ?></td>
                                                            <td><?php echo $categoryModel->updated_by; ?></td>
                                                        </tr>
                                                    <?php }} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="modal fade bs-example-modal-lg" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Hapus Kategori Mainan</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form role="form" action="<?php echo base_url('admin/toyscategory/delete')?>" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_delete" id="id_delete" value="">
                                            <p id="first_paragraph"></p>
                                            <p><h4>Anda tidak bisa mengembalikan Data Kategori Mainan ini setelah Anda menghapusnya. Apakah Anda yakin ingin menghapus Kategori Mainan ini ?</h4></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
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

<script>
    function deleteAlert(idCat, catName)
    {
        document.getElementById("id_delete").value = idCat;

        var firstParagraph = document.getElementById("first_paragraph");
        firstParagraph.innerHTML = "Kategori Mainan <h4><strong>" + catName + "</strong></h4>";

        $('#deleteModal').modal('show'); 
    }
</script>