$(document).ready(function () {

	$("#loginform").validate({
		rules: {
			'username': {
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

			$url = base_url + "login/authenticate",
				$.ajax({
					type: "POST",
					url: $url,
					data: $("#loginform").serialize(),
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
