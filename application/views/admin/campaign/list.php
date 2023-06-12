 <!-- Page header -->
 <div class="page-header page-header-default">
 	<div class="page-header-content">
 		<div class="page-title">
 			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Campaign</span> - List</h4>
 		</div>
 	</div>

 	<div class="breadcrumb-line">
 		<ul class="breadcrumb">
 			<li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-home2 position-left"></i> Home</a></li>
 			<li><a href="<?php echo base_url('admin/campaign/all'); ?>">Campaign</a></li>
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
 			<h5 class="panel-title">All Camapign</h5>
 		</div>
 		<table class="table datatable-responsive">
 			<thead>
 				<tr>

 					<th width="5%">#</th>
 					<th width="30%">Heading</th>
 					<th width="10%">Target</th>
					<th width="13%">Start Date</th>
 					<th width="15%">End Date</th> 
 					<th width="15%">Added On</th> 
 					<th width="5%">Status</th>
 					<th width="5%" class="text-center">Action</th>
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