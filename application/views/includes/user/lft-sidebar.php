<?php  
$userdata = getCustomerDetails(); 
?>
<div class="sidebar sidebar-main">
	<div class="sidebar-content">
		<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media"> 
					<div class="media-body">
						<span class="media-heading text-semibold"><?php echo $userdata->name; ?></span>
						<div class="text-size-mini text-muted">
							<i class="icon-pin text-size-small"></i> &nbsp;
							<?php echo $userdata->town; ?><?php echo ($userdata->state) ? ', ' . $userdata->state : ""; ?>

						</div>
					</div>

					 
				</div>
			</div>
		</div>
		<!-- /user menu -->

		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">

					<!-- Main -->
					<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
					<li <?php echo ($this->router->class == "customer" && $this->router->method == "profile") ? 'class="active"' : ''; ?>>
						<a href="<?php echo base_url('profile') ?>"><i class="icon-home4"></i> <span>Personal Details</span></a>
					</li>
					
					<li <?php echo ($this->router->class == "customer" && $this->router->method == "family") ? 'class="active"' : ''; ?>>
						<a href="<?php echo base_url('family') ?>"><i class="icon-users"></i> <span>Family Details</span></a>
					</li> 
					
					<li <?php echo ($this->router->class == "customer" && $this->router->method == "orders") ? 'class="active"' : ''; ?>>
						<a href="<?php echo base_url('orders') ?>"><i class="icon-cart"></i> <span>My Orders</span></a>
					</li>
						 
				</ul>
			</div>
		</div>
	</div>
</div>