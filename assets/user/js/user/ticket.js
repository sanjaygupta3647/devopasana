$(document).ready(function () {
    if($('.summernote').length){
		$('.summernote').summernote({
			toolbar: [
				['style', ['bold', 'italic', 'underline']],
				['para', ['ul', 'ol', 'paragraph']],

			],
			popover: {
				image: [],
				link: [],
				air: []
			}
		});
	}


	$("#add-ticket").validate({

		rules: {
			'department_id': {
				required: true
			},
			'subject': {
				required: true
			},
			'message': {
				required: true
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

			$url = base_url + "user/addNewTicket",
				$.ajax({
					type: "POST",
					url: $url,
					data: new FormData(document.getElementById('add-ticket')),
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
	
	
	$("#postreply").validate({

		rules: {
			'message': {
				required: true
			},
			 

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

			$url = base_url + "user/addComment",
				$.ajax({
					type: "POST",
					url: $url, 
					data: new FormData(document.getElementById('postreply')),
					contentType: false,
					processData: false,
					encode: true,
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
	
	$(document).on("click", '.change_status', function () {
		$this = $(this); 
		$id = $($this).data("id");
		$status = $($this).data("status");		
		$closed_by = $($this).data("closed_by");	
		$close_time = $($this).data("close_time");	
		 		
		bootbox.confirm("Are you sure? You want to "+$status+" this ticket.", function (result) {

			
			if (result) {
				$.ajax({
					url: base_url + 'user/updateTicket/' + $id + '/',
					type: 'POST',
					data: { 'status': $status, 'closed_by': $closed_by, 'close_time': $close_time},
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

	});



});
