 <!-- Page header -->
 <div class="page-header page-header-default">
 	<div class="page-header-content">
 		<div class="page-title">
 			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">User</span> - List</h4>
 		</div>

 		<div class="heading-elements">
 			<div class="heading-btn-group">
 				<a href="<?php echo base_url('admin/users/add'); ?>" class="btn btn-link btn-float has-text"><i class="icon-plus-circle2 text-primary"></i> <span>Add New</span></a>
 			</div>
 		</div>
 	</div>

 	<div class="breadcrumb-line">
 		<ul class="breadcrumb">
 			<li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
 			<li><a href="<?php echo base_url('admin/users/all'); ?>">User</a></li>
 			<li class="active">List</li>
 		</ul>
 	</div>
 </div>
 <!-- /page header -->


 <!-- Content area -->
 <div class="content">

 	<!-- Basic responsive configuration -->
 	<div class="panel panel-flat">
 		<div class="panel-heading">
 			<h5 class="panel-title">All User</h5>
 		</div>



 		<table class="table datatable-responsive">
 			<thead>
 				<tr>
 					<th width="5%">#</th>
 					<th width="15%">User</th>
 					<th width="10%">Type</th>
 					<th width="15%">Name</th>
 					<th width="10%">Email</th>
 					<th width="10%">Status</th>
 					<th width="25%">Added On</th>
 					<th width="10%" class="text-center">Actions</th>
 				</tr>
 			</thead>
 			<tbody>


 			</tbody>
 		</table>
 	</div>
 	<!-- /basic responsive configuration -->


 	<?php $this->load->view('includes/admin/tagline'); ?>

 </div>
 <!-- /content area -->