 <!-- Page header -->
 <div class="page-header page-header-default">
 	<div class="page-header-content">
 		<div class="page-title">
 			<h4><span class="text-semibold">Members</span> - List</h4>
 		</div>

 		<div class="heading-elements">
 			<div class="heading-btn-group">
 				<a href="<?php echo base_url('customer/add_members'); ?>" class="btn btn-link btn-float has-text"><i class="icon-plus-circle2 text-primary"></i> <span>Add New</span></a>
 			</div>
 		</div>
 	</div>

 	 
 </div>
 <!-- /page header -->


 <!-- Content area -->
 <div class="content">

 	<!-- Basic responsive configuration -->
 	<div class="panel panel-flat">
 		 
 		<table class="table datatable-responsive">
 			<thead>
 				<tr>
 					<th>#</th>
 					<th>Name</th>
					<th>Relation</th>
 					<th>Gotra</th>
 					<th>Nakshatra</th>
 					<th>Rashi</th> 
 					<th>Date of birth</th>
 					<th>Time of birth</th>
 					<th>Please of birth</th>
 					<th>Other info</th>
 					<th class="text-center">Actions</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php foreach ($devotees as $key => $val) : ?>
 					<tr>
 						<td><?php echo ($key + 1) ?></td>
 						<td><a href="<?php echo base_url("customer/add_members/" . $val->id) ?>"><?php echo $val->name; ?></a></td>
 						<td><?php echo ucfirst($val->relation); ?></td>
 						<td><?php echo $val->gotra; ?></td>
						<td><?php echo $val->nakshatra; ?></td>
						<td><?php echo $val->rashi; ?></td>
						<td><?php echo $val->dob; ?></td>
						<td><?php echo $val->tob; ?></td>
						<td><?php echo $val->pob; ?></td>
						<td><?php echo $val->additional_info; ?></td>
 						<td class="text-center">
 							<ul class="icons-list">
 								<li class="dropdown">
 									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
 										<i class="icon-menu9"></i>
 									</a>

 									<ul class="dropdown-menu dropdown-menu-right">
 										<li><a href="<?php echo base_url("customer/add_members/" . $val->id) ?>"><i class="icon-database-edit2"></i>Update</a></li>
 										<li><a href="javascript:void(0)" class="delete-devotee" data-id="<?php echo $val->id ?>"><i class="icon-database-remove"></i>Delete</a></li>
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