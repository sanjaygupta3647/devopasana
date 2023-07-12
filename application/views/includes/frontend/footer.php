<!-- Back To Top Start -->
  <div class="sigma_top style-5">
    <i class="far fa-angle-double-up"></i>
  </div>
  <!-- Back To Top End -->



  <!-- partial:partia/__footer.html -->
  <footer class="sigma_footer footer-2">
	
    <!-- Middle Footer -->
    <div class="sigma_footer-middle">
	  <div class="box-shadow-img"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-widget">
             <ul>
              <li>
                <i class="fas fa-om"></i>
                <a href="<?php echo base_url("about-us"); ?>">About Us</a>
              </li> 
            </ul>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-widget" style="text-align:center;">
             
            <ul>
              
              <li>
                <i class="fas fa-om"></i>
                <a href="<?php echo base_url("terms-of-services"); ?>">Terms of Services</a>
              </li> 
            </ul>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 footer-widget" style="text-align:right;">
            
            <ul>
              <li>
                <i class="fas fa-om"></i>
                <a href="<?php echo base_url("privacy-policy"); ?>">Privacy Policy</a>
              </li> 
            </ul>
          </div>
           
        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="sigma_footer-bottom">
      <div class="container-fluid">
        <div class="sigma_footer-copyright">
          <p> Copyright © devopasana.com - <?php echo date("Y"); ?></p>
        </div>
        <div class="sigma_footer-logo">
          <img src="assets/frontend/img/logo.jpg" alt="logo">
        </div>
        <ul class="sigma_sm square">
          <li>
            <a href="https://www.facebook.com/Devopasana-Digital-Services-115404771574082/">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="https://www.linkedin.com/posts/devopasana-digital-services">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/devopasana/">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
          <li>
            <a href="https://youtube.com/@Devopasana">
              <i class="fab fa-youtube"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </footer>
  <!-- partial -->
  <!-- partial:partia/__scripts.html -->
  <script src="<?php echo base_url("assets/frontend/js/plugins/jquery-3.4.1.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/popper.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/bootstrap.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/imagesloaded.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/jquery.magnific-popup.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/jquery.countdown.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/jquery.waypoints.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/jquery.counterup.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/jquery.zoom.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/jquery.inview.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/jquery.event.move.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/wow.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/isotope.pkgd.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/slick.min.js").VERSION;?>"></script>
  <script src="<?php echo base_url("assets/frontend/js/plugins/ion.rangeSlider.min.js").VERSION;?>"></script>

  <script src="<?php echo base_url("assets/frontend/js/main.js").VERSION;?>"></script>
  <?php
	if (isset($pageJs) && !empty($pageJs) && is_array($pageJs)) {
		foreach ($pageJs as $j => $j_val) { // $j_val -- true for external url
			if ($j != "") {
				if ($j_val == "false") {
					echo '<script src="' . media_url($j).VERSION . '"></script>' . "\n";
				} else {
					echo '<script src="' . $j . '"></script>' . "\n";
				}
			}
		}
	}
	?>
  <!-- partial -->

</body>

</html>