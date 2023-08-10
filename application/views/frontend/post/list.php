<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/frontend/img/banner/varanasi.jpg);padding:180px 0 210px">

<div class="container">
  <div class="sigma_subheader-inner"> 
	<div class="sigma_subheader-text">
	  <h1><?php echo $categories->title ?></h1>
	</div>
	 
  </div>
</div>

</div> 
  
  
 
   

<section class="section pt-10" >
<div class="container">

  <div class="row align-items-center"> 
	<div class="col-lg-12">
	  <div class="me-lg-30">
		<div class="section-title mb-0 text-center"> 
		  <p class="text-black text-25"><?php echo $categories->short_description; ?></p><br/><br/>
		</div> 
	  </div>
	</div>
	<?php foreach($allpost as $post): ?>
	<div class="col-lg-12"> 
		<div class="sigma_icon-block icon-block-3">
		  <?php  $link = base_url("divine-corner/".$categories->slug."/".$post->slug); ?>
		  <div class="icon-wrapper">
			<a class="link" href="<?php echo $link; ?>"><img src="<?php echo base_url('uploads/divine_post/' . $post->img) ?>" alt="<?php echo $post->title; ?>" title="<?php echo $post->title; ?>"></a>
		  </div>
		  <div class="sigma_icon-block-content">
			<h5 class="text-black"> <a class="link" href="<?php echo $link; ?>"><?php echo $post->title; ?></a> </h5>
			<p class="text-black"><?php echo $post->short_description; ?></p>
			<a class="link" href="<?php echo $link; ?>">Read more about this post..</a>
		  </div>
		</div>
	   
	</div>
	<?php endforeach; ?>
	
	 
  </div>

</div>
</section>
 
<?php $this->load->view('frontend/common/testimonials'); ?>
 
<?php $this->load->view('frontend/common/faq'); ?>