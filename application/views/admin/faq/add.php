<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Faq</span> - <?php echo (!$id) ? 'Add' : 'Edit'; ?></h4>
		</div>

		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="<?php echo base_url('admin/faq/all'); ?>" class="btn btn-link btn-float has-text"><i class="icon-list-ordered text-primary"></i> <span>All Faq</span></a>
			</div>
		</div>
	</div>

	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
			<li><a href="<?php echo base_url('admin/faq/all'); ?>">Faq</a></li>
			<li class="active"><?php echo (!$id) ? 'Add' : 'Edit'; ?></li>
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

		<form class="form-validation" id="add-edit-faq" action="" method="post">
			<fieldset class="step" id="add-edit-faqs">
				<?php if (!empty($id)) : ?>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
				<?php endif; ?>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Campaign:</label>
							<select name="campaign_id" class="select" >
								<option value="0">Select</option>
								<?php foreach ($campaigns as $val) : ?>
									<option value="<?php echo $val->id; ?>" <?php echo (!empty($faq->campaign_id) && $val->id == $faq->campaign_id) ? 'selected' : ''; ?>><?php echo $val->title; ?></option>
								<?php endforeach; ?>

							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Status: <span class="text-danger">*</span></label>
							<select name="status" class="select" required>
								<option value="Active" <?php echo (!empty($faq->status) && $faq->status == 'Active') ? 'selected' : ''; ?>>Active</option>
								<option value="Inactive" <?php echo (!empty($faq->status) && $faq->status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>

							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Order: <span class="text-danger">*</span></label>
							<input type="text" name="porder" class="form-control" value="<?php echo ($faq->porder) ? $faq->porder : ''; ?>" placeholder="Order">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Subject: <span class="text-danger">*</span></label>
							<input type="text" required name="subject" class="form-control" value="<?php echo ($faq->subject) ? $faq->subject : ''; ?>" placeholder="Subject title">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Description: <span class="text-danger">*</span></label>
							<textarea required class="summernote" name="body"><?php echo (!empty($faq->body)) ? $faq->body : ""; ?></textarea>
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