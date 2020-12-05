
	<!-- PNotify -->
	<link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.buttons.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.nonblock.css') ?>" rel="stylesheet">

	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h4><?php echo $subTitle; ?></h4>
									<h3><?php echo $title; ?></h3>
								</div>
								<form class="form" method="post" action="<?php echo base_url($base_url) ?>" enctype="multipart/form-data">
									<div class="row">
										<div class="col-12">
											<div class="form-group message" hidden>
												<input name="refNo" id="refNo" type="text" placeholder="" <?php if(!empty($messageModel->subject)) echo 'readonly'; ?> value="<?php echo $refNo ?>">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>Subjek Pesan<span <?php if(!empty($messageModel->id)) echo 'hidden'; ?>>*</span></label>
												<input name="subject" id="subject" type="text" placeholder="" <?php if(!empty($messageModel->subject)) echo 'readonly'; ?> value="<?php echo $messageModel->subject ?>">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>Pesan Anda<span <?php if(!empty($messageModel->id)) echo 'hidden'; ?>>*</span></label>
												<textarea name="body" id="body" placeholder="" <?php if(!empty($messageModel->id)) echo 'readonly'; ?>><?php echo $messageModel->body ?></textarea>
											</div>
										</div>
										<div class="col-12" <?php if(!empty($messageModel->id)) echo 'hidden'; ?>>
											<div>
												<label><?php echo $messageModel->label_attachment; ?> <span style="color:red" <?php if(empty($messageModel->state)) echo 'hidden'; ?>>*</span ></label>
												<input type="file" class="form-control-file" name="attachment" id="attachment" onchange="previewAttachment()"/>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group message">
												
											</div>
										</div>
										<div class="col-12" <?php if(empty($messageModel->attachment)) echo 'hidden'; ?>>
											<div class="form-group message">
												<img class="attachment_preview" name="attachment_preview" id="attachment_preview" src="<?php echo base_url($messageModel->attachment) ?>" alt="#" style="height:510px;">
											</div>
										</div>
										<div class="col-12" <?php if(!empty($messageModel->id)) echo 'hidden'; ?>>
											<div class="form-group message">
												<label class="text-danger">Wajib diisi untuk setiap Form bertanda *</label>
											</div>
										</div>
										<div class="col-12" <?php if(!empty($messageModel->id)) echo 'hidden'; ?>>
											<div class="form-group button">
												<button type="submit" class="btn" onclick="return validateSendMessage('<?php echo $messageModel->state; ?>')">Kirim Pesan</button>
											</div>
										</div>
										<input name="id_delete" id="id_delete" type="text" placeholder="" value="<?php echo $messageModel->id ?>" hidden>
										<div class="col-12" <?php if(empty($messageModel->id)) echo 'hidden'; ?>>
											<div class="form-group button">
												<button type="submit" class="btn">Hapus Pesan</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>

						<script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.js') ?>"></script>
						<script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.buttons.js') ?>"></script>
						<script src="<?php echo base_url('assets/admin_template/vendors/pnotify/dist/pnotify.nonblock.js') ?>"></script>

						<script>
							function previewAttachment()
							{
								const attachment = document.querySelector('#attachment');
								const attachmentPreview = document.querySelector('.attachment_preview');

								const attachmentPhoto = new FileReader();
								attachmentPhoto.readAsDataURL(attachment.files[0]);

								attachmentPhoto.onload = function(e)
								{
									attachmentPreview.src = e.target.result;
								}
							}
						</script>

						<script>
							function validateSendMessage(state)
							{
								var subject = document.querySelector('#subject').value;
								var body = document.querySelector('#body').value;
								var attachment = document.querySelector('#attachment').value;

								if(subject == '')
								{
									errorNotification("Subjek", "Subjek Pesan Tidak Valid !");
									return false;
								}else{
									if(body == '')
									{
										errorNotification("Pesan", "Pesan Tidak Valid !");
										return false;
									}else{
										if(state == '')
											return true;
										else{
											if(attachment == '')
											{
												errorNotification("Attachment", "Attachment Tidak Valid !");
												return false;
											}else return true;
										}
									}
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