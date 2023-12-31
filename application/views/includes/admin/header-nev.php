<!-- Main navbar -->
<?php  
$sess = getSessionData();  
$userdata = getUserData($sess["user_id"]); 
?>
<div class="navbar navbar-inverse">
	<div class="navbar-header">
		 
			<a class="navbar-brand" href="<?php echo base_url('admin/dashboard'); ?>">Devopasana Admin Panel</a>
		 

		<ul class="nav navbar-nav visible-xs-block">
			<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
		</ul>
	</div>

	<div class="navbar-collapse collapse" id="navbar-mobile">
		<ul class="nav navbar-nav">
			<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
		</ul>



		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url('uploads/profile/' . $userdata->profile_pic) ?>" alt="<?php echo $userdata->username; ?>">
						<span><?php echo $userdata->username; ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo base_url('admin/users/profile'); ?>"><i class="icon-cog5"></i> Account settings</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url('login/logout') ?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- /main navbar -->