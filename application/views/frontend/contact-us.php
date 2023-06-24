<!-- partial:partia/__subheader.html -->
<div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/frontend/img/banner/varanasi.jpg);padding:180px 0 210px">

<div class="container">
  <div class="sigma_subheader-inner"> 
	<div class="sigma_subheader-text">
	  <h1>Contact us</h1>
	</div>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb"> 
		<li class="breadcrumb-item active" aria-current="page">Contact us</li>
	  </ol>
	</nav>
  </div>
</div>

</div>
<!-- partial -->


<div class="sigma_map">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9914406081493!2d2.292292615201654!3d48.85837360866272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sEiffel%20Tower!5e0!3m2!1sen!2sin!4v1571115084828!5m2!1sen!2sin"
      allowfullscreen=""></iframe>
  </div>
  <!-- Map End -->

  <!-- Contact form Start -->
  <div class="section mt-negative pt-0">
    <div class="container">

      <form class="sigma_box box-lg m-0 mf_form_validate ajax_submit" action="sendmail.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <i class="far fa-user"></i>
              <input type="text" placeholder="Full Name" class="form-control dark" name="name">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <i class="far fa-envelope"></i>
              <input type="email" placeholder="Email Address" class="form-control dark" name="email">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
              <i class="far fa-pencil"></i>
              <input type="text" placeholder="Subject" class="form-control dark" name="Subesubject">
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" placeholder="Enter Message" cols="45" rows="5" class="form-control dark"></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="sigma_btn-custom" name="button">Submit Now</button>
          <div class="server_response w-100">
          </div>
        </div>
      </form>

    </div>
  </div>
  <!-- Contact form End -->

  <!-- Icons Start -->
  <div class="section section-padding pt-0">
    <div class="container">
      <div class="row">

        <div class="col-lg-4">
          <div class="sigma_icon-block text-center light icon-block-7">
            <i class="flaticon-email"></i>
            <div class="sigma_icon-block-content">
              <span>Send Email <i class="far fa-arrow-right"></i> </span>
              <h5> Email Address</h5>
              <p>info@example.com</p>
              <p>info@support.com</p>
            </div>
            <div class="icon-wrapper">
              <i class="flaticon-email"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="sigma_icon-block text-center light icon-block-7">
            <i class="flaticon-call"></i>
            <div class="sigma_icon-block-content">
              <span>Call Us Now <i class="far fa-arrow-right"></i> </span>
              <h5> Phone Number </h5>
              <p> +123 478 390 </p>
              <p> +489 472 928 </p>
            </div>
            <div class="icon-wrapper">
              <i class="flaticon-call"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="sigma_icon-block text-center light icon-block-7">
            <i class="flaticon-location"></i>
            <div class="sigma_icon-block-content">
              <span>Find Us Here <i class="far fa-arrow-right"></i> </span>
              <h5> Location </h5>
              <p>16/A Daddy Yankee Tower</p>
              <p>New York, US</p>
            </div>
            <div class="icon-wrapper">
              <i class="flaticon-location"></i>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Icons End -->

<?php $this->load->view('frontend/common/testimonials'); ?>
<?php $this->load->view('frontend/common/subscribe'); ?>
<?php $this->load->view('frontend/common/faq'); ?>