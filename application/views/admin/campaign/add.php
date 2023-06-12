<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Campaign</span> - <?php echo (!$id) ? 'Add' : 'Edit'; ?></h4>
		</div>

		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="<?php echo base_url('admin/campaign/all'); ?>" class="btn btn-link btn-float has-text"><i class="icon-list-ordered text-primary"></i> <span>All campaign</span></a>
			</div>
		</div>
	</div>

	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
			<li><a href="<?php echo base_url('admin/campaign/all'); ?>">Campaign</a></li>
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
			<h6 class="panel-title"><?php echo (!$id) ? 'Add' : 'Edit'; ?> campaign</h6>
		</div>

		<form class="form-validation" id="add-campaign" action="" method="post">
			<fieldset class="step" id="add-edit-campaign">

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Campaign title: <span class="text-danger">*</span></label>
							<input type="text" name="title" class="form-control" value="<?php echo ($campaign->title) ? $campaign->title : ''; ?>" placeholder="campaign name">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Campaign slug: <span class="text-danger">*</span></label>
							<input type="text" name="slug" class="form-control" value="<?php echo ($campaign->slug) ? $campaign->slug : ''; ?>" placeholder="Slug">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Page meta title: </label>
							<input type="text" name="meta_title" class="form-control" value="<?php echo ($campaign->meta_title) ? $campaign->meta_title : ''; ?>" placeholder="Meta title">
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group">
							<label>Page meta description: </label>
							<textarea name="meta_description" class="form-control" placeholder="Meta description"><?php echo ($campaign->meta_description) ? $campaign->meta_description : ''; ?></textarea> 
						</div>
					</div>

					<?php if (!empty($id)) : ?>
						<input type="hidden" name="id" value="<?php echo $id; ?>"> 
					<?php endif; ?>
					
					<div class="col-md-4">
						<div class="form-group">
							<label>Campaign start date: <span class="text-danger">*</span></label>
							<input type="date" name="start_date" class="form-control" value="<?php echo ($campaign->start_date!='1970-01-01') ? $campaign->start_date : ''; ?>" placeholder="Start date">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Campaign end date: <span class="text-danger">*</span></label>
							<input type="date" name="end_date" class="form-control" value="<?php echo ($campaign->end_date!='1970-01-01') ? $campaign->end_date : ''; ?>" placeholder="End date">
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label>Campaign target: <span class="text-danger">*</span></label>
							<input type="text" name="target" class="form-control" value="<?php echo ($campaign->target) ? $campaign->target : ''; ?>" placeholder="target">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Description: <span class="text-danger">*</span></label>
							<textarea required class="summernote" name="description"><?php echo (!empty($campaign->description)) ? $campaign->description : ""; ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Banner image: <span class="text-danger">*</span></label>
							<input type="file" name="image" data-image-name="<?php echo $campaign->image; ?>" class="form-control">
							<?php if (!empty($campaign->image)) : ?>
							<a target="_blank" href="<?php echo base_url('uploads/campaign/' . $campaign->image) ?>">
							<img src="<?php echo base_url('uploads/campaign/' . $campaign->image) ?>" class="img-circle img-sm" border="0">
							</a>	 
							<?php endif; ?>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Status: <span class="text-danger">*</span></label>
							<select name="status" class="select">
								<option value="Active" <?php echo (!empty($campaign->status) && $campaign->status == 'Active') ? 'selected' : ''; ?>>Active</option>
								<option value="Inactive" <?php echo (!empty($campaign->status) && $campaign->status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>

							</select>
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