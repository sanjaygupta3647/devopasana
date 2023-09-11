<!-- Page header -->
<?php  
$userdata = getCustomerDetails(); 
?>
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">My Profile Details</span> </h4>
		</div>
		
		 

		<div class="heading-elements">
			<div class="heading-btn-group">
				 
				<a class="btn btn-link btn-float has-text"  href="javascript:void(0)" >
					<i class="icon-plus-circle2 text-primary hide"></i><button class="btn-info updatepassword" data-id="<?php echo $userdata->id ?>"  data-username="<?php echo $userdata->email ?>">Change Password</button>

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
		<form class="form-validation p-20" id="register" action="" method="post" enctype="multipart/form-data">
			<fieldset class="step" id="myform">
				<input type="hidden" id="user-id" name="id" value="<?php echo $userdata->id; ?>"> 
				 
				<div class="row"> 
				
				    <div class="col-md-6">
						<div class="form-group">
							<label>Name: <span class="text-danger">*</span></label>
							<input type="text" name="name" class="form-control" value="<?php echo ($userdata->name) ? $userdata->name : ''; ?>" placeholder="Name">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Email: <span class="text-danger">*</span></label>
							<input type="email" name="email" class="form-control" value="<?php echo ($userdata->email) ? $userdata->email : ''; ?>" placeholder="Email">
						</div>
					</div>


				</div>

				<div class="row">
				   <div class="col-md-6">
						<div class="form-group">
							<label>Phone: </label>
							<input type="text" name="phone" class="form-control" value="<?php echo ($userdata->phone) ? $userdata->phone : ''; ?>" placeholder="Phone">
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Address line 1: </label>
							<input type="text" name="address1" class="form-control" value="<?php echo ($userdata->address1) ? $userdata->address1 : ''; ?>" placeholder="Address line 1">
						</div>
					</div>
				</div>

				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Address line 2:</label>
							<input type="text" name="address2" class="form-control" value="<?php echo ($userdata->address2) ? $userdata->address2 : ''; ?>" placeholder="Address line 2">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Town/City:</label>
							<input type="text" name="town" class="form-control" value="<?php echo ($userdata->town) ? $userdata->town : ''; ?>" placeholder="Town/City">
						</div>
					</div>
				</div>

				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
							<label>State:</label>
							<input type="text" name="state" class="form-control" value="<?php echo ($userdata->state) ? $userdata->state : ''; ?>" placeholder="State">
						</div>
					</div>
					 
				</div> 

			</fieldset>

			<div class="form-wizard-actions">
				<button class="btn btn-info" type="submit">Update Details</button>
			</div>
		</form>
	</div>

	<?php $this->load->view('includes/user/tagline'); ?>
</div>
<!-- /content area -->