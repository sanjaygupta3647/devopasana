<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/frontend/img/banner/varanasi.jpg);">

<div class="container">
  <div class="sigma_subheader-inner"> 
	<div class="sigma_subheader-text">
	  <h1><?php echo $postdetails->title ?></h1>
	</div>
	 
  </div>
</div>

</div>  

<div class="section pcustom-section post-details with-extra-padd">
	<div class="container">  
     <?php echo $postdetails->body; ?>
	</div>
</div>
 
<?php $this->load->view('frontend/common/testimonials'); ?>
 
<?php $this->load->view('frontend/common/faq'); ?>