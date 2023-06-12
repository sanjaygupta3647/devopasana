 <!-- Page header -->
 <div class="page-header page-header-default">
 	<div class="page-header-content">
 		<div class="page-title">
 			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Ticket</span> - List</h4>
 		</div>
		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="<?php echo base_url('user/tickets'); ?>" class="btn btn-link btn-float has-text"><i class="icon-list-ordered text-primary"></i> <span>All Tickets</span></a>
			</div>
		</div>
 	</div>

 	<div class="breadcrumb-line">
 		<ul class="breadcrumb">
 			<li><a href="<?php echo base_url('user/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
 			<li><a href="<?php echo base_url('user/tickets'); ?>">Ticket</a></li>
 			<li class="active">List</li>
 		</ul>
 	</div>
 </div>
 <!-- /page header -->
 
 <!-- Content area -->
<div class="content">
	<!-- Wizard with validation -->
	<div class="panel panel-white">
		<div class="panel-heading">
			<h6 class="panel-title"><?php echo (!$id) ? 'Add' : 'Edit'; ?> Faq</h6>
		</div>

		<form class="form-validation" id="add-ticket" autocomplete="off" enctype="multipart/form-data">
			<fieldset class="step" id="add-edit-faqs">
			 
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Department: <span class="text-danger">*</span></label>
							<select name="department_id" class="select">
								<option></option>
								<?php foreach ($departments as $val) : ?>
									<option value="<?php echo $val->id; ?>"><?php echo $val->title; ?></option>
								<?php endforeach; ?>

							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Subject: <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="subject" value="">
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Provide a detailed description: <span class="text-danger">*</span></label>
							<textarea class="summernote" name="message"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="priority">Set Priority </label>
								<select name="priority" class="select">
									<option value="Low">Low</option>
									<option value="Medium">Medium</option>
									<option value="High">High</option>
								</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Attachment:</label>
							<input name="attachments[]" multiple class="form-control" type="file">
						</div>
					</div>
				</div>

			</fieldset>

			<div class="form-wizard-actions">
				<button class="btn btn-info" type="submit"><?php echo (!$id) ? 'Submit' : 'Update'; ?></button>
			</div>
		</form>
	</div>
	<?php $this->load->view('includes/admin/tagline'); ?>
</div>
<!-- /content area -->