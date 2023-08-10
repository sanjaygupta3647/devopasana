$(document).ready(function () {
    function is_image_added(){
		if($("input[name=img]").data('image-name')){
			return false;
		}
		return true;
	}
	$("#add-divine").validate({

		rules: {
			'title': {
				required: true
			},
			'img': {
				required: is_image_added()
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

			$url = base_url + "admin/divine/add_divine",
				$.ajax({
					type: "POST",
					url: $url,
					contentType: false,
					processData: false,
					encode: true,
					data: new FormData(document.getElementById('add-divine')), 
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
				url: base_url + 'admin/divine/delete_divine/' + $id + '/',
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
