 <!-- Banner Start -->
  <div class="sigma_banner banner-3">

    <div class="sigma_banner-slider">

      <!-- Banner Item Start -->
      <div class="light-bg sigma_banner-slider-inner bg-cover bg-center bg-norepeat"
        style="background-image: url('assets/frontend/img/banner/devopasan-online-pooja.jpg');">
        <div class="sigma_banner-text">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <h4 class="title">Connect with the Divine: Online Pujas for Inner Harmony and Balanced Living</h4>
                <p class="blockquote mb-0 bg-transparent">Experience the sacred rituals and connect with the divine through our online pujas. Embrace the path of inner harmony, balance, and spiritual growth from the comfort of your home. Join our vibrant community of devotees.
                </p>
                <div class="section-button d-flex align-items-center">
                  <a href="javascript:void(0);" class="sigma_btn-custom">Join Today <i class="far fa-arrow-right"></i> </a>
                  <a href="javascript:void(0);" class="ms-3 sigma_btn-custom white">View Services <i
                      class="far fa-arrow-right"></i> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Banner Item End -->

      <!-- Banner Item Start -->
      <div class="light-bg sigma_banner-slider-inner bg-cover bg-center bg-norepeat"
        style="background-image: url('assets/frontend/img/banner/banner-2.jpg');">
        <div class="sigma_banner-text">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <h4 class="title">Online Puja for Dosh Nivaran: Seek Divine Intervention and Blessings Delivered to Your Doorstep</h4>
                <p class="blockquote mb-0 bg-transparent">Are you troubled by doshas or negative energies? Experience the power of dosh nivaran pujas performed by expert pandits from Varanasi to mitigate doshas and bring positive energy into your life. Embrace spiritual healing and transform your life today.
                </p>
                <div class="section-button d-flex align-items-center">
                  <a href="javascript:void(0);" class="sigma_btn-custom">Join Today <i class="far fa-arrow-right"></i> </a>
                  <a href="javascript:void(0);" class="ms-3 sigma_btn-custom white">View Services <i
                      class="far fa-arrow-right"></i> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Banner Item End -->
	  
	  <!-- Banner Item Start -->
      <div class="light-bg sigma_banner-slider-inner bg-cover bg-center bg-norepeat"
        style="background-image: url('assets/frontend/img/banner/banner-3.jpg');">
        <div class="sigma_banner-text">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <h4 class="title">Prasadam and Blessings Delivered to Your Doorstep</h4>
                <p class="blockquote mb-0 bg-transparent">Experience the joy of receiving prasadam and blessings from your chosen deity from our network of temples. Devopasana ensures a seamless and convenient way to connect with divine grace. No more worries, just pure spiritual bliss.
                </p>
                <div class="section-button d-flex align-items-center">
                  <a href="javascript:void(0);" class="sigma_btn-custom">Join Today <i class="far fa-arrow-right"></i> </a>
                  <a href="javascript:void(0);" class="ms-3 sigma_btn-custom white">View Services <i
                      class="far fa-arrow-right"></i> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Banner Item End -->

    </div>

  </div>
  <!-- Banner End -->

  <!-- About Start -->
  <section class="section" >
    <div class="container">

      <div class="row align-items-center">
        <div class="col-lg-6 mb-lg-30">
          <div class="img-group">
            <div class="img-group-inner">
              <img src="assets/frontend/img/about-group1/1.jpg" alt="about">
              <span></span>
              <span></span>
            </div>
            <img src="assets/frontend/img/about-group1/2.jpg" alt="about">
            <img src="assets/frontend/img/about-group1/3.jpg" alt="about">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="me-lg-30">
            <div class="section-title mb-0 text-start">
              <p class="subtitle">Digital pooja Sewa</p>
              <h4 class="title">We are at devopasana believe in Seva and offer</h4>
            </div>
            <ul class="sigma_list list-2 mb-0">
              <li>Peace of Mind</li>
              <li>Set For Pastor</li>
              <li>100% Satisfaction</li>
              <li>Trusted Company</li>
            </ul>
            <p class="blockquote bg-transparent"> We are a Hindu that belives in Lord Rama and Vishnu Deva the followers
              and We are a Hindu that belives in Lord Rama and Vishnu Deva. </p>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- About End -->
   

  <!-- Donation Start -->
  <div class="section section-padding pt-0" id="campaign">
    <div class="container">
      <div class="section-title text-center">
        <p class="subtitle">Running Campigns</p>
        <h4>Books seva and get our best services in world!</h4>
      </div>
	  <?php if(!empty($campaigns) && count($campaigns)>0): ?>
      <div class="row">
	    <?php foreach($campaigns as $key=>$val): ?>
        <div class="col-lg-3 col-md-6">
          <div class="sigma_service style-2">
            <div class="sigma_service-thumb">
              <img class="responsive" src="<?php echo getThumb(base_url('uploads/campaign/' . $val->image),"campaign",370);?>" width="370" height="209" alt="img">
            </div>
            <div class="sigma_service-body p-10">
               
                <a href="<?php echo base_url("campaign/").$val->slug; ?>"><b><?php echo $val->title; ?></b></a>
              
              <p class="camp_home_short_text"><?php echo $val->short_description; ?></p>
              <a href="<?php echo base_url("campaign/").$val->slug; ?>" class="sigma_btn-custom">
                Book This Pooja
              </a>
            </div>
          </div>
        </div> 
		<?php endforeach; ?>
		
		 
      </div>
	  <div class="row hide">
        <div class="col-lg-12 col-md-6 text-center">
		<button class="sigma_btn-custom primary">Load More Poojas..</button>
		</div>
	  </div>
	  <?php endif; ?>

    </div>
  </div>
  <!-- Donation End -->

<?php $this->load->view('frontend/common/testimonials'); ?>
<?php $this->load->view('frontend/common/subscribe'); ?>
<?php $this->load->view('frontend/common/faq'); ?>