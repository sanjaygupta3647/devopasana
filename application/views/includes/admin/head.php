<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo (!empty($pagetitle)) ? $pagetitle : ""; ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo media_url('admin/css/icons/icomoon/styles.css').VERSION; ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo media_url('admin/css/bootstrap.css').VERSION; ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo media_url('admin/css/core.css').VERSION; ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo media_url('admin/css/components.css').VERSION; ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo media_url('admin/css/colors.css').VERSION; ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo media_url('admin/css/custom.css').VERSION; ?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<?php
	if (isset($pageCss) && !empty($pageCss) && is_array($pageCss)) {
		foreach ($pageCss as $c => $c_val) { // $j_val -- true for external url
			if ($c != "") {
				if ($c_val == "false") {
					echo '<link rel="stylesheet" href="' . media_url($c).VERSION . '">';
				} else {
					echo '<link rel="stylesheet" href=""' . $c . '">' . "\n";
				}
			}
		}
	}
	?>
	 
	<link rel="shortcut icon" href="<?php echo media_url("admin/images/favicon.ico"); ?>" type="image/x-icon">
	<link rel="icon" href="<?php echo media_url("admin/images/favicon.ico"); ?>" type="image/x-icon">
	 

</head>

<body>