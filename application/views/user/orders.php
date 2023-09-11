 <!-- Page header -->
 <div class="page-header page-header-default">
 	<div class="page-header-content">
 		<div class="page-title">
 			<h4><span class="text-semibold">Order</span> - List</h4>
 		</div>

 		 
 	</div>

 	 
 </div>
 <!-- /page header -->


 <!-- Content area -->
 <div class="content">

 	<!-- Basic responsive configuration -->
 	<div class="panel panel-flat table-responsive">
 		 
 		<table class="table datatable-responsive">
 			<thead>
 				<tr>
 					<th>#</th>
 					<th>Pooja</th>
					<th>Campaign</th>
 					<th>Total amount</th>
 					<th>Order date</th>
					<th>Transaction Id</th>
 					<th>Status</th>   
 				</tr>
 			</thead>
 			<tbody>
			    <?php if(count($orders)): ?>
 				<?php foreach ($orders as $key => $val) : ?>
 					<tr>
 						<td><?php echo ($key + 1) ?></td>
 						<td width="20%"><a href="<?php echo base_url("order/detail/" . $val->id) ?>"><?php echo $val->puja; ?></a></td>
 						<td width="20%"><?php echo $val->campaign; ?></td>
 						<td><?php echo showprice($val->total_price); ?></td>
						<td><?php echo userDateTimeFormat($val->create_time); ?></td>
						<td><?php echo $val->transaction_id; ?></td> 
						<td><?php echo $val->pp_response_code; ?></td>  
 					</tr>
 				<?php endforeach; ?>
				<?php else: ?>
				    <tr>
 						<td colspan="6" align="center">No order made by you till now.</td> 
 					</tr>
				<?php endif; ?>

 			</tbody>
 		</table>
 	</div>
 	<!-- /basic responsive configuration -->


 	<?php $this->load->view('includes/admin/tagline'); ?>

 </div>
 <!-- /content area -->