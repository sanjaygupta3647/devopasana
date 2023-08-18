$(document).ready(function () {

    jQuery.validator.addMethod("username", function(val) {
			const usernameRegex = /^[a-z0-9_.@]+$/
			return usernameRegex.test(val)
		}, "Please enter a valid username."
	);
	$("#add-edit-user").validate({

		rules: {
			'username': {
				required: true,
				username: true
				 
			},
			'password': {
				required: true,
				minlength: 5
			},
			'role_id': {
				required: true
			},
			'status': {
				required: true
			},
			'fname': {
				required: true
			},
			'email': {
				required: true,
				email: true
			}

		},

		ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
		errorClass: 'validation-error-label',
		successClass: 'validation-valid-label',
		highlight: function (element, errorClass) {
			$(element).removeClass(errorClass);
		},
		unhighlight: function (element, errorClass) {
			$(element).removeClass(errorClass);
		},

		// Different components require proper error label placement
		errorPlacement: function (error, element) {

			// Styled checkboxes, radios, bootstrap switch
			if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container')) {
				if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
					error.appendTo(element.parent().parent().parent().parent());
				}
				else {
					error.appendTo(element.parent().parent().parent().parent().parent());
				}
			}

			// Unstyled checkboxes, radios
			else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
				error.appendTo(element.parent().parent().parent());
			}

			// Input with icons and Select2
			else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
				error.appendTo(element.parent());
			}

			// Inline checkboxes, radios
			else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
				error.appendTo(element.parent().parent());
			}

			// Input group, styled file input
			else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
				error.appendTo(element.parent().parent());
			}

			else {
				error.insertAfter(element);
			}
		},
		validClass: "validation-valid-label",
		submitHandler: function (form) {

			$url = base_url + "admin/users/addUser",
				$.ajax({
					type: "POST",
					url: $url,
					data: new FormData(document.getElementById('add-edit-user')),
					contentType: false,
					processData: false,
					encode: true,
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

	$("#userrole").change(function () {
		if ($(this).val() == 1) {
			$("#department_ids").children('option').each(function () {
				$(this).prop("selected", true);
			});

		}
		if ($('.select').length) {
			$('.select').select2();
		}
	});

});
