   <!-- partial:partia/__subheader.html -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/frontend/img/banner/varanasi.jpg);">

    <div class="container">
      <div class="sigma_subheader-inner"> 
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn-link" href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
          </ol>
        </nav>
      </div>
    </div>

  </div>
  <!-- partial -->
  
  <!--Cart Start -->
  <div class="section">
    <div class="container">
     <div class="row"> 
	    <?php if(!empty($cart)): ?>
        <div class="col-md-7">  
		<table class="sigma_responsive-table" id="ordersummary">
		<thead>
		  <tr> 
			<th colspan="2" class="text-black">Order summary</th>
			<th class="text-black">Amount</th> 
			<th class="text-black">Total</th>
		  </tr>
		  
		</thead>
		<tbody>
		  
		  <tr> 
			<td colspan="3" data-title="Product">
			  <div class="sigma_cart-product-wrapper">
			     
				<img src="<?php echo getThumb(base_url('uploads/pooja/'.$cart->pooja_id. '/' . $cart->image),"pooja",100) ?>" alt="<?php echo $cart->title; ?>">
				<div class="sigma_cart-product-body text-black">
				 <?php echo $cart->title; ?> 
				   
				</div>
			  </div>
			</td>
			 
			<td data-title="Total" class="text-black"><?php echo showprice($cart->puja_price); ?> </td>
		  </tr>
		  
		  <tr class="total text-black">
			<td colspan="3">
				 Service charge 
			</td> 
			<td> <?php echo showprice($cart->service_charge); ?> </td>
		</tr>
		
		<tr class="total text-black">
			<td colspan="3">
				 Prasad charge 
			</td> 
			<td> <?php echo showprice($cart->prasad_charge); ?> </td>
		</tr>
		<?php $total = $cart->puja_price + $cart->service_charge + $cart->prasad_charge; ?>
		<?php if(count($add_addons)):  ?>  
		  <tr> 
			<td colspan="4" data-title="Product">
			  <div class="sigma_cart-product-wrapper"> 
				<div class="sigma_cart-product-body">
				  <h6 class="text-black"> Additional Add Ons added with this pooja </h6> 
				</div>
			  </div>
			</td>
			 
		  </tr>
		 <?php foreach($add_addons as $ads): ?>
		  <tr>
			<td class="remove">
			  <button type="button" class="close-btn close-danger remove-from-cart" data-addon_id="<?php echo $ads->addon_id; ?>" data-cart_id="<?php echo $cart->id; ?>">
				<span></span>
				<span></span>
			  </button>
			</td>
			<td  colspan="2"data-title="Add on">
			  <div class="sigma_cart-product-wrapper">
				<img src="<?php echo base_url('uploads/addon/'.$ads->addon_id. '/' . $ads->image) ?>" alt="<?php echo $ads->title ?>">
				<div class="sigma_cart-product-body  text-black">
				   <?php echo $ads->title ?>
				</div>
			  </div>
			</td> 
			<td data-title="Total">  <p class="text-black"><?php echo showprice($ads->addon_price) ?></p>  </td>
			<?php $total = $total + $ads->addon_price; ?>
		  </tr>		 
		  <?php endforeach; ?>
		  <?php endif; ?>
		  
		  <tr class="text-black"> 
			<td  colspan="3"data-title="Add on">Grand Total: </td> 
			<td data-title="Total">  <b class="text-black"><?php echo showprice($total) ?></b>  </td>
			 
		  </tr>  
		</tbody>
		</table>
		</div>
		
		
		<div class="col-md-5">  
		<table class="sigma_responsive-table">
		
		<tbody> 
		  <tr> 
			<th colspan="3" data-title="Product" class="text-black"> 
				   Add Ons with this pooja  
			</td> 
		  </tr>
		  <?php if(count($addons)):  ?>
		  <tr> 
			<th colspan="2" class="text-black">Item</th>
			<th class="text-black">Amount</th>  
		  </tr>
		  <?php foreach($addons as $ads): ?>
		  <tr>
			<td class="remove">
			  <button type="button" class="addon_with_pooja" data-cart_id="<?php echo $cart->id ?>" data-addon_id="<?php echo $ads->id ?>" data-addon_price="<?php echo $ads->price ?>">+</button>
			</td>
			<td data-title="Add on">
			  <div class="sigma_cart-product-wrapper">
				<img src="<?php echo base_url('uploads/addon/'.$ads->id. '/' . $ads->image) ?>" alt="<?php echo $ads->title ?>">
				<div class="sigma_cart-product-body  text-black">
				   <?php echo $ads->title ?>
				</div>
			  </div>
			</td>
			<td data-title="Price">  <b class="text-black"><?php echo showprice($ads->price) ?></b> </td> 
		  </tr>		 
		  <?php endforeach; ?>
		   
		  <?php else: ?>
		   <tr> 
			<td colspan="3" data-title="Product"> 
				  <p class="text-black"> Sorry, no Add Ons available with this pooja </p>  
			</td> 
		  </tr>
		  <?php endif; ?> 

		</tbody>
		</table>
		</div>
		
		<?php else: ?>
		<div class="col-md-12"> 
		<h6 class="text-black text-center">Sorry, you have not added any puja.</h6>
		<center>
			<div class="btn-group" style="margin-top:50px;">
				<a href="<?php echo base_url(); ?>#campaign" class="btn btn-lg btn-warning">Go to running campaigns</a>
			</div>
		</center> 
		</div>
		<?php endif; ?>
		
		
		</div>
      <!-- Cart Table End -->
 
 <!-- Checkout Start -->
  <div class="section pt-0 checkout-form <?php echo (empty($cart)) ? 'hide':'' ?>">
    <div class="container"> 
      <form method="post" id="final_submission">
        <div class="row">
		  <input type="hidden" name="total_price" value="<?php echo $total; ?>"> 
		  <input type="hidden" name="cart_id" value="<?php echo $cart->id; ?>"> 
		  <input type="hidden" name="transaction_id" value="<?php echo $cart->transaction_id; ?>">
          <div class="col-xl-12">   
            <h5 class="text-black" id="selectmember">Billing Details</h5>
            <div class="row">  
			  <div class="form-group col-xl-12">
			    <label class="text-black" >Select members<span class="text-danger">*</span> Or <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-width="800" data-bs-target="#relationModel" id="open_member_form">Add New Members/Devotee</a></label>
                
				<?php foreach($devotees as $key=>$devot): ?>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" value="<?php echo $devot->id;?>" name="relation[]" class="custom-control-input relation" id="<?php echo $key+1; ?>">
					<label class="custom-control-label text-black" for="<?php echo $key+1; ?>"><?php echo $devot->relation;?>-<?php echo $devot->name;?>   -    <a href="javascript:void(0)" class="edit_relation" 
					data-id="<?php echo $devot->id;?>" 
					data-name="<?php echo $devot->name;?>" 
					data-relation="<?php echo $devot->relation;?>"
					data-gotra="<?php echo $devot->gotra;?>"
					data-nakshatra="<?php echo $devot->nakshatra;?>"
					data-rashi="<?php echo $devot->rashi;?>"
					data-dob="<?php echo $devot->dob;?>"
					data-tob="<?php echo $devot->tob;?>"
					data-pob="<?php echo $devot->pob;?>"
					data-additional_info="<?php echo $devot->additional_info;?>"
					
					>Edit</a></label> 
                </div>
				<?php endforeach; ?>
				 
			  </div> 
			   
              <div class="form-group col-xl-6">
                <label>Name<span class="text-danger">*</span></label>
                <input type="text" placeholder="Name" name="name" class="form-control" value="<?php echo $customer->name; ?>">
              </div>
			  <div class="form-group col-xl-6">
                <label>Phone Number <span class="text-danger">*</span></label>
                <input type="text" placeholder="Phone Number" name="phone" class="form-control" value="<?php echo $customer->phone; ?>" required="">
              </div>
              <div class="form-group col-xl-6">
                <label>Email Address <span class="text-danger">*</span></label>
                <input type="email" placeholder="Email Address" name="email" class="form-control" value="<?php echo $customer->email; ?>" required="">
              </div>
			  <div class="form-group col-xl-6">
                <label>Street Address 1 <span class="text-danger">*</span></label>
                <input type="text" placeholder="Street Address One" name="address1" class="form-control" value="<?php echo $customer->address1; ?>" required="">
              </div>
              <div class="form-group col-xl-6">
                <label>Street Address 2</label>
                <input type="text" placeholder="Street Address Two (Optional)" name="address2" class="form-control" value="<?php echo $customer->address2; ?>">
              </div>
              <div class="form-group col-xl-6">
                <label>Town / City <span class="text-danger">*</span></label>
                <input type="text" placeholder="Town/City" name="town" class="form-control" value="<?php echo $customer->town; ?>" required="">
              </div>
			  <div class="form-group col-xl-6">
                <label>State <span class="text-danger">*</span></label>
                <input type="text" placeholder="State" name="state" class="form-control" value="<?php echo $customer->state; ?>" required="">
              </div>
			   
              <div class="form-group col-xl-12 mb-0">
                <label>Order Notes</label>
                <textarea name="additional_info" rows="3" class="form-control" placeholder="Order Notes (Optional)"></textarea>
              </div>
			  
			  <div class="form-group col-xl-12 pt-4"> 
			    
				<input type="submit" class="form-control sigma_btn-custom" value="Proceed to pay Rs. <?php echo $total; ?>">
              </div>
              
              
            </div>
            <!-- Buyer Info End -->

          </div>
          
		   
        </div>
      </form>

    </div>
  </div>
  <!-- Checkout End -->
  </div>
  </div>
  <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="relationModel" tabindex="-1" aria-labelledby="relationModelLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title text-black" id="relationModelLabel">Add Members/Devotee</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
		<div class="modal-body">

		<form method="post" id="relation-form">
		<input type="hidden" name="relation_id" value="">
		<div class="row">
		  <div class="form-group col-xl-12">
			<label>Name: <span class="text-danger">*</span></label>
			<input type="text" placeholder="Name" name="name" class="form-control" value="" required="required">
		  </div>			
		  <div class="form-group col-xl-6">
			<label>Relation<span class="text-danger">*</span></label>
			<select name="relation" class="form-control" required="required">
			   <option value="" >Select relation</option><option value="self">self</option><option value="mother">mother</option><option value="spouse">spouse</option><option value="father">father</option><option value="son">son</option><option value="daughter">daughter</option><option value="sibling">sibling</option><option value="brother">brother</option><option value="sister">sister</option><option value="friend">friend</option><option value="cousin">cousin</option><option value="other">other</option> 
			</select>
		  </div>
		  
		  <div class="form-group col-xl-6">
			<label>Date of birth: </label>
			<input type="date" placeholder="Date of birth" name="dob" class="form-control" value="" >
		  </div>
		  
		  <div class="form-group col-xl-6">
			<label>Time Of Birth: </label>
			<input type="text" placeholder="HH:MM(like 13:20)" name="tob" class="form-control" value="" >
		  </div>
		  
		  <div class="form-group col-xl-6">
			<label>Place Of Birth: </label>
			<input type="text" placeholder="Place Of Birth" name="pob" class="form-control" value="" >
		  </div>
		  
		  <div class="form-group col-xl-6">
			<label>Gotra: </label>
			<input type="text" placeholder="Gotra" name="gotra" class="form-control" value="" >
		  </div>
		  <div class="form-group col-xl-6">
			<label>Nakshatra </label>
			<input type="text" placeholder="Nakshatra" name="nakshatra" class="form-control" value="" >
		  </div>
		  <div class="form-group col-xl-6">
			<label>Rashi</label>
			<input type="text" placeholder="Rashi" name="rashi" class="form-control" value="" >
		  </div>
		  <div class="form-group col-xl-6">
			<label>Additional Info</label>
			<input type="text" placeholder="Additional Info" name="additional_info" class="form-control" value="">
		  </div>
		  <div class="form-group col-xl-12"> 
			<input type="submit" class="sigma_btn-custom" value="Add Members/Devotee">
		  </div>
		</div> 

		</div> 
    </div>
  </div>
</div>

 
 