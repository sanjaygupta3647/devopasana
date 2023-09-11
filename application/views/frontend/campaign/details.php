<!-- Banner Start -->
  <div class="sigma_subheader dark-overlay dark-overlay-2 sigma_banner_custom" style="background-image: url(<?php echo base_url('uploads/campaign/' . $campaign->image);  ?>);">

    <div class="container">
      <div class="sigma_subheader-inner">
        <div class="sigma_subheader-text">
          <h1><?php echo $campaign->title;  ?></h1>
        </div>
         
      </div>
    </div>

  </div>
  <!-- Banner End -->
  
   <!-- Additional Information Start -->
  <div class="section pt-0 pb-0">
    <div class="container">
      <div class="sigma_product-additional-info">

        <ul class="nav" id="bordered-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="tab-product-desc-tab" data-bs-toggle="pill" href="#tab-product-desc" role="tab" aria-controls="tab-product-desc" aria-selected="true">All Pooja</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="tab-product-info-tab" data-bs-toggle="pill" href="#tab-product-info" role="tab" aria-controls="tab-product-info" aria-selected="false">Description</a>
          </li> 
        </ul>

        <div class="tab-content" id="bordered-tabContent">
          <div class="tab-pane fade show active" id="tab-product-desc" role="tabpanel" aria-labelledby="tab-product-desc-tab">
            <div class="row">
			
			<?php if(!empty($pooja) && count($pooja)>0): ?>
			<?php foreach($pooja as $key=>$val): ?>
			
			<div class="col-lg-4 col-md-6">
			  <div class="sigma_service style-2">
				<div class="sigma_service-thumb">
				  <img src="<?php echo getThumb(base_url('uploads/pooja/'.$val["id"]. '/' . $val['image']),"pooja",370,222) ?>" width="370" height="222" alt="img">
				</div>
				<div class="sigma_service-body sigma_donation-form">
				<?php $form_id = "addpuja-$key"; ?>
				<form id="<?php echo $form_id; ?>">
				  <h6 class="text-black">
					<?php echo $val['title']; ?><br/> 
				  </h6>
				  <input type="hidden" name="pooja_id" value="<?php echo $val['id']; ?>">
				  <input type="hidden" name="service_charge" value="<?php echo $val['service_charge']; ?>">
				  <input type="hidden" name="prasad_charge" value="<?php echo $val['prasad_charge']; ?>">
				  <input type="hidden" name="campaign_id" value="<?php echo $campaign->id; ?>">
				  <?php if(count($val['pooja_price'])): ?>
				  <div class="form-group  w-100 <?php echo (count($val['pooja_price'])==1) ? 'hide':'' ?>"> 
				   <select class="form-control pooja_price" data-pooja_id="<?php echo $val["id"]; ?>" name="price_id" >
				  <?php foreach($val['pooja_price'] as $k=>$p): ?> 
					<option  value="<?php echo $p->id; ?>"><?php echo $p->lable; ?></option> 
				  <?php endforeach; ?>
				  </select>
				  </div>
				  <?php foreach($val['pooja_price'] as $k=>$p): ?> 
				  
				  <ul class="sigma_select-amount mt-0  <?php echo "all_price_list_".$val["id"]; ?>" <?php echo ($k==0) ? "":'style="display: none;"' ?> id="<?php echo $val["id"]; ?>_price_<?php echo $p->id; ?>">
				    <?php if($p->discount_price > 0 && $p->discount_price < $p->price): ?>
					<li><strike><?php echo showprice($p->price); ?></strike></li> 
					<li class="active"><?php echo showprice($p->discount_price); ?></li>
					<?php else: ?>
					<li class="active"><?php echo showprice($p->price); ?></li> 
					<?php endif; ?>
					
				  </ul> 
				   
				  <?php endforeach; ?>
				  <?php endif; ?>
				  <div class="pt-10">
					  <div class="text-black"><?php echo $val['description']; ?></div>
					  <?php $session = getCustomerSessionData();  ?>
					   
					  <input type="button" class="sigma_btn-custom add_to_cart d-block w-100" data-form_id="<?php echo $form_id; ?>" data-customer="<?php echo $session['id'];?>" value="Book This Pooja"> 
					  
					  
				  </div>
				  </form>
				</div>
			  </div>
			</div>
			
			<?php endforeach; ?>
			<?php endif; ?>
			 
			
			 
		</div>
          </div>
          <div class="tab-pane fade text-black" id="tab-product-info" role="tabpanel" aria-labelledby="tab-product-info-tab">
                <?php echo $campaign->description; ?>
          </div>
           
        </div>

      </div>
    </div>
  </div>
  <!-- Additional Information End -->  

<?php $this->load->view('frontend/common/testimonials'); ?>
<?php $this->load->view('frontend/common/subscribe'); ?>
<?php $this->load->view('frontend/common/faq'); ?>