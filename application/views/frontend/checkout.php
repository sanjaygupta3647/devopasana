   <!-- partial:partia/__subheader.html -->
  <div class="sigma_subheader dark-overlay dark-overlay-2" style="background-image: url(assets/frontend/img/banner/varanasi.jpg);padding:180px 0 210px">

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
        <div class="col-md-8">  
		<table class="sigma_responsive-table">
		<thead>
		  <tr> 
			<th colspan="2">Order summary</th>
			<th>Amount</th> 
			<th>Total</th>
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
			 
			<td data-title="Total"><?php echo showprice($cart->puja_price); ?> </td>
		  </tr>
		  
		  <tr class="total">
			<td colspan="3">
				 Service charge 
			</td> 
			<td> <?php echo showprice($cart->service_charge); ?> </td>
		</tr>
		
		<tr class="total">
			<td colspan="3">
				 Prasad charge 
			</td> 
			<td> <?php echo showprice($cart->prasad_charge); ?> </td>
		</tr>
		  
		  <tr> 
			<td colspan="4" data-title="Product">
			  <div class="sigma_cart-product-wrapper"> 
				<div class="sigma_cart-product-body">
				  <h5> Add Ons with this pooja </h5> 
				</div>
			  </div>
			</td>
			 
		  </tr>
		 
		  <tr>
			<td class="remove">
			  <button type="button" class="close-btn close-danger remove-from-cart">
				<span></span>
				<span></span>
			  </button>
			</td>
			<td data-title="Add on">
			  <div class="sigma_cart-product-wrapper">
				<img src="assets/frontend/img/products/4.jpg" alt="prod1">
				<div class="sigma_cart-product-body">
				   Ganga Pushkar Jal 
				</div>
			  </div>
			</td>
			<td data-title="Price">  Rs. 151 </td>
			 
			<td data-title="Total">  Rs. 151  </td>
		  </tr>		 
		  
		  <tr>
			<td class="add">
			  <button type="button">
				+ 
			  </button>
			</td>
			<td data-title="Product">
			  <div class="sigma_cart-product-wrapper">
				<img src="assets/frontend/img/products/5.jpg" alt="prod1">
				<div class="sigma_cart-product-body">
				   Energized Silver bel patra (1 pc) 
				</div>
			  </div>
			</td>
			<td data-title="Price">  Rs. 400 </td> 
			<td data-title="Total">  NA  </td>
		  </tr>
		  
		
		  
		<tr class="total">
			<td colspan="3">
				<h6 class="mb-0">Grand Total</h6>
			</td>
			 
			<td> <strong>Rs. 1451</strong> </td>
		</tr>


		</tbody>
		</table>
		</div>
		
		
		<div class="col-md-4">  
		<table class="sigma_responsive-table">
		
		<tbody> 
		  <tr> 
			<td colspan="3" data-title="Product"> 
				  <h6 class="text-black"> Add Ons with this pooja </h6>  
			</td> 
		  </tr>
		 
		  <tr> 
			<th colspan="2" class="text-black">Item</th>
			<th class="text-black">Amount</th>  
		  </tr>
		 
		  <tr>
			<td class="remove">
			  <button type="button">+</button>
			</td>
			<td data-title="Add on">
			  <div class="sigma_cart-product-wrapper">
				<img src="assets/frontend/img/products/4.jpg" alt="prod1">
				<div class="sigma_cart-product-body  text-black">
				   Ganga Pushkar Jal 
				</div>
			  </div>
			</td>
			<td data-title="Price">  Rs. 151 </td> 
		  </tr>		 
		  
		  <tr>
			<td class="add">
			  <button type="button">+</button>
			</td>
			<td data-title="Product">
			  <div class="sigma_cart-product-wrapper">
				<img src="assets/frontend/img/products/5.jpg" alt="prod1">
				<div class="sigma_cart-product-body text-black">
				   Energized Silver bel patra (1 pc) 
				</div>
			  </div>
			</td>
			<td data-title="Price">  Rs. 400 </td> 
			 
		  </tr>
		  
		
		  
		 


		</tbody>
		</table>
		</div>
		
		
		</div>
      <!-- Cart Table End -->
 
 <!-- Checkout Start -->
  <div class="section pt-0">
    <div class="container"> 
      <form method="post">
        <div class="row">
		   
          <div class="col-xl-12">   
            <h4>Billing Details</h4>
            <div class="row"> 
			  <div class="form-group col-xl-12">
			    <label class="text-black">Select members<span class="text-danger">*</span> Or <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Members/Devotee</a></label>
                <div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="1">
					<label class="custom-control-label text-black" for="1">Self-Sanjay Kuamr Gupta   -    <a href="">Edit</a></label> 
                 </div>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="2">
					<label class="custom-control-label text-black" for="2">Brother-Ashok Kuamr Gupta   -    <a href="">Edit</a></label> 
                 </div>
			  </div> 
			   
              <div class="form-group col-xl-6">
                <label>Name<span class="text-danger">*</span></label>
                <input type="text" placeholder="Name" name="cname" class="form-control" value="">
              </div>
			  <div class="form-group col-xl-6">
                <label>Phone Number <span class="text-danger">*</span></label>
                <input type="text" placeholder="Phone Number" name="phone" class="form-control" value="" required="">
              </div>
              <div class="form-group col-xl-6">
                <label>Email Address <span class="text-danger">*</span></label>
                <input type="email" placeholder="Email Address" name="email" class="form-control" value="" required="">
              </div>
			  <div class="form-group col-xl-6">
                <label>Street Address 1 <span class="text-danger">*</span></label>
                <input type="text" placeholder="Street Address One" name="addr-1" class="form-control" value="" required="">
              </div>
              <div class="form-group col-xl-6">
                <label>Street Address 2</label>
                <input type="text" placeholder="Street Address Two (Optional)" name="addr-1" class="form-control" value="">
              </div>
              <div class="form-group col-xl-6">
                <label>Town / City <span class="text-danger">*</span></label>
                <input type="text" placeholder="Town/City" name="town" class="form-control" value="" required="">
              </div>
			  <div class="form-group col-xl-6">
                <label>State <span class="text-danger">*</span></label>
                <select class="form-control">
                  <option value="">Select State</option><option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chandigarh">Chandigarh</option><option value="Chattisgarh">Chattisgarh</option><option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman and Diu">Daman and Diu</option><option value="Delhi">Delhi</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu &amp; Kashmir">Jammu &amp; Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Lakshadweep">Lakshadweep</option><option value="Ladakh">Ladakh</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Odisha">Odisha</option><option value="Pondicherry">Pondicherry</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Telangana">Telangana</option><option value="Tripura">Tripura</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="Uttarakhand">Uttarakhand</option><option value="West Bengal">West Bengal</option><option value="Other Territory">Other Territory</option> 
                </select>
              </div>
			  <div class="form-group col-xl-6">
                <label>Country <span class="text-danger">*</span></label>
                <select class="form-control" disabled>
                  <option value="">Select a Country</option>
                  <option value="Afghanistan">Afghanistan</option>
                  <option value="Åland Islands">Åland Islands</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="American Samoa">American Samoa</option>
                  <option value="aaaaaaxxx">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Anguilla">Anguilla</option>
                  <option value="Antarctica">Antarctica</option>
                  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Aruba">Aruba</opgbbbbb vc22226 vc261b vc1cv2 122222222221c2vvv12vtion>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bermuda">Bermuda</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Bouvet Island">Bouvet Island</option>
                  <option value="Brazil">Brazil</option>
                  <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                  <option value="Brunei Darussalam">Brunei Darussalam</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Canada">Canada</option>
                  <option value="Cape Verde">Cape Verde</option>
                  <option value="Cayman Islands">Cayman Islands</option>
                  <option value="Central African Republic">Central African Republic</option>
                  <option value="Chad">Chad</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Christmas Island">Christmas Island</option>
                  <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo">Congo</option>
                  <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                  <option value="Cook Islands">Cook Islands</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Cote D'ivoire">Cote D'ivoire</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                  <option value="Faroe Islands">Faroe Islands</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="French Guiana">French Guiana</option>
                  <option value="French Polynesia">French Polynesia</option>
                  <option value="French Southern Territories">French Southern Territories</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Gibraltar">Gibraltar</option>
                  <option value="Greece">Greece</option>
                  <option value="Greenland">Greenland</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guadeloupe">Guadeloupe</option>
                  <option value="Guam">Guam</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guernsey">Guernsey</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guinea-bissau">Guinea-bissau</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                  <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hong Kong">Hong Kong</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="India" selected>India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Isle of Man">Isle of Man</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jersey">Jersey</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                  <option value="Korea, Republic of">Korea, Republic of</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Macao">Macao</option>
                  <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Martinique">Martinique</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mayotte">Mayotte</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                  <option value="Moldova, Republic of">Moldova, Republic of</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montenegro">Montenegro</option>
                  <option value="Montserrat">Montserrat</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar">Myanmar</option>
                  <option value="Namibia">Namibia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherlands">Netherlands</option>
                  <option value="Netherlands Antilles">Netherlands Antilles</option>
                  <option value="New Caledonia">New Caledonia</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Niue">Niue</option>
                  <option value="Norfolk Island">Norfolk Island</option>
                  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau">Palau</option>
                  <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Pitcairn">Pitcairn</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Reunion">Reunion</option>
                  <option value="Romania">Romania</option>
                  <option value="Russian Federation">Russian Federation</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Saint Helena">Saint Helena</option>
                  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                  <option value="Saint Lucia">Saint Lucia</option>
                  <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                  <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Serbia">Serbia</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                  <option value="Swaziland">Swaziland</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                  <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Timor-leste">Timor-leste</option>
                  <option value="Togo">Togo</option>
                  <option value="Tokelau">Tokelau</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="Uganda">Uganda</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="United States">United States</option>
                  <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                  <option value="Uruguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Viet Nam">Viet Nam</option>
                  <option value="Virgin Islands, British">Virgin Islands, British</option>
                  <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                  <option value="Wallis and Futuna">Wallis and Futuna</option>
                  <option value="Western Sahara">Western Sahara</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
                </select>
              </div>
              
              <div class="form-group col-xl-12 mb-0">
                <label>Order Notes</label>
                <textarea name="name" rows="5" class="form-control" placeholder="Order Notes (Optional)"></textarea>
              </div>
			  
			  <div class="form-group col-xl-12 pt-10"> 
			    <label class="pt-10"></label>
				<button type="submit"   class="form-control sigma_btn-custom">Proceed to pay Rs. 1451</button> 
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Members/Devotee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
	  
	  <div class="row"> 
              <div class="form-group col-xl-12">
                <label>Relation<span class="text-danger">*</span></label>
                <select class="form-control">
                   <option value="">Select relation</option><option value="self">self</option><option value="mother">mother</option><option value="spouse">spouse</option><option value="father">father</option><option value="son">son</option><option value="daughter">daughter</option><option value="sibling">sibling</option><option value="friend">friend</option><option value="cousin">cousin</option><option value="other">other</option> 
                </select>
              </div>
			  <div class="form-group col-xl-12">
                <label>Gotra: <span class="text-danger">*</span></label>
                <input type="text" placeholder="Gotra" name="gotra" class="form-control" value="" required="">
              </div>
              <div class="form-group col-xl-12">
                <label>Nakshatra <span class="text-danger">*</span></label>
                <input type="email" placeholder="Nakshatra" name="nakshatra" class="form-control" value="" required="">
              </div>
			  <div class="form-group col-xl-12">
                <label>Rashi<span class="text-danger">*</span></label>
                <input type="text" placeholder="Rashi" name="rashi" class="form-control" value="" required="">
              </div>
			  <div class="form-group col-xl-12"> 
                <button type="button" class="sigma_btn-custom">Add Members/Devotee</button>
              </div>
			</div> 
	  
      </div> 
    </div>
  </div>
</div>
 