$(document).ready(function () {

	$("#customer-login").validate({
		rules: {
			'email': {
				required: true
			},
			'pass': {
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

			$url = base_url + "customer/login",
				$.ajax({
					type: "POST",
					url: $url,
					data: $("#customer-login").serialize(),
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

});
