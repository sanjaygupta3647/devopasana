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
  
  
 
   

  <!-- Donation Start -->
  <div class="section section-padding pt-20" id="campaign">
    <div class="container">
      <div class="section-title text-center"> 
        <h2>Devotional Offerings</h2>
		<p class="text-black text-25">Participate in pujas in your and your family family's name. You will receive prasad at your doorstep along with divine grace.</p>
      </div>
	  <?php if(!empty($campaigns) && count($campaigns)>0): ?>
      <div class="row">
	    <?php foreach($campaigns as $key=>$val): ?>
        <div class="col-lg-4 col-md-6">
          <div class="sigma_service style-2">
            <div class="sigma_service-thumb">
              <img class="responsive" src="<?php echo getThumb(base_url('uploads/campaign/' . $val->image),"campaign",370);?>" width="370" height="209" alt="img">
            </div>
            <div class="sigma_service-body p-10">
               
                <a href="<?php echo base_url("campaign/").$val->slug; ?>"><h6 class="text-black"><?php echo $val->title; ?></h6></a>
              
              <p class="text-black"><?php echo $val->short_description; ?></p>
              <a href="<?php echo base_url("campaign/").$val->slug; ?>" class="sigma_btn-custom" style="width:395px;">
                Book Now
              </a>
            </div>
          </div>
        </div> 
		<?php endforeach; ?>
		
		 
      </div>
	  <div class="row hide">
        <div class="col-lg-12 col-md-6 text-center">
		<button class="sigma_btn-custom primary">Load More Pujas..</button>
		</div>
	  </div>
	  <?php endif; ?>

    </div>
  </div>
  <!-- Donation End -->
  <section class="section pt-0" >
    <div class="container">

      <div class="row align-items-center"> 
        <div class="col-lg-12">
          <div class="me-lg-30">
            <div class="section-title mb-0 text-center">
              <h2>Divine corner for all your devotional needs</h2>
              <p class="text-black text-25">Discover fascinating articles on upcoming festivals, fasts, arti, mantra and much more in Sanatana Dharma.</p>
            </div> 
          </div>
        </div>
		<?php foreach($categories as $cat): ?>
		<?php  $link = "divine-corner/".$cat->slug; ?>
		<div class="col-lg-6"> 
            <div class="sigma_icon-block icon-block-3">
              <div class="icon-wrapper">
                <a class="link" href="<?php echo base_url($link); ?>"><img src="<?php echo base_url('uploads/divine/' . $cat->img) ?>" alt="<?php echo $cat->title; ?>" title="<?php echo $cat->title; ?>"></a>
              </div>
              <div class="sigma_icon-block-content">
                <h5 class="text-black"> <a class="link" href="<?php echo base_url($link); ?>"><?php echo $cat->title; ?></a> </h5>
                <p class="text-black"><?php echo $cat->short_description; ?></p>
				<a class="link" href="<?php echo base_url($link); ?>">Read all</a>
              </div>
            </div>
           
        </div>
		<?php endforeach; ?>
		
		 
      </div>

    </div>
  </section>

<?php $this->load->view('frontend/common/testimonials'); ?>
<?php //$this->load->view('frontend/common/subscribe'); ?>
<?php $this->load->view('frontend/common/faq'); ?>