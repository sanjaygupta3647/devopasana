 <!-- Page header -->
 <div class="page-header page-header-default">
 	<div class="page-header-content">
 		<div class="page-title">
 			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Ticket</span> - List</h4>
 		</div>
 		<div class="heading-elements">
 			<div class="heading-btn-group">
 				<a href="<?php echo base_url('user/addticket'); ?>" class="btn btn-link btn-float has-text"><i class="icon-plus-circle2 text-primary"></i> <span>Add New</span></a>
 			</div>
 		</div>
 	</div>

 	<div class="breadcrumb-line">
 		<ul class="breadcrumb">
 			<li><a href="<?php echo base_url('user/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
 			<li><a href="<?php echo base_url('user/tickets'); ?>">Tickets</a></li>
 			<li class="active"><?php echo $status; ?></li>
 		</ul>
 	</div>
 </div>
 <!-- /page header -->


 <!-- Content area -->
 <div class="content">
 
	<div class="row">
 		<div class="block full filter 1">
 			<form method="post" class="form-bordered">
 				<div class="form-group col-md-3">
 					<label for="Consultant">Department</label>
 					<select id="department" class="form-control">
 						<option value="">Select Department</option>
 						<?php foreach ($user_departments as $val) :  ?>
 							<option value="<?php echo $val->slug; ?>" <?php if ($input['department'] == $val->slug) echo 'selected'; ?>><?php echo $val->title; ?></option>
 						<?php endforeach; ?>
 					</select>
 				</div>

 				<div class="form-group col-md-3">
 					<label for="example-nf-password">Status</label>
 					<select id="status" class="form-control">
 						<option value="all">All</option>
						 <option value="Open" <?php if ($input['status'] == 'Open') echo 'selected'; ?>>Open</option>
						 <option value="Progress" <?php if ($input['status'] == 'Progress') echo 'selected'; ?>>In Progress</option>
 						<option value="Closed" <?php if ($input['status'] == 'Closed') echo 'selected'; ?>>Closed</option>
 					</select>
 				</div>
 				<div class="form-group col-md-3">
 					<label for="Consultant">Priority</label>
 					<select id="priority" class="form-control">
 						<option value="">Select Priority</option>
 						<option value="Low" <?php if ($input['priority'] == 'Low') echo 'selected'; ?>>Low</option>
 						<option value="Medium" <?php if ($input['priority'] == 'Medium') echo 'selected'; ?>>Medium</option>
 						<option value="High" <?php if ($input['priority'] == 'High') echo 'selected'; ?>>High</option>

 					</select>
 				</div>

 				<div class="form-group col-md-3">
 					<label for="example-nf-password"></label><br>
 					<a class="btn btn-sm btn-primary" id="filter" style="margin-top: 8px;">Filter</a>
 				</div>
 			</form>
 		</div>
 	</div>

 	<!-- Basic responsive configuration -->
 	<div class="panel panel-flat">
 		<div class="panel-heading">
 			<h5 class="panel-title">All Tickets</h5>
 		</div>
 		<table class="table datatable-responsive">
 			<thead>
 				<tr>
 					<th width="5%">#</th>
 					<th width="20%">Department</th>
 					<th width="30%">Subject</th>
 					<th width="10%">Priority</th>
 					<th width="15%">Added On</th>
 					<th width="10%">Status</th>
 					<th width="10%" class="text-center">Action</th>
 				</tr>
 			</thead>
 			<tbody> 

 			</tbody>
 		</table>
 	</div>
 	<!-- /basic responsive configuration -->


 	<?php $this->load->view('includes/user/tagline'); ?>

 </div>
 <!-- /content area -->