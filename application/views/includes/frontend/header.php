<!-- Preloader Start -->
  <div class="sigma_preloader">
    <img src="<?php echo base_url("assets/frontend/img/om.svg");?>" alt="preloader">
  </div>
  <!-- Preloader End -->
  
  <!-- Search Start -->
  <div class="sigma_search-form-wrapper">
    <div class="sigma_search-trigger close-btn">
      <span></span>
      <span></span>
    </div>
    <form class="sigma_search-form" method="post">
      <input type="text" placeholder="Search..." value="">
      <button type="submit" class="sigma_search-btn">
        <i class="fal fa-search"></i>
      </button>
    </form>
  </div>
  <!-- Search End -->

  <!-- partial:partia/__mobile-nav.html -->
  <aside class="sigma_aside sigma_aside-left">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"> <img src="<?php echo base_url("assets/frontend/img/logo.jpg");?>" alt="logo"> </a>

    <!-- Menu MOBILE -->
    <ul>
      <li class="menu-item">
        <a href="<?php echo base_url(); ?>">Home</a>
      </li>
      <li class="menu-item">
        <a href="<?php echo base_url("about-us"); ?>">About Us</a>
      </li>
      <li class="menu-item">
        <a href="<?php echo base_url("contact-us"); ?>">Contact Us</a>
      </li>
    </ul>
  </aside>
  <div class="sigma_aside-overlay aside-trigger-left"></div>
  <!-- partial -->

  <!-- partial:partia/__header.html -->
  <header class="sigma_header header-2 can-sticky">

    <!-- Middle Header Start -->
    <div class="sigma_header-middle">
      <nav class="navbar">
        <div class="sigma_header-controls style-2">
          <ul class="sigma_header-controls-inner">
            <li class="aside-toggler style-2 aside-trigger-left">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </li>
          </ul>
        </div>
        <!-- Menu -->
        <div class="sigma_logo-wrapper">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url("assets/frontend/img/logo.jpg");?>" alt="logo">
          </a>
        </div>
        <ul class="navbar-nav">
          <li class="menu-item">
            <a href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo base_url("about-us"); ?>">About Us</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo base_url("contact-us"); ?>">Contact Us</a>
          </li>
        </ul>



        <!-- Button & Phone -->
        <div class="sigma_header-controls sigma_header-button">

          <a href="tel:+123456789" class="sigma_header-contact">
            <i class="fal fa-phone"></i>
            <div class="sigma_header-contact-inner">
              <span>Get Support</span>
              <h6><?php echo PHONE; ?></h6>
            </div>
          </a>
          <a class="sigma_btn-custom" href="#"> Login </a>
        </div>
		
		<div class="sigma_header-controls style-1">

          <a href="#" class="sigma_search-trigger"> <i class="flaticon-magnifying-glass"></i> </a>

        </div>

      </nav>
    </div>
    <!-- Middle Header End -->

  </header>
  <!-- partial -->