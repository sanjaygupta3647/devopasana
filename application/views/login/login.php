<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	 
	<title>Devopasana</title>
	<?php if (!empty($meta_keywords)) : ?>
		<meta name="keyword" content="<?php echo  $meta_keywords; ?>">
	<?php endif; ?>
	<meta name="description" content="Devopasana">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo media_url('admin/css/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo media_url('admin/css/bootstrap.css" rel="stylesheet'); ?>" type="text/css">
	<link href="<?php echo media_url('admin/css/core.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo media_url('admin/css/components.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo media_url('admin/css/colors.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo media_url('admin/css/custom.css'); ?>" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->
	<?php if (!empty($setting->favicon)) : ?>
		<link rel="shortcut icon" href="<?php echo base_url('uploads/' . $setting->favicon); ?>" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url('uploads/' . $setting->favicon); ?>" type="image/x-icon">
	<?php endif; ?>





</head>

<body class="login-container">
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form id="loginform" method="post" action="">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-accessibility"></i></div>
								<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="username" class="form-control" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2  position-right"></i></button>
							</div>

							<div class="text-center">
								<a href="<?php echo base_url(); ?>">Go To Home Page</a>
							</div>
						</div>
					</form>
					<!-- /simple login form -->
					<div class="footer text-muted text-center">
						&copy; <?php echo date("Y") ?>. Powered by <a href="https://iamsanjaygupta.com/" target="_blank">Sanjay Kumar Gupta</a>
					</div>


				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo media_url('admin/js/plugins/loaders/pace.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/core/libraries/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/core/libraries/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/plugins/loaders/blockui.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/plugins/loaders/blockui.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/plugins/forms/validation/validate.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/app.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo media_url('admin/js/bootbox.min.js'); ?>"></script>


	<script type="text/javascript">
		var base_url = '<?php echo base_url(); ?>';
	</script>

	<script type="text/javascript" src="<?php echo media_url('admin/js/login.js'); ?>"></script>
	<!-- /core JS files -->
	<div id="loader" class="overlay hide"><i class="icon-spinner9 spinner"></i> </div>
</body>

</html>