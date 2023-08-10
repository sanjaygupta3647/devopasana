<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Divines</span> - <?php echo (!$id) ? 'Add' : 'Edit'; ?></h4>
		</div>

		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="<?php echo base_url('admin/divine/all'); ?>" class="btn btn-link btn-float has-text"><i class="icon-list-ordered text-primary"></i> <span>All divine</span></a>
			</div>
		</div>
	</div>

	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
			<li><a href="<?php echo base_url('admin/divine/all'); ?>">divines</a></li>
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
			<h6 class="panel-title"><?php echo (!$id) ? 'Add' : 'Edit'; ?> divine</h6>
		</div>

		<form class="form-validation" id="add-divine" action="" method="post"  enctype="multipart/form-data">
			<fieldset class="step" id="add-edit-divine">
				<input type="hidden" name="path_to_upload" value="divine/">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Divine name: <span class="text-danger">*</span></label>
							<input type="text" name="title" class="form-control" value="<?php echo ($divine->title) ? $divine->title : ''; ?>" placeholder="divine name">
						</div>
					</div>
					
					 
					<div class="col-md-6">
						<div class="form-group">
							<label>Image:<span class="text-danger">*</span> </label>
							<input type="file" name="img" data-image-name="<?php echo $divine->img; ?>" class="form-control">
							<?php if (!empty($divine->img)) : ?>
								<a target="_blank" href="<?php echo base_url('uploads/divine/' . $divine->img) ?>"> View Image </a>
							<?php endif; ?>
						</div>
					</div>

					

			 



					<?php if (!empty($id)) : ?>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						
					<?php endif; ?>

					<div class="col-md-6">
						<div class="form-group">
							<label>Status: <span class="text-danger">*</span></label>
							<select name="status" class="select">
								<option value="Active" <?php echo (!empty($divine->status) && $divine->status == 'Active') ? 'selected' : ''; ?>>Active</option>
								<option value="Inactive" <?php echo (!empty($divine->status) && $divine->status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>

							</select>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Order: <span class="text-danger">*</span></label>
							<input type="text" name="porder" class="form-control" value="<?php echo ($divine->porder) ? $divine->porder : ''; ?>" placeholder="divine order">
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group">
							<label>Short description:</label>
							<textarea name="short_description" rows="5" class="form-control" placeholder="Short description"> <?php echo ($divine->short_description) ? $divine->short_description : ''; ?></textarea>
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