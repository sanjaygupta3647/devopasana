<div class="section pt-30">
     
	<?php if($pp_code=='SUCCESS'): ?>
	<div class="alert alert-success text-center">
	  <strong>Success!</strong> your payment has been received.
	</div>
	<h3 class="text-center">Thank you for your payment, it’s processing</h3>

	<p class="text-center">Your site transaction id is: <?php echo $site_trans_id; ?></p>
	<p class="text-center">Your phone pay transaction id is: <?php echo $pp_trans_id; ?></p>
	<p class="text-center">You will receive an order confirmation email with details of your order.</p>
	<?php endif; ?>
	
	<?php if($pp_code=='FAIL'): ?>
	<div class="alert alert-danger text-center">
	  <strong>Fail!</strong> 
	</div>
	<h3 class="text-center text-black">Sorry, your payment has been not received.</h3>

	<p class="text-center">Your transaction id is: <?php echo $site_trans_id; ?></p>
	<p class="text-center">Your phone pay transaction id is: <?php echo $pp_trans_id; ?></p>
	<p class="text-center text-black">You will receive an email with details of your order.</p>
	<?php endif; ?>
	 
	
	<center>
		<div class="btn-group" style="margin-top:50px;">
			<a href="<?php echo base_url("profile"); ?>" class="btn btn-lg btn-warning">Go to your profile</a>
		</div>
	</center> 
</div>