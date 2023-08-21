<!-- Testimonials Start -->
  <section class="section pt-0 pb-0">

    <div class="container testimonial-section bg-contain bg-norepeat bg-center"
      style="background-image: url(assets/frontend/img/textures/map-2.png)">

      <div class="section-title text-center"> 
        <h2>Read What Our Devotees Say</h2>
      </div>
	  
	  <?php
	  $review[0]['image'] = getThumb(base_url('assets/frontend/img/testimonials/arun_singh_jaipur.jpeg'),"testimonials",100,100);
	  $review[0]['review'] = "Devopasana's online puja is a blessing! The live streaming, dedicated priests, and prasad delivery created a meaningful experience. Highly satisfied and spiritually fulfilled!";
	  $review[0]['name'] = "Arun Singh";
	  $review[0]['place'] = "Jaipur";
	  
	  $review[1]['image'] = getThumb(base_url('assets/frontend/img/testimonials/ravi_singn_noida.jpeg'),"testimonials",100,100);
	  $review[1]['review'] = "Devopasana's online puja service was truly enlightening. The priests' devotion and the live streaming option made me feel connected. Received prasad and video added a personal touch. Highly recommend!";
	  $review[1]['name'] = "Ravi Singh";
	  $review[1]['place'] = "Noida";
	  
	  $review[2]['image'] = getThumb(base_url('assets/frontend/img/testimonials/ankur_singh_azamgarh.jpeg'),"testimonials",100,100);
	  $review[2]['review'] = "Kudos to Devopasana for their seamless puja service! The virtual participation, sincere priests, and prasad made it special. A perfect way to experience spirituality from home.";
	  $review[2]['name'] = "Ankur Singh";
	  $review[2]['place'] = "Azamgarh";
	  
	  
	  $review[3]['image'] = getThumb(base_url('assets/frontend/img/testimonials/ajit_singh_jaipur.jpeg'),"testimonials",100,100);
	  $review[3]['review'] = "Impressed with Devopasana's virtual puja service! The live rituals, sincere pandits, and prasad made it divine. A convenient and authentic way to connect with spirituality.";
	  $review[3]['name'] = "Ajit  Singh";
	  $review[3]['place'] = "Jaipur";
	  
	  $review[4]['image'] = getThumb(base_url('assets/frontend/img/testimonials/nouser.jpg'),"testimonials",100,100); 
	  $review[4]['review'] = "Devopasana's online puja is amazing! The virtual puja, devoted priests, and prasad brought divine energy home. Truly satisfied with this modern way to experience tradition";
	  $review[4]['name'] = "Sanjay Gupta";
	  $review[4]['place'] = "Varanasi, UP"; 
	  
	  ?>

      <div class="sigma_testimonial style-2">
        <div class="sigma_testimonial-slider">
          <?php foreach($review as $val): ?>
          <div class="sigma_testimonial-inner">
            <div class="sigma_testimonial-thumb">
              <img src="<?php echo $val['image'];?>" height="100" width="100"  alt="<?php echo $val['name'];?>">
            </div>
            <div>
              <div class="sigma_testimonial-body">
                <div class="sigma_rating-wrapper">
                  <div class="sigma_rating">
                    <i class="fas fa-star active"></i>
                    <i class="fas fa-star active"></i>
                    <i class="fas fa-star active"></i>
                    <i class="fas fa-star active"></i>
                    <i class="fas fa-star active"></i>
                    <i class="far fa-star hide"></i>
                  </div>
                </div>
                <p class="text-black text-18"><?php echo $val['review'];?></p>
              </div>
              <div class="sigma_testimonial-footer">
                <div class="sigma_testimonial-author">
                  <cite class="text-20"><?php echo $val['name'];?></cite>
                  <span class="text-18"><?php echo $val['place'];?></span>
                </div>
              </div>
            </div>
          </div>
		  
		  <?php endforeach; ?>

           

           

        </div>
      </div>

      <div class="text-center mt-4">
        <div class="sigma_arrows style-2">
          <i class="far fa-chevron-left slick-arrow slider-prev"></i>
          <i class="far fa-chevron-right slick-arrow slider-next"></i>
        </div>
      </div>

    </div>

  </section>
  <!-- Testimonials End -->