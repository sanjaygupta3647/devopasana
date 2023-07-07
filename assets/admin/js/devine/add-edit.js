$(document).ready(function () {

	$("#add-devine").validate({

		rules: {
			'title': {
				required: true
			},
			'status': {
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

			$url = base_url + "admin/devine/add_devine",
				$.ajax({
					type: "POST",
					url: $url,
					data: $("#add-devine").serialize(),
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

	$(document).on("click", '.delete', function () {
		$this = $(this);

		bootbox.confirm("Are you sure? You want to delete this record.", function (result) {

			$id = $($this).data("id");
			$.ajax({
				url: base_url + 'admin/devine/delete_devine/' + $id + '/',
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
