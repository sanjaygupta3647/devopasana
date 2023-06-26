<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="<?php echo base_url(); ?>">
	<title><?php echo (!empty($meta['title']))?$meta['title']:"";?></title>
	<meta property="og:title" content="<?php echo (!empty($meta['title']))?$meta['title']:"";?>"/>  
	<meta name="description" content="<?php echo (!empty($meta['description']))?$meta['description']:"";?>">
	<meta property="og:description" content="<?php echo (!empty($meta['description']))?$meta['description']:"";?>"/>


	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="devopasana.com">
	<?php if(!empty($meta['og_img'])): ?>  
	<meta property="og:image" content="<?php echo $meta['og_img'];?>" />
	<meta property="og:image:secure_url" content="<?php echo $meta['og_img'];?>" />
	<link rel="image_src" href="<?php echo $meta['og_img'];?>" />
	<?php else: ?> 		
	<meta property="og:image" content="<?php echo base_url().'assets/frontend/img/logo.jpg';?>"/> 
	<?php endif; ?>


	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url("assets/frontend/favicon.ico"); ?>" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url("assets/frontend/favicon.ico"); ?>" type="image/x-icon">

	<!-- partial:partial/__stylesheets.html -->
	<link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/plugins/bootstrap.min.css").VERSION; ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/plugins/animate.min.css").VERSION; ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/plugins/magnific-popup.css").VERSION; ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/plugins/slick.css").VERSION; ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/plugins/slick-theme.css").VERSION; ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/plugins/ion.rangeSlider.min.css").VERSION; ?>">

	<!-- Icon Fonts -->
	<link rel="stylesheet" href="<?php echo base_url("assets/frontend/fonts/flaticon/flaticon.css").VERSION; ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/plugins/font-awesome.min.css").VERSION; ?>">
	<!-- Template Style sheet -->
	<link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/style.css").VERSION; ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/frontend/css/responsive.css").VERSION; ?>">
	<!-- partial -->

</head>
<body>