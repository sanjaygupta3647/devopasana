 <!-- Page header -->
 <div class="page-header page-header-default">
 	<div class="page-header-content">
 		<div class="page-title">
 			<h4><span class="text-semibold">Order details for transaction id </span> - <?php echo $order->transaction_id ?></h4>
 		</div>
		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="<?php echo base_url('orders'); ?>" class="btn btn-link btn-float has-text"><i class="icon-list-ordered text-primary"></i> <span>All orders</span></a>
			</div>
		</div>
 		 
 	</div>

 	 
 </div>
 <!-- /page header -->


 <!-- Content area -->
 <div class="content">

 	<!-- Basic responsive configuration -->
 	<div class="panel panel-flat">
 		 
 		<table class="table"> 
 				<tr> 
 					<th colspan="2"><b>Order summary</b></th>
					<th><b>Amount</b></th> 
 				</tr> 
				<tr valign="top"> 
					<td width="10%"><img src="<?php echo getThumb(base_url('uploads/pooja/'.$order->pooja_id. '/' . $order->poojaimage),"pooja",100) ?>" alt="<?php echo $order->puja; ?>"></td> 
					<td align="left" style="vertical-align:top;" >
					
					Pooja: <?php echo $order->puja; ?><br/>
					Campaign: <?php echo $order->campaign; ?><br/>
					Time: <?php echo userDateTimeFormat($order->create_time); ?><br/>
					Status: <?php echo $order->pp_response_code; ?>
					
					</td> 
					<td><?php echo showprice($order->puja_price); ?></td> 
				</tr>
				<tr> 
					<td colspan="2">Service Charge</td> 
					<td><?php echo showprice($order->service_charge); ?></td> 
				</tr>
				<tr> 
					<td colspan="2">Prasad Charge</td> 
					<td><?php echo showprice($order->prasad_charge); ?></td> 
				</tr>
				<?php if(!empty($addons)): ?>
				<tr> 
					<td colspan="3"><b>Additional Add Ons added with this pooja</b></td>  
				</tr>
				
				<?php foreach($addons as $ads): ?>
				
				<tr> 
					<td><img width="50" src="<?php echo base_url('uploads/addon/'.$ads->addon_id. '/' . $ads->image) ?>" alt="<?php echo $ads->title ?>"></td> 
					<td><?php echo $ads->title; ?></td> 
					<td><?php echo showprice($ads->addon_price); ?></td> 
				</tr>
				
				<?php endforeach; ?>
				
				<?php endif; ?>
				
				<tr> 
					<td colspan="2">Total Price</td> 
					<td><?php echo showprice($order->total_price); ?></td>  
				</tr> 
				 
 		</table>
		<table class="table pt-10">
				<tr> 
					<td colspan="8"><b>Devotee details</b></td>  
				</tr>
				<tr> 
					<th>Name</th> 
					<th>Phone</th> 
					<th>Email</th> 
					<th>Address1</th> 
					<th>Address2</th> 
					<th>Town/City</th> 
					<th>State</th> 
					<th>Additional Info</th> 
				</tr>

				<tr> 
					<td><?php echo $order->name; ?></td> 
					<td><?php echo $order->phone; ?></td> 
					<td><?php echo $order->email; ?></td> 
					<td><?php echo $order->address1; ?></td> 
					<td><?php echo $order->address2; ?></td> 
					<td><?php echo $order->town; ?></td> 
					<td><?php echo $order->state; ?></td> 
					<td><?php echo $order->additional_info; ?></td> 
				</tr>
		</table>
		
		<table class="table pt-10">
				<tr> 
					<td colspan="8"><b>Family details in this order</b></td>  
				</tr>
				<tr> 
					<th>Name</th> 
					<th>Relation</th> 
					<th>Gotra</th> 
					<th>Nakshatra</th> 
					<th>Rashi</th> 
					<th>D.O.B.</th> 
					<th>Time O.B.</th> 
					<th>Place O.B.</th> 
					<th>Additional info</th> 
				</tr>
				<?php foreach($devotees as $devotee): ?>
				<tr> 
					<td><?php echo $devotee->name; ?></td> 
					<td><?php echo ucfirst($devotee->relation); ?></td> 
					<td><?php echo $devotee->gotra; ?></td> 
					<td><?php echo $devotee->nakshatra; ?></td> 
					<td><?php echo $devotee->rashi; ?></td> 
					<td><?php echo ($devotee->dob) ? userDateFormat($devotee->dob):""; ?></td> 
					<td><?php echo $devotee->tob; ?></td> 
					<td><?php echo $devotee->pob; ?></td> 
					<td><?php echo $devotee->additional_info; ?></td> 
				</tr>
				<?php endforeach; ?>
		</table>
 	</div>
 	<!-- /basic responsive configuration -->


 	<?php $this->load->view('includes/admin/tagline'); ?>

 </div>
 <!-- /content area -->