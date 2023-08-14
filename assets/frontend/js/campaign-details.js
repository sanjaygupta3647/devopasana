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
	 
	 
});