<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<?php
			$class = "info";
			if ($data->priority == 'Medium') {
				$class = "warning";
			} else if ($data->priority == 'High') {
				$class = "danger";
			}
			?>
			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a><span class="badge badge-primary"><?php echo $data->title; ?></span> - <?php echo $data->subject; ?></h4>
		</div>

		<div class="heading-elements pt-10">
			<div class="heading-btn-group">
				<?php 
				if($data->status == 'Open' || $data->status == 'Progress'){
					$status = "Closed";
					$classhere = "danger";
					$text = "Close";
				}else{
					$status = "Open";
					$classhere = "success";
					$text = "Open";
				}
				?>
				<a class="change_status" data-status="<?php echo $status ?>" data-id="<?php echo $data->id ?>" data-closed_by="<?php echo current_user(); ?>" data-close_time="<?php echo db_date_time(); ?>" href="javascript:void(0)">
					<span class="badge badge-<?php echo $classhere; ?>"><?php echo $text; ?> this ticket?</span>

				</a>

			</div>
		</div>
	</div>

	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
			<li><a href="<?php echo base_url('admin/ticket/all'); ?>">Tickets</a></li>
			<li class=""><span class="badge badge-<?php echo $class; ?>"><?php echo $data->priority; ?> priority</span></li>
		</ul> 
	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
	<!-- Wizard with validation -->
	<div class="panel panel-white ui-formwizard">
		<div class="panel-heading">
			<?php echo profilepic($data->profile_pic) ?>
			<b><?php echo $data->fname ?> <?php echo $data->lname ?></b>
			On <?php echo userDateFormat($data->create_time) ?>(<b>Ticket ID: <?php echo TICKET . $data->id; ?></b>) 
		</div>
		<fieldset class="step">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<?php echo ($data->message) ? $data->message : ''; ?>
					</div>
					<?php
					if (!empty(($data->attachments))) {
						$attachments  = json_decode($data->attachments);
						if (count($attachments)) {
					?>
							<div class="form-group">
								<hr />
								<b>Attachments: </b>
								<?php
								foreach ($attachments as $val) {
									$filepath = "uploads/" . $data->sub_folder . $val;
								?>
									<a target="_blank" href="<?php echo base_url($filepath) ?>"><i class="icon-file-empty"></i></a>
								<?php
								}
								?></div><?php
									}
								}
										?>
				</div>

			</div>
		</fieldset>
	</div>

	<?php if (!empty($reply)) : ?>
		<?php foreach ($reply as $val) : ?>
			<div class="panel panel-white ui-formwizard">
				<div class="panel-heading">
					<?php echo profilepic($val->profile_pic) ?>
					<b><?php echo $val->fname ?> <?php echo $val->lname ?></b>
					On <?php echo userDateFormat($val->create_time) ?> 
				</div>
				<fieldset class="step">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<?php echo ($val->message) ? $val->message : ''; ?>
							</div>
							<?php if (!empty($val->private_comment)) : ?>
								<div class="form-group">
									<b>Note: </b><?php echo $val->private_comment; ?>
								</div>
							<?php endif; ?>


							<?php
							if (!empty(($val->files))) {
								$files  = json_decode($val->files);
								if (count($files)) {
							?>
									<div class="form-group">
										<hr />
										<b>Attachments: </b>
										<?php
										foreach ($files as $val) {
											$filepath = "uploads/" . $data->sub_folder . $val;
										?>
											<a target="_blank" href="<?php echo base_url($filepath) ?>"><i class="icon-file-empty"></i></a>
										<?php
										}
										?></div><?php
											}
										}
												?>
						</div>

					</div>
				</fieldset>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
	<?php if ($data->status == 'Open') : ?>
		<div class="panel panel-white">
			<div class="panel-heading">
				<h6 class="panel-title">Post a reply!</h6>
			</div>

			<form class="form-validation" id="postreply" enctype="multipart/form-data" action="" method="post">
				<fieldset class="step" id="add-edit-pages">

					<input type="hidden" name="department_id" value="<?php echo $data->department_id; ?>">
					<input type="hidden" name="subject" value="<?php echo $data->subject; ?>">
					<input type="hidden" name="priority" value="<?php echo $data->priority; ?>">


					<input type="hidden" name="ticket_id" value="<?php echo $id; ?>">
					<input type="hidden" name="user_id" value="<?php echo current_user(); ?>">
					<input type="hidden" name="path_to_upload" value="<?php echo $data->sub_folder; ?>">


					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Your Message: <span class="text-danger">*</span></label>
								<textarea required class="summernote" name="message"></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Attachments:</label>
								<input type="file" name="files[]" multiple class="form-control">
							</div>
						</div>
					</div>


				</fieldset>

				<div class="form-wizard-actions">
					<button class="btn btn-info" type="submit">Reply</button>
				</div>
			</form>
		</div>
	<?php endif; ?>
	<?php $this->load->view('includes/admin/tagline'); ?>
</div>
<!-- /content area -->