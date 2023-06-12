<?php 
$sess = getSessionData();  
$userdata = getUserData($sess["user_id"]);
?>
<div class="sidebar sidebar-main">
	<div class="sidebar-content">
		<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<a href="#" class="media-left"><img src="<?php echo base_url('uploads/profile/' . $userdata->profile_pic) ?>" class="img-circle img-sm" alt=""></a>
					<div class="media-body">
						<span class="media-heading text-semibold"><?php echo $userdata->fname; ?><?php echo ($userdata->lname) ? ', ' . $userdata->lname : ""; ?></span>
						<div class="text-size-mini text-muted">
							<i class="icon-pin text-size-small"></i> &nbsp;
							<?php echo $userdata->city; ?><?php echo ($userdata->state) ? ', ' . $userdata->state : ""; ?><?php echo ($userdata->country) ? ', ' . $userdata->country : ""; ?>


						</div>
					</div>

					<div class="media-right media-middle">
						<ul class="icons-list">
							<li>
								<a href="<?php echo base_url('admin/users/profile'); ?>"><i class="icon-cog3"></i></a>
							</li>
						</ul>
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
					<li <?php echo ($this->router->class == "dashboard" && $this->router->method == "index") ? 'class="active"' : ''; ?>>
						<a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a>
					</li>
					<?php if ($role_id == 1) : ?> 

						<li>
							<a href="#"><i class="icon-users"></i> <span>Users</span></a>
							<ul>
								<li <?php echo ($this->router->class == "users" && $this->router->method == "add") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('admin/users/add'); ?>">Add</a></li>
								<li <?php echo ($this->router->class == "users" && $this->router->method == "all") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('admin/users/all'); ?>">List</a></li>

							</ul>
						</li>
					<?php endif; ?>
					<li>
						<a href="#"><i class="icon-ticket"></i> <span>Campaign</span></a>
						<ul>
								<li <?php echo ($this->router->class == "campaign" && $this->router->method == "add") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('admin/campaign/add'); ?>">Add</a></li>
								<li <?php echo ($this->router->class == "campaign" && $this->router->method == "all") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('admin/campaign/all'); ?>">List</a></li>
						</ul>
					</li>
					
					<li>
						<a href="#"><i class="icon-ticket"></i> <span>Pooja</span></a>
						<ul>
								<li <?php echo ($this->router->class == "pooja" && $this->router->method == "add") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('admin/pooja/add'); ?>">Add</a></li>
								<li <?php echo ($this->router->class == "pooja" && $this->router->method == "all") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('admin/pooja/all'); ?>">List</a></li>
						</ul>
					</li>

					<?php if ($role_id == 1) : ?>

						<li>
							<a href="#"><i class="icon-question3"></i> <span>Faq</span></a>
							<ul>
								<li <?php echo ($this->router->class == "faq" && $this->router->method == "add") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('admin/faq/add'); ?>">Add</a></li>
								<li <?php echo ($this->router->class == "faq" && $this->router->method == "all") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('admin/faq/all'); ?>">List</a></li>

							</ul>
						</li>

						<li>
							<a href="#"><i class="icon-stack2"></i> <span>Static Pages</span></a>
							<ul>
								<li <?php echo ($this->router->class == "page" && $this->router->method == "add") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('admin/page/add'); ?>">Add</a></li>
								<li <?php echo ($this->router->class == "page" && $this->router->method == "all") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('admin/page/all'); ?>">List</a></li>

							</ul>
						</li> 
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>