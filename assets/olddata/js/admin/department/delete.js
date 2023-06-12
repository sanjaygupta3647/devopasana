$(document).ready(function () {  
	$(document).on("click", '.delete', function () {
		$this = $(this); 
		bootbox.confirm("Are you sure? You want to delete this record.", function (result) {

			$id = $($this).data("id");
			if (result) {
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
			}

		});

	});

});
