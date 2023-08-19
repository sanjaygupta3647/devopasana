$(document).ready(function(){  
	$("#relation-form").validate({
		rules: { 
			'relation': {
				required: true
			},
			'name': {
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
			    let url = base_url + "customer/saveRelation";
				$.ajax({
					type: "POST",
					url: url,
					data: $("#relation-form").serialize(),
					success: function (response) {
						if (response.type == 'success') {
							bootbox.alert(response.message, function () {
								window.location.href = base_url + "family";
							});
							 
						} else {
							bootbox.alert(response.message);
						}

					}
				});
		}
	});

	 
	
	
});