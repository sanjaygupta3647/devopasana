<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/frontend/img/banner/varanasi.jpg);padding:180px 0 210px">

<div class="container">
  <div class="sigma_subheader-inner"> 
	<div class="sigma_subheader-text">
	  <h1><?php echo $postdetails->title ?></h1>
	</div>
	 
  </div>
</div>

</div>  

<div class="section pt-40">
	<div class="container">  
     <?php echo $postdetails->body; ?>
	</div>
</div>
 
<?php $this->load->view('frontend/common/testimonials'); ?>
 
<?php $this->load->view('frontend/common/faq'); ?>