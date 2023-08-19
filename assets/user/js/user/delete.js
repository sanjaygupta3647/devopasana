$(document).ready(function () {
	 $(".delete-devotee").click(function(){ 
	    $this = $(this);
		bootbox.confirm("Are you sure? You want to delete this record.", function (result) {

			let id = $this.data("id");
			if (result) {
				$.ajax({
					url: base_url + 'customer/delete_devotee/' + id,
					type: 'POST',
					data: {},
					success: function (response) {

						if (response.type == 'success') {
							bootbox.alert(response.message, function () {
								window.location.href = self.location;
							});

						} else {
							bootbox.alert(response.message);
						}

					}
				});
			}

		});
	})

});
