<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Page</span> - <?php echo (!$id) ? 'Add' : 'Edit'; ?></h4>
		</div>

		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="<?php echo base_url('admin/page/all'); ?>" class="btn btn-link btn-float has-text"><i class="icon-list-ordered text-primary"></i> <span>All page</span></a>
			</div>
		</div>
	</div>

	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
			<li><a href="<?php echo base_url('admin/page/all'); ?>">Page</a></li>
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
			<h6 class="panel-title"><?php echo (!$id) ? 'Add' : 'Edit'; ?> page</h6>
		</div>

		<form class="form-validation" id="add-edit" action="" method="post">
			<fieldset class="step" id="add-edit-pages">
				<?php if (!empty($id)) : ?>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
				<?php endif; ?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Title: <span class="text-danger">*</span></label>
							<input type="text" required name="title" class="form-control" value="<?php echo ($page->title) ? $page->title : ''; ?>" placeholder="Page title">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Status: <span class="text-danger">*</span></label>
							<select name="status" class="select" required>
								<option value="Active" <?php echo (!empty($page->status) && $page->status == 'Active') ? 'selected' : ''; ?>>Active</option>
								<option value="Inactive" <?php echo (!empty($page->status) && $page->status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>

							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Category: <span class="text-danger">*</span></label>
							<select name="category_id" class="select" required>
							    <?php foreach($category as $val): ?>
								<option value="<?php echo $val->id ?>" <?php echo (!empty($page->category_id) && $page->category_id == $val->id) ? 'selected' : ''; ?>><?php echo $val->title ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Description: <span class="text-danger">*</span></label>
							<textarea required class="summernote" name="body"><?php echo (!empty($page->body)) ? $page->body : ""; ?></textarea>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Meta Title:</label>
							<input type="text" name="meta_title" class="form-control" value="<?php echo ($page->meta_title) ? $page->meta_title : ''; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Meta Keywords:</label>
							<input type="text" name="meta_keyword" class="form-control" value="<?php echo ($page->meta_keyword) ? $page->meta_keyword : ''; ?>">
						</div>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Meta Description:</label>
							<input type="text" name="meta_description" class="form-control" value="<?php echo ($page->meta_description) ? $page->meta_description : ''; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Page Order:</label>
							<input type="text" name="porder" class="form-control" value="<?php echo ($page->porder) ? $page->porder : '0'; ?>">
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