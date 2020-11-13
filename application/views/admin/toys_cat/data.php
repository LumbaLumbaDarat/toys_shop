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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                    The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                    </p>
                                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
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
                                                        <div class="col-xs-2 ">
                                                        <form role="form" action="<?php echo base_url('dashboard/toyscategory/detail')?>" method="post">
                                                            <input type="hidden" name="id_detail" value="<?php echo $categoryModel->id; ?>">
                                                            <button type="submit" class="btn btn-social-icon btn-info">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </form>
                                                        </div>
                                                        <div class="col-xs-2 ">
                                                        <form role="form" action="<?php echo base_url('admin/toyscategory/form')?>" method="post">
                                                            <input type="hidden" name="id_update" value="<?php echo $categoryModel->id; ?>">
                                                            <button type="submit" class="btn btn-social-icon btn-warning">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>
                                                        </div>
                                                        <div class="col-xs-2 ">
                                                        <form role="form" action="<?php echo base_url('admin/toyscategory/delete')?>" method="post">
                                                            <input type="hidden" name="id_delete" value="<?php echo $categoryModel->id; ?>">
                                                            <button type="submit" class="btn btn-social-icon btn-danger" onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini ?')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->