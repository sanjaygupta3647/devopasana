$(document).ready(function () {

	$("#register").validate({
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

			$url = base_url + "customer/register",
				$.ajax({
					type: "POST",
					url: $url,
					data: $("#register").serialize(),
					success: function (response) {
						if (response.type == 'success') {
							bootbox.alert(response.message, function () {
								window.location.href = response.url;
							});
						} else {
							bootbox.alert(response.message);
						}

					}
				});
		}
	});

});
