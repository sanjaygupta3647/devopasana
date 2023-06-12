 <!-- Page header -->
 <div class="page-header page-header-default">
 	<div class="page-header-content">
 		<div class="page-title">
 			<h4><a href="javascript:history.back()"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Dashboard</span></h4>
 		</div>

 	</div>


 </div>
 <!-- /page header -->


 <!-- Content area -->
 <div class="content"> 
 	<div class="panel panel-flat well"> 
 		<div class="row">
 			<div class="col-md-6 col-sm-6 col-lg-3">
 				<a href="<?php echo base_url('admin/seva/'); ?>">
 					<div class="panel card-box card-primary  with-shadow linear-card ">
 						<div class="panel-body">
 							<div class="row">
 								<div class="col-xs-10 col-sm-10 col-md-10">
 									<i class="icon-ticket"></i>
 									<b>All Open Campaigns(<?php echo $allTickets; ?>)</b>
 								</div>
 								<div class="col-xs-2 col-sm-2 col-md-2">
 									<i class="icon-arrow-right7"></i>
 								</div>
 							</div>
 						</div>
 					</div>
 				</a>
 			</div>
 			<div class="col-md-6 col-sm-6 col-lg-3">
 				<a href="<?php echo base_url('admin/ticket/?status=Open'); ?>">
 					<div class="panel card-box card-primary  with-shadow linear-card ">
 						<div class="panel-body">
 							<div class="row">
 								<div class="col-xs-10 col-sm-10 col-md-10">
 									<i class="icon-ticket"></i>
 									<b>All Open Seva(<?php echo $openTickets; ?>)</b>
 								</div>
 								<div class="col-xs-2 col-sm-2 col-md-2">
 									<i class="icon-arrow-right7"></i>
 								</div>
 							</div>
 						</div>
 					</div>
 				</a>
			 </div>
			 
			 <div class="col-md-6 col-sm-6 col-lg-3">
 				<a href="<?php echo base_url('admin/ticket/?status=Progress'); ?>">
 					<div class="panel card-box card-primary  with-shadow linear-card ">
 						<div class="panel-body">
 							<div class="row">
 								<div class="col-xs-10 col-sm-10 col-md-10">
 									<i class="icon-ticket"></i>
 									<b>Bookings(<?php echo $inProcessTickets; ?>)</b>
 								</div>
 								<div class="col-xs-2 col-sm-2 col-md-2">
 									<i class="icon-arrow-right7"></i>
 								</div>
 							</div>
 						</div>
 					</div>
 				</a>
 			</div>

 			<div class="col-md-6 col-sm-6 col-lg-3">
 				<a href="<?php echo base_url('admin/ticket/?status=Closed'); ?>">
 					<div class="panel card-box card-primary  with-shadow linear-card ">
 						<div class="panel-body">
 							<div class="row">
 								<div class="col-xs-10 col-sm-10 col-md-10">
 									<i class="icon-ticket"></i>
 									<b>Bookings(<?php echo $closedTickets; ?>)</b>
 								</div>
 								<div class="col-xs-2 col-sm-2 col-md-2">
 									<i class="icon-arrow-right7"></i>
 								</div>
 							</div>
 						</div>
 					</div>
 				</a>
 			</div>
 		</div>
 	</div>

 	<!-- /basic responsive configuration -->


 	<?php $this->load->view('includes/admin/tagline'); ?>

 </div>
 <!-- /content area -->