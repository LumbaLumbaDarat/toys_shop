<!-- page content -->
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
                                                        <th>Email</th>
                                                        <th>Nama</th>
                                                        <th>No. Telepon</th>
                                                        <th>Alamat</th>
                                                        <th>Tanggal dibuat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    if($usersClientModel){
                                                        $id = 1;
                                                    foreach($usersClientModel as $users) { ?>
                                                        <tr>
                                                            <td><?php echo $id++ ?></td>
                                                            <td><?php echo $users->email; ?></td>
                                                            <td><?php echo $users->name; ?></td>
                                                            <td><?php echo $users->phone; ?></td>
                                                            <td><?php echo $users->address.' Kel.'.$users->sub_district.' Kec.'.$users->district.' '.$users->city.' Kode Pos '.$users->postal; ?></td>
                                                            <td><?php echo $users->created_date; ?></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    Aksi
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <form role="form" action="<?php echo base_url('admin/usersadmin/detail')?>" method="post">
                                                                            <input type="hidden" name="id_detail" value="<?php echo $users->id; ?>">
                                                                            <button type="submit" class="dropdown-item btn-primary">
                                                                                <i class="fa fa-search"></i> Lihat Detail
                                                                            </button>
                                                                        </form>
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
                                                        <th>Email</th>
                                                        <th>Nama</th>
                                                        <th>No. Telepon</th>
                                                        <th>Alamat</th>
                                                        <th>Tanggal dibuat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    if($usersClientModel){
                                                        $id = 1;
                                                    foreach($usersClientModel as $users) { ?>
                                                        <tr>
                                                            <td><?php echo $id++ ?></td>
                                                            <td><?php echo $users->email; ?></td>
                                                            <td><?php echo $users->name; ?></td>
                                                            <td><?php echo $users->phone; ?></td>
                                                            <td><?php echo $users->address.' Kel.'.$users->sub_district.' Kec.'.$users->district.' '.$users->city.' Kode Pos '.$users->postal; ?></td>
                                                            <td><?php echo $users->created_date; ?></td>
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
    </div>
</div>
<!-- /page content -->



