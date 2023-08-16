$(document).ready(function(){ 
	
	$("body").on("change",".pooja_price",function(){
		let pooja_id = $(this).data('pooja_id');
		console.log(pooja_id);
		var current_id = $(this).val();
		$(".all_price_list_"+pooja_id).hide();
		$("#"+pooja_id+"_price_"+current_id).show();
	});
	
	$(".add_to_cart").click(function(){
		let customer = $(this).data('customer');
		if(customer==""){
			bootbox.alert("Please login to book this pooja!", function () {
				window.location.href =  base_url + "login";
			});
		}else{
			let url = base_url + "campaigns/addpooja";
			let form_id = $(this).data('form_id');
			$.ajax({
				type: "POST",
				url: url, 
				data: new FormData(document.getElementById(form_id)),
				contentType: false,
				processData: false,
				encode: true,
				success: function (response) {

					if (response.type == 'success') {
						bootbox.alert(response.message, function () {
							window.location.href = response.url;
						});

					} else {
						if (response.message) {
							var message = response.message;
						} else {
							var message = "There is some issue in form submission";
						}
						bootbox.alert(message);
					}

				}
			});
		}
	});
	
	$(".addon_with_pooja").click(function(){
		let cart_id = $(this).data('cart_id');
		let addon_id = $(this).data('addon_id');
		 
		if(cart_id=="" || addon_id=="" ){
			bootbox.alert("Invalid access!");
		}else{
			let url = base_url + "campaigns/addpoojaAddon"; 
			$.ajax({
				type: "POST",
				url: url, 
				data: ({cart_id:cart_id,addon_id:addon_id}), 
				dataType: 'json',
				success: function (response) {

					if (response.type == 'success') {
						bootbox.alert(response.message, function () {
							window.location.href = self.location;
						});

					} else {
						if (response.message) {
							var message = response.message;
						} else {
							var message = "There is some issue in form submission";
						}
						bootbox.alert(message);
					}

				}
			});
		}
	});
	
	$(".remove-from-cart").click(function(){
		let cart_id = $(this).data('cart_id');
		let addon_id = $(this).data('addon_id');
		 
		if(cart_id=="" || addon_id=="" ){
			bootbox.alert("Invalid access!");
		}else{
			let url = base_url + "campaigns/removePoojaAddon"; 
			$.ajax({
				type: "POST",
				url: url, 
				data: ({cart_id:cart_id,addon_id:addon_id}), 
				dataType: 'json',
				success: function (response) {

					if (response.type == 'success') {
						bootbox.alert(response.message, function () {
							window.location.href = self.location;
						});

					} else {
						if (response.message) {
							var message = response.message;
						} else {
							var message = "There is some issue in form submission";
						}
						bootbox.alert(message);
					}

				}
			});
		}
	});
	
	
	
	$("#final_submission").validate({
		rules: {
			 
			'name': {
				required: true
			},
			'phone': {
				required: true
			},
			'email': {
				required: true
			},
			'town': {
				required: true
			},
			'town': {
				required: true
			},
			'state': {
				required: true
			},
			'password': {
				required: true
			}

		},

		errorElement: 'span',
		errorClass: 'validation-error-label',
		successClass: 'validation-valid-label',
		highlight: function (element, errorClass) {
			$(element).removeClass(errorClass);
		},
		unhighlight: function (element, errorClass) {
			$(element).removeClass(errorClass);
		},

		ignore: ":hidden:not(.select-chosen)",
		submitHandler: function (form) {
			if (!$(".relation").is(":checked")) {  
				bootbox.alert("Please choose/add Devotee.", function () {
					
					$('html, body').animate({
						scrollTop: $("#selectmember").offset().top -20
					}, 600);
				}); 
				return false; 
			}
			$url = base_url + "campaigns/finalCheckout",
				$.ajax({
					type: "POST",
					url: $url,
					data: $("#final_submission").serialize(),
					success: function (response) {
						if (response.type == 'success') {
							window.location.href = response.url;
						} else {
							bootbox.alert(response.message);
						}

					}
				});
		}
	});
	
	
	$('html, body').animate({
		scrollTop: $("#ordersummary").offset().top -20
	}, 600); 
	 
});