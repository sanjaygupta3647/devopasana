 <!-- Page header -->
 <div class="page-header page-header-default">
 	<div class="page-header-content">
 		<div class="page-title">
 			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Faq</span> - List</h4>
 		</div>

 		<div class="heading-elements">
 			<div class="heading-btn-group">
 				<a href="<?php echo base_url('admin/faq/add'); ?>" class="btn btn-link btn-float has-text"><i class="icon-plus-circle2 text-primary"></i> <span>Add New</span></a>
 			</div>
 		</div>
 	</div>

 	<div class="breadcrumb-line">
 		<ul class="breadcrumb">
 			<li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
 			<li><a href="<?php echo base_url('admin/faq/all'); ?>">Faq</a></li>
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
 			<h5 class="panel-title">All Faq</h5>
 		</div>



 		<table class="table datatable-responsive">
 			<thead>
 				<tr>
 					<th>#</th> 
 					<th>Subject</th> 
 					<th>Campaign</th> 
 					<th>Order</th>
 					<th>Status</th>
 					<th class="text-center">Actions</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php foreach ($faqs as $key => $val) : ?>
 					<tr>
 						<td><?php echo ($key + 1) ?></td> 
 						<td><a href="<?php echo base_url("admin/faq/add/" . $val->id) ?>"><?php echo $val->subject; ?></a></td> 
 						<td><?php echo ($val->campaign) ? $val->campaign: 'N/A'; ?></td>
 						<td><?php echo $val->porder; ?></td>
 						<td><span class="label label-<?php echo ($val->status == 'Active') ? 'success' : 'danger'; ?>"><?php echo $val->status; ?></span></td>

 						<td class="text-center">
 							<ul class="icons-list">
 								<li class="dropdown">
 									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
 										<i class="icon-menu9"></i>
 									</a>

 									<ul class="dropdown-menu dropdown-menu-right">
 										<li><a href="<?php echo base_url("admin/faq/add/" . $val->id) ?>"><i class="icon-database-edit2"></i>Update</a></li>
 										<li><a href="javascript:void(0)" class="delete" data-id="<?php echo $val->id ?>"><i class="icon-database-remove"></i>Delete</a></li>
 									</ul>
 								</li>
 							</ul>
 						</td>
 					</tr>
 				<?php endforeach; ?>

 			</tbody>
 		</table>
 	</div>
 	<!-- /basic responsive configuration -->


    <?php $this->load->view('includes/admin/tagline'); ?>

 </div>
 <!-- /content area -->