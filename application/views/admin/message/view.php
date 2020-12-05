<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                
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
                                    <img src="<?php echo base_url('assets/images/images_message/'.$messageModel->attachment)?>" alt="Avatar" title="Attachment Pesan" style="width:350px;height:500px;" <?php if(empty($messageModel->attachment)) echo 'hidden'; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="profile_title">
                                <div class="col-md-6">
                                    <h2><?php echo $messageTitle ?></h2>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="message_wrapper">
                                    <br />
                                    <h4 class="heading"><i class="fa fa-bookmark"></i> Subjek Pesan</h4>
                                    <h4><blockquote class="message"><?php echo $messageModel->subject ?></blockquote></h4>
                                    <br />
                                    <h4 class="heading"><i class="fa fa-envelope"></i> Isi Pesan</h4>
                                    <h4><blockquote class="message">
                                            <?php echo $messageModel->body ?>
                                        </blockquote>
                                    </h4>
                                    <br />
                                    <form role="form" action="<?php echo base_url('admin/message/form')?>" method="post" <?php if($messageModel->message_to != 'ADO') echo 'hidden'; ?>>
                                        <input type="hidden" name="id_detail" value="<?php echo $messageModel->id; ?>">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-share"></i> Balas
                                        </button>
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