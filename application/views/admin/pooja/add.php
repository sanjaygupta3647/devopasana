<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Pooja</span> - <?php echo (!$id) ? 'Add' : 'Edit'; ?></h4>
		</div>

		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="<?php echo base_url('admin/pooja/all'); ?>" class="btn btn-link btn-float has-text"><i class="icon-list-ordered text-primary"></i> <span>All pooja</span></a>
			</div>
		</div>
	</div>

	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
			<li><a href="<?php echo base_url('admin/pooja/all'); ?>">Pooja</a></li>
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
			<h6 class="panel-title"><?php echo (!$id) ? 'Add' : 'Edit'; ?> pooja</h6>
				<?php if($id > 0): ?>
				<a class="addprice" data-toggle="modal" data-target="#add-edit-price" href="">
					<span class="btn btn-primary btn-sm">Add Pooja Price</span>
				</a>
				<?php endif; ?>
		</div>

		<form class="form-validation" id="add-pooja" action="" method="post">
			<fieldset class="step" id="add-edit-pooja">

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Pooja title: <span class="text-danger">*</span></label>
							<input type="text" name="title" class="form-control" value="<?php echo ($pooja->title) ? $pooja->title : ''; ?>" placeholder="pooja name">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>pooja slug: <span class="text-danger">*</span></label>
							<input type="text" name="slug" class="form-control" value="<?php echo ($pooja->slug) ? $pooja->slug : ''; ?>" placeholder="Slug">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Meta title: <span class="text-danger">*</span></label>
							<input type="text" name="meta_title" class="form-control" value="<?php echo ($pooja->meta_title) ? $pooja->meta_title : ''; ?>" placeholder="Meta title">
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group">
							<label>Meta description: <span class="text-danger">*</span></label>
							<textarea name="meta_description" class="form-control" placeholder="Meta description"><?php echo ($pooja->meta_description) ? $pooja->meta_description : ''; ?></textarea> 
						</div>
					</div>

					<?php if (!empty($id)) : ?>
						<input type="hidden" name="id" value="<?php echo $id; ?>"> 
					<?php endif; ?>
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Start date: </label>
							<input type="date" name="start_date" class="form-control" value="<?php echo ($pooja->start_date!='1970-01-01') ? $pooja->start_date : ''; ?>" placeholder="Start date">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>End date: </label>
							<input type="date" name="end_date" class="form-control" value="<?php echo ($pooja->end_date!='1970-01-01') ? $pooja->end_date : ''; ?>" placeholder="End date">
						</div>
					</div>
					
					 
					<div class="col-md-12">
						<div class="form-group">
							<label>Description: <span class="text-danger">*</span></label>
							<textarea required class="summernote" name="description"><?php echo (!empty($pooja->description)) ? $pooja->description : ""; ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Banner image: <span class="text-danger">*</span></label>
							<input type="file" name="image" data-image-name="<?php echo $pooja->image; ?>" class="form-control">
							<?php if (!empty($pooja->image)) : ?>
							<a target="_blank" href="<?php echo base_url('uploads/pooja/'.$pooja->id. '/' . $pooja->image) ?>">
							<img src="<?php echo base_url('uploads/pooja/' .$pooja->id. '/'. $pooja->image) ?>" class="img-circle img-sm" border="0">
							</a>	 
							<?php endif; ?>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Status: <span class="text-danger">*</span></label>
							<select name="status" class="select">
								<option value="Active" <?php echo (!empty($pooja->status) && $pooja->status == 'Active') ? 'selected' : ''; ?>>Active</option>
								<option value="Inactive" <?php echo (!empty($pooja->status) && $pooja->status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>

							</select>
						</div>
					</div>
				</div>
				
				<div class="row" id="poojaprice">
				    
					<?php if(count($pricelist)): ?> 
					<?php foreach($pricelist as $val): ?> 
					<div class="pricesection">
						<div class="col-md-6">
							<div class="form-group">
								<label>Title: <span class="text-danger">*</span></label>
								<input type="text" name="lable" class="form-control" disabled value="<?php echo $val->lable;  ?>" placeholder="Pooja sub title">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Regular price: <span class="text-danger">*</span></label>
								<input type="text" name="price" class="form-control" disabled value="<?php echo $val->price;  ?>" placeholder="Regular price">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Discounted price: <span class="text-danger">*</span></label>
								<input type="text" name="discount_price" disabled class="form-control" value="<?php echo $val->discount_price;  ?>" placeholder="Discounted price">
							</div>
						</div>
						
						<div class="col-md-2">
							<div class="form-group pt-25">
								<label> <span class="text-danger"></span></label>
								<button class="btn btn-warning delete_price" data-id="<?php echo $val->id ?>" type="button">Delete</button>
								<button class="btn btn-info editprice" data-lable="<?php echo $val->lable;  ?>"  data-price="<?php echo $val->price;  ?>" data-id="<?php echo $val->id ?>" data-discount_price="<?php echo $val->discount_price;  ?>" type="button" data-toggle="modal" data-target="#add-edit-price"  >Edit</button>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
					<?php endif; ?>
				
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
        <h4 class="modal-title w-100 font-weight-bold">Add/Edit Pooja Price</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form   id="add-pooja-price" action="" method="post">
	      <input type="hidden" name="pooja_id" id="pooja_id" value="<?php echo $id; ?>">
		  <input type="hidden" name="id" id="id" value="">
		  <div class="modal-body mx-3">
			<div class="md-form mb-5"> 
			  <input type="text" name="lable" id="lable-name" class="form-control validate">
			  <label data-error="wrong" data-success="right" for="lable-name">Pooja sub title</label>
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

 