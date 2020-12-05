<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
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
                                <a class="nav-link active" id="admin-modified-tab" data-toggle="tab" href="#admin-modified" role="tab" aria-controls="admin-modified" aria-selected="true">Pesan Masuk belum dibaca</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="admin-modified-read-tab" data-toggle="tab" href="#admin-modified-read" role="tab" aria-controls="admin-modified-read" aria-selected="false">Pesan Masuk sudah dibaca</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="admin-report-tab" data-toggle="tab" href="#admin-report" role="tab" aria-controls="admin-report" aria-selected="false">Data Report Pesan Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="admin-modified-send-tab" data-toggle="tab" href="#admin-modified-send" role="tab" aria-controls="admin-modified-send" aria-selected="false">Pesan Keluar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="admin-report-send-tab" data-toggle="tab" href="#admin-report-send" role="tab" aria-controls="admin-report-send" aria-selected="false">Data Report Pesan Keluar</a>
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
                                                        <th>Pesan Dari</th>
                                                        <th>Subjek</th>
                                                        <th>Tanggal dibuat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    if($messageModelNonRead){
                                                        $id = 1;
                                                    foreach($messageModelNonRead as $messageNonRead) { ?>
                                                        <tr>
                                                            <td><?php echo $id++ ?></td>
                                                            <td><?php echo $messageNonRead->message_from; ?></td>
                                                            <td><?php echo $messageNonRead->subject; ?></td>
                                                            <td><?php echo $messageNonRead->created_date; ?></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    Aksi
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <form role="form" action="<?php echo base_url('admin/message/read')?>" method="post">
                                                                            <input type="hidden" name="id_detail" value="<?php echo $messageNonRead->id; ?>">
                                                                            <button type="submit" class="dropdown-item btn-primary">
                                                                                <i class="fa fa-search"></i> Baca
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
                            <div class="tab-pane fade" id="admin-modified-read" role="tabpanel" aria-labelledby="admin-modified-read-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <p class="text-muted font-13 m-b-30">
                                            The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                            </p>
                                            <table id="datatable-admin-modified-2" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Pesan Dari</th>
                                                        <th>Subjek</th>
                                                        <th>Tanggal dibuat</th>
                                                        <th>Dibaca Oleh</th>
                                                        <th>Tanggal dibaca</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    if($messageModelRead){
                                                        $id = 1;
                                                    foreach($messageModelRead as $messageRead) { ?>
                                                        <tr>
                                                            <td><?php echo $id++ ?></td>
                                                            <td><?php echo $messageRead->message_from; ?></td>
                                                            <td><?php echo $messageRead->subject; ?></td>
                                                            <td><?php echo $messageRead->created_date; ?></td>
                                                            <td><?php echo $messageRead->read_by; ?></td>
                                                            <td><?php echo $messageRead->read_date; ?></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    Aksi
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <form role="form" action="<?php echo base_url('admin/message/read')?>" method="post">
                                                                            <input type="hidden" name="id_detail" value="<?php echo $messageRead->id; ?>">
                                                                            <button type="submit" class="dropdown-item btn-primary">
                                                                                <i class="fa fa-search"></i> Baca
                                                                            </button>
                                                                        </form>
                                                                        <div class="dropdown-divider"></div>
                                                                        <textarea name="id_delete_read<?php echo $messageRead->id; ?>" id="id_delete_read<?php echo $messageRead->id; ?>" hidden><?php echo json_encode($messageRead) ?></textarea>
                                                                        <button type="button" class="dropdown-item btn-primary" onclick="deleteAlert('id_delete_read<?php echo $messageRead->id; ?>')">
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
                                                        <th>Pesan Dari</th>
                                                        <th>Subjek</th>
                                                        <th>Isi</th>
                                                        <th>Tanggal dibuat</th>
                                                        <th>Dibaca Oleh</th>
                                                        <th>Tanggal dibaca</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    if($messageModelRead){
                                                        $id = 1;
                                                    foreach($messageModelRead as $messageRead) { ?>
                                                        <tr>
                                                            <td><?php echo $id++ ?></td>
                                                            <td><?php echo $messageRead->message_from; ?></td>
                                                            <td><?php echo $messageRead->subject; ?></td>
                                                            <td><?php echo $messageRead->body; ?></td>
                                                            <td><?php echo $messageRead->created_date; ?></td>
                                                            <td><?php echo $messageRead->read_by; ?></td>
                                                            <td><?php echo $messageRead->read_date; ?></td>
                                                        </tr>
                                                    <?php }} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="admin-modified-send" role="tabpanel" aria-labelledby="admin-modified-send-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <p class="text-muted font-13 m-b-30">
                                            The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                            </p>
                                            <table id="datatable-admin-modified-3" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Pesan kepada</th>
                                                        <th>Subjek</th>
                                                        <th>Tanggal dibuat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    if($messageModelSend){
                                                        $id = 1;
                                                    foreach($messageModelSend as $messageSend) { ?>
                                                        <tr>
                                                            <td><?php echo $id++ ?></td>
                                                            <td><?php echo $messageSend->message_to; ?></td>
                                                            <td><?php echo $messageSend->subject; ?></td>
                                                            <td><?php echo $messageSend->created_date; ?></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    Aksi
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <form role="form" action="<?php echo base_url('admin/message/read')?>" method="post">
                                                                            <input type="hidden" name="id_detail" value="<?php echo $messageSend->id; ?>">
                                                                            <button type="submit" class="dropdown-item btn-primary">
                                                                                <i class="fa fa-search"></i> Baca
                                                                            </button>
                                                                        </form>
                                                                        <div class="dropdown-divider"></div>
                                                                        <textarea name="id_delete_send<?php echo $messageSend->id; ?>" id="id_delete_send<?php echo $messageSend->id; ?>" hidden><?php echo json_encode($messageSend) ?></textarea>
                                                                        <button type="button" class="dropdown-item btn-primary" onclick="deleteAlert('id_delete_send<?php echo $messageSend->id; ?>')">
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
                            <div class="tab-pane fade" id="admin-report-send" role="tabpanel" aria-labelledby="admin-report-send-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <p class="text-muted font-13 m-b-30">
                                            The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                            </p>
                                            <table id="datatable-admin-report-2" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Pesan kepada</th>
                                                        <th>Subjek</th>
                                                        <th>Isi</th>
                                                        <th>Tanggal dibuat</th>
                                                        <th>Dibaca oleh</th>
                                                        <th>Tanggal dibaca</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    if($messageModelSend){
                                                        $id = 1;
                                                    foreach($messageModelSend as $messageSend) { ?>
                                                        <tr>
                                                            <td><?php echo $id++ ?></td>
                                                            <td><?php echo $messageSend->message_to; ?></td>
                                                            <td><?php echo $messageSend->subject; ?></td>
                                                            <td><?php echo $messageSend->body; ?></td>
                                                            <td><?php echo $messageSend->created_date; ?></td>
                                                            <td><?php echo $messageSend->read_by; ?></td>
                                                            <td><?php echo $messageSend->read_date; ?></td>
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
                                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Hapus Pesan</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form role="form" action="<?php echo base_url('admin/message/delete')?>" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_delete" id="id_delete" value="">
                                            <p id="first_paragraph"></p>
                                            <p id="second_paragraph"></p>
                                            <p id="third_paragraph"></p>
                                            <p><h4>Anda tidak bisa mengembalikan Data Pesan ini setelah Anda menghapusnya. Apakah Anda yakin ingin menghapus Pesan ini ?</h4></p>
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
    function deleteAlert(idElement)
    {
        var JSONObject = document.getElementById(idElement).value;
        var objectModel = JSON.parse(JSONObject);

        document.getElementById("id_delete").value = objectModel.id;

        var firstParagraph = document.getElementById("first_paragraph");
        if(idElement.includes("read"))
            firstParagraph.innerHTML = "Pesan dari <h4><strong>" + objectModel.message_from + "</strong></h4>";
        else firstParagraph.innerHTML = "Pesan untuk <h4><strong>" + objectModel.message_to + "</strong></h4>";

        var secondParagraph = document.getElementById("second_paragraph");
        secondParagraph.innerHTML = "Subjek Pesan <h4><strong>" + objectModel.subject + "</strong></h4>";

        var thirdParagraph = document.getElementById("third_paragraph");
        thirdParagraph.innerHTML = "Isi Pesan <h4><strong>" + objectModel.body + "</strong></h4>";

        $('#deleteModal').modal('show'); 
    }
</script>