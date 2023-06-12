$(document).ready(function () {
	
	$('.summernote').summernote();

	$("#add-edit-faq").validate({
         /*
		rules: {
			'title': {
				required: true
			},
			'status': {
				required: true
			}

		},*/

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

			$url = base_url + "admin/faq/add_faq",
			$.ajax({
				type: "POST",
				url: $url, 
				data: new FormData(document.getElementById('add-edit-faq')),
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

	$(document).on("click", '.delete', function () {
		$this = $(this);

		bootbox.confirm("Are you sure? You want to delete this record.", function (result) {

			$id = $($this).data("id");
			$.ajax({
				url: base_url + 'admin/department/delete_department/' + $id + '/',
				type: 'POST',
				data: { 'status': 'Active' },
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

		});

	});

});
