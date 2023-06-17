<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Addon</span> - <?php echo (!$id) ? 'Add' : 'Edit'; ?></h4>
		</div>

		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="<?php echo base_url('admin/addon/all'); ?>" class="btn btn-link btn-float has-text"><i class="icon-list-ordered text-primary"></i> <span>All addon</span></a>
			</div>
		</div>
	</div>

	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
			<li><a href="<?php echo base_url('admin/addon/all'); ?>">Addon</a></li>
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
			<h6 class="panel-title"><?php echo (!$id) ? 'Add' : 'Edit'; ?> addon</h6>
			 
		</div>

		<form class="form-validation" id="add-addon" action="" method="post">
			<fieldset class="step" id="add-edit-addon">

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Title: <span class="text-danger">*</span></label>
							<input type="text" name="title" class="form-control" value="<?php echo (!empty($addon->title)) ? $addon->title : ''; ?>" placeholder="Title">
						</div>
					</div> 

					<?php if (!empty($id)) : ?>
						<input type="hidden" name="id" value="<?php echo $id; ?>"> 
					<?php endif; ?> 

					<div class="col-md-6">
						<div class="form-group">
							<label>Price: </label>
							<input type="text" name="price" class="form-control integeronly" value="<?php echo (!empty($addon->price)) ? $addon->price : ''; ?>" placeholder="Price">
						</div>
					</div> 
					<div class="col-md-6">
						<div class="form-group">
							<label>Image: <span class="text-danger">*</span></label>
							<input type="file" name="image" data-image-name="<?php echo (!empty($addon->image)) ? $addon->image : ''; ?>" class="form-control">
							<?php if (!empty($addon->image)) : ?>
							<a target="_blank" href="<?php echo base_url('uploads/addon/'.$addon->id. '/' . $addon->image) ?>">
							<img src="<?php echo base_url('uploads/addon/' .$addon->id. '/'. $addon->image) ?>" class="img-circle img-sm" border="0">
							</a>	 
							<?php endif; ?>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Status: <span class="text-danger">*</span></label>
							<select name="status" class="select">
								<option value="Active" <?php echo (!empty($addon->status) && $addon->status == 'Active') ? 'selected' : ''; ?>>Active</option>
								<option value="Inactive" <?php echo (!empty($addon->status) && $addon->status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>

							</select>
						</div>
					</div>
				</div> 
			</fieldset>

			<div class="form-wizard-actions pt-25">
				<button class="btn btn-info" type="submit"><?php echo (!$id) ? 'Submit' : 'Update'; ?></button>
			</div>
		</form>
	</div>
	<?php $this->load->view('includes/admin/tagline'); ?>
</div>
<!-- /content area -->

<div class="modal fade" id="add-edit-price" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add/Edit addon Price</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form   id="add-addon-price" action="" method="post">
	      <input type="hidden" name="addon_id" id="addon_id" value="<?php echo $id; ?>">
		  <input type="hidden" name="id" id="id" value="">
		  <div class="modal-body mx-3">
			<div class="md-form mb-5"> 
			  <input type="text" name="lable" id="lable-name" class="form-control validate">
			  <label data-error="wrong" data-success="right" for="lable-name">addon sub title</label>
			</div>
			<div class="md-form mb-5"> 
			  <input type="text" name="price" id="price-regular" class="form-control validate integeronly">
			  <label data-error="wrong" data-success="right" for="price-regular">Regular price</label>
			</div>

			<div class="md-form mb-4"> 
			  <input type="text" name="discount_price" id="price-discounted" class="form-control validate integeronly">
			  <label data-error="wrong" data-success="right" for="price-discounted">Discount price</label>
			</div>

		  </div>
		  <div class="modal-footer d-flex justify-content-center">
			<button class="btn btn-info">Save</button>
		  </div>
	  </form>
    </div>
  </div>
</div>

 