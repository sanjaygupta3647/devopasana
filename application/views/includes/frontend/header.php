<!-- Preloader Start -->
<?php $session = getCustomerSessionData();  ?>
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
  <?php $category  =  getDivineLink();  ?>
  <!-- partial:partia/__mobile-nav.html -->
  <aside class="sigma_aside sigma_aside-left">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"> <img src="<?php echo base_url("assets/frontend/img/logo.jpg");?>" alt="logo"> </a>

    <!-- Menu MOBILE -->
    <ul>
      <li class="menu-item">
        <a href="<?php echo base_url(); ?>">Home</a>
      </li>
      <li class="menu-item">
          <a href="<?php echo base_url(); ?>">Puja</a>
        </li>
      <li class="menu-item menu-item-has-children">
        <a href="<?php echo base_url(); ?>">Divine Corner</a>
      <ul class="sub-menu">
        <?php if(!empty($category)):  ?>
        <?php foreach($category as $cat): ?>
        <li class="menu-item"> <a href="<?php echo base_url("divine-corner/".$cat->slug); ?>"><?php echo $cat->title; ?></a> </li>
        <?php endforeach; ?>
        <?php endif; ?> 
      </ul>
      </li> 

      <?php if($session['id']): ?>
        <li class="menu-item"> <a href="<?php echo base_url('profile');?>">Profile</a> </li>
        <li class="menu-item"> <a href="<?php echo base_url('checkout');?>">Cart</a> </li>
			  <li class="menu-item"> <a href="<?php echo base_url('customer/logout');?>">Logout</a> </li>
      <?php else: ?>
        <li class="menu-item"> <a href="<?php echo base_url('login');?>">Login</a> </li>
      <?php endif; ?>
    
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
            <a href="<?php echo base_url(); ?>">Puja</a>
          </li>

          
		  
          <li class="menu-item menu-item-has-children">
            <a href="<?php echo base_url(); ?>">Divine Corner</a>
			<ul class="sub-menu">
			   <?php if(!empty($category)):  ?>
			   <?php foreach($category as $cat): ?>
			   <li class="menu-item"> <a href="<?php echo base_url("divine-corner/".$cat->slug); ?>"><?php echo $cat->title; ?></a> </li>
			   <?php endforeach; ?>
			   <?php endif; ?> 
            </ul>
          </li>
          <?php if($session['id']): ?>
		
    <li class="menu-item menu-item-has-children">
    <a href="<?php echo base_url("profile"); ?>"  aria-expanded="false">
      My Account
    </a>
    <ul class="sub-menu">
      <li class="menu-item"> <a href="<?php echo base_url('checkout');?>">Cart</a> </li>
      <li class="menu-item"> <a href="<?php echo base_url('customer/logout');?>">Logout</a> </li>
    </ul>
    </li>
     
  
  <?php endif; ?>
      
          
        </ul>
		
        <!-- <div class="sigma_header-controls sigma_header-button"> 
          <a href="https://wa.me/+918794793316" class="sigma_header-contact">
            <img src="<?php echo base_url("assets/frontend/img/whatsapp.jpg");?>" width="50" height="37"> 
          </a>
		 
		  
        </div> -->
		


		 
		<?php if(empty($session['id'])): ?> 
        <!-- Button & Phone -->
        <div class="sigma_header-controls sigma_header-button d-none-xss"> 
          <!-- <a href="https://wa.me/+918794793316" class="sigma_header-contact">
            <img src="<?php echo base_url("assets/frontend/img/whatsapp.jpg");?>" width="50" height="37"> 
          </a> -->
		 
		  <a class="sigma_btn-custom" href="<?php echo base_url('login');?>"> Login </a> 
        </div>
		<?php endif; ?>
		
		
		
		<div class="sigma_header-controls style-1">

          <a href="#" class="sigma_search-trigger"> <i class="flaticon-magnifying-glass"></i> </a>

        </div>

      </nav>
    </div>
    <!-- Middle Header End -->

  </header>

  <a href="https://wa.me/+918794793316" class="wp-logo-centered">
  <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzOSIgaGVpZ2h0PSIzOSIgdmlld0JveD0iMCAwIDM5IDM5Ij48cGF0aCBmaWxsPSIjMDBFNjc2IiBkPSJNMTAuNyAzMi44bC42LjNjMi41IDEuNSA1LjMgMi4yIDguMSAyLjIgOC44IDAgMTYtNy4yIDE2LTE2IDAtNC4yLTEuNy04LjMtNC43LTExLjNzLTctNC43LTExLjMtNC43Yy04LjggMC0xNiA3LjItMTUuOSAxNi4xIDAgMyAuOSA1LjkgMi40IDguNGwuNC42LTEuNiA1LjkgNi0xLjV6Ij48L3BhdGg+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTMyLjQgNi40QzI5IDIuOSAyNC4zIDEgMTkuNSAxIDkuMyAxIDEuMSA5LjMgMS4yIDE5LjRjMCAzLjIuOSA2LjMgMi40IDkuMUwxIDM4bDkuNy0yLjVjMi43IDEuNSA1LjcgMi4yIDguNyAyLjIgMTAuMSAwIDE4LjMtOC4zIDE4LjMtMTguNCAwLTQuOS0xLjktOS41LTUuMy0xMi45ek0xOS41IDM0LjZjLTIuNyAwLTUuNC0uNy03LjctMi4xbC0uNi0uMy01LjggMS41TDYuOSAyOGwtLjQtLjZjLTQuNC03LjEtMi4zLTE2LjUgNC45LTIwLjlzMTYuNS0yLjMgMjAuOSA0LjkgMi4zIDE2LjUtNC45IDIwLjljLTIuMyAxLjUtNS4xIDIuMy03LjkgMi4zem04LjgtMTEuMWwtMS4xLS41cy0xLjYtLjctMi42LTEuMmMtLjEgMC0uMi0uMS0uMy0uMS0uMyAwLS41LjEtLjcuMiAwIDAtLjEuMS0xLjUgMS43LS4xLjItLjMuMy0uNS4zaC0uMWMtLjEgMC0uMy0uMS0uNC0uMmwtLjUtLjJjLTEuMS0uNS0yLjEtMS4xLTIuOS0xLjktLjItLjItLjUtLjQtLjctLjYtLjctLjctMS40LTEuNS0xLjktMi40bC0uMS0uMmMtLjEtLjEtLjEtLjItLjItLjQgMC0uMiAwLS40LjEtLjUgMCAwIC40LS41LjctLjguMi0uMi4zLS41LjUtLjcuMi0uMy4zLS43LjItMS0uMS0uNS0xLjMtMy4yLTEuNi0zLjgtLjItLjMtLjQtLjQtLjctLjVoLTEuMWMtLjIgMC0uNC4xLS42LjFsLS4xLjFjLS4yLjEtLjQuMy0uNi40LS4yLjItLjMuNC0uNS42LS43LjktMS4xIDItMS4xIDMuMSAwIC44LjIgMS42LjUgMi4zbC4xLjNjLjkgMS45IDIuMSAzLjYgMy43IDUuMWwuNC40Yy4zLjMuNi41LjguOCAyLjEgMS44IDQuNSAzLjEgNy4yIDMuOC4zLjEuNy4xIDEgLjJoMWMuNSAwIDEuMS0uMiAxLjUtLjQuMy0uMi41LS4yLjctLjRsLjItLjJjLjItLjIuNC0uMy42LS41cy40LS40LjUtLjZjLjItLjQuMy0uOS40LTEuNHYtLjdzLS4xLS4xLS4zLS4yeiI+PC9wYXRoPjwvc3ZnPg==" />
  </a>
  <!-- partial -->