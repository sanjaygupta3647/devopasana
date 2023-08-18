<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">My Profile</span> </h4>
		</div>

		<div class="heading-elements">
			<div class="heading-btn-group">
				 
				<a class="change_status"  href="javascript:void(0)" >
					<span class="label label-info updatepassword" data-id="<?php echo $user_basic->id ?>"  data-username="<?php echo $user_basic->username ?>">Change Password</span>

				</a>

			</div>
		</div>
	</div>

	 
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
	<!-- Wizard with validation -->
	<div class="panel panel-white">
		<div class="panel-heading">
			<h6 class="panel-title"><?php echo (!$id) ? 'Add' : 'Edit'; ?> User</h6>
		</div>

		<form class="form-validation" id="add-edit-user" action="" method="post" enctype="multipart/form-data">
			<fieldset class="step" id="myform">
				<input type="hidden" id="user-id" name="id" value="<?php echo $id; ?>"> 
				 
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Username: <span class="text-danger">*</span></label>
							<input type="text" name="username" class="form-control" value="<?php echo ($user_basic->username) ? $user_basic->username : ''; ?>" placeholder="Username">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Email: <span class="text-danger">*</span></label>
							<input type="email" name="email" class="form-control" value="<?php echo ($user_details->email) ? $user_details->email : ''; ?>" placeholder="Email">
						</div>
					</div>


				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>First Name: <span class="text-danger">*</span></label>
							<input type="text" name="fname" class="form-control" value="<?php echo ($user_details->fname) ? $user_details->fname : ''; ?>" placeholder="First Name">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Last Name: </label>
							<input type="text" name="lname" class="form-control" value="<?php echo ($user_details->lname) ? $user_details->lname : ''; ?>" placeholder="Last Name">
						</div>
					</div>
				</div>

				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Address:</label>
							<input type="text" name="address" class="form-control" value="<?php echo ($user_details->address) ? $user_details->address : ''; ?>" placeholder="Address">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>City:</label>
							<input type="text" name="city" class="form-control" value="<?php echo ($user_details->city) ? $user_details->city : ''; ?>" placeholder="City">
						</div>
					</div>
				</div>

				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
							<label>State:</label>
							<input type="text" name="state" class="form-control" value="<?php echo ($user_details->state) ? $user_details->state : ''; ?>" placeholder="State">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Country:</label>
							<input type="text" name="country" class="form-control" value="<?php echo ($user_details->country) ? $user_details->country : ''; ?>" placeholder="Country">
						</div>
					</div>
				</div>

				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Pin Code:</label>
							<input type="text" name="pincode" class="form-control" value="<?php echo ($user_details->pincode) ? $user_details->pincode : ''; ?>" placeholder="Pin code">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Profile Image: </label>
							<input type="file" name="profile_pic" class="form-control">
							<?php if (!empty($user_details->profile_pic)) : ?>
							<a target="_blank" href="<?php echo base_url('uploads/profile/' . $user_details->profile_pic) ?>">
							<img src="<?php echo base_url('uploads/profile/' . $user_details->profile_pic) ?>" class="img-circle img-sm" border="0">
							</a>	 
							<?php endif; ?>
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