$(document).ready(function () {
	
	$('.summernote').summernote();
	
	function is_image_added(){
		if($("input[name=image]").data('image-name')){
			return false;
		}
		return true;
	}

	$("#add-campaign").validate({
         
		rules: {
			'title': {
				required: true
			},
			'status': {
				required: true
			},
			'target': {
				required: true,
				number: true
			},
			'start_date': {
				required: true
			},
			'end_date': {
				required: true
			},
			'image': {
				required: is_image_added()
			},
			'status': {
				required: true
			},
			'description': {
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

			$url = base_url + "admin/campaign/add_campaign",
			$.ajax({
				type: "POST",
				url: $url, 
				data: new FormData(document.getElementById('add-campaign')),
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
	
	function createSlug(str) {
	  str = str.replace(/^\s+|\s+$/g, ''); // Trim leading/trailing white spaces
	  str = str.toLowerCase();

	  // Remove accents, swap ñ for n, etc.
	  var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
	  var to = "aaaaeeeeiiiioooouuuunc------";
	  for (var i = 0, l = from.length; i < l; i++) {
		str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
	  }

	  str = str.replace(/[^a-z0-9 -]/g, '') // Remove invalid characters
		.replace(/\s+/g, '-') // Replace spaces with dashes
		.replace(/-+/g, '-'); // Collapse consecutive dashes

	  return str;
	}
	
	$("input[name=title]").blur(function(){
		var slug = createSlug($(this).val());
		if($("input[name=slug]").val()==''){
			$("input[name=slug]").val(slug);
		}
	});
	
	
	$("#add-pooja-to-campaign").validate({
         
		rules: {
			'pooja_id': {
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

			$url = base_url + "admin/campaign/add_pooja_to_campaign",
			$.ajax({
				type: "POST",
				url: $url, 
				data: new FormData(document.getElementById('add-pooja-to-campaign')),
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
	
	$(".delete_pooja").on("click", function(){
		$this = $(this);
		$pooja_id = $($this).data("pooja_id"); 
		$campaign_id = $($this).data("campaign_id");  
		 
		bootbox.confirm("Are you sure? You want to delete this row?", function (result) {

			if (result) {
				$.ajax({
					url: base_url + 'admin/campaign/deletepooja/',
					type: 'POST',
					data: {'pooja_id' : $pooja_id, 'campaign_id' : $campaign_id},
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
	})

	 

});
