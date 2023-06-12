$(document).ready(function () {
	
	 

	$("#add-edit").validate({ 
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

			$url = base_url + "admin/setting/update",
			$.ajax({
				type: "POST",
				url: $url, 
				data: new FormData(document.getElementById('add-edit')),
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
	
	function hideShowSMTP(){
		var ismtp = $("input[name='smtp']:checked").val();
		if(ismtp==1){
			$("input[name='smtp']").closest('.row').nextAll(".row").show();
		 
		}else{
			$("input[name='smtp']").closest('.row').nextAll(".row").hide();
			$(".testmail").hide();
			 
		} 
		
 
	}
	
	$("input[name='smtp']").click(function(){
		hideShowSMTP();
	});
	hideShowSMTP();
	 $(".testmail").click(function () {
        var $id = $(this).data("id");
        var $username = $(this).data("username");

        bootbox.dialog({
            title: '<h4>Send a test mail to verify you SMTP settings </h4>',
            message: '<div class="row"><form class="form" id="testmail">' +
                '<div class="col-sm-12 col-xs-12">' +
                '<div class="form-group">' + 
                '<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Email Id">' +
                '</div>' +
                '</div>' +
				'<div class="col-sm-12 col-xs-12">' +
                '<div class="form-group">' + 
                '<input type="text" name="subject"   class="form-control" autocomplete="off" placeholder="Subject">' +
                '</div>' +
                '</div>' +
				'<div class="col-sm-12 col-xs-12">' +
                '<div class="form-group">' + 
                '<textarea name="message" class="form-control" placeholder="Enter your message"></textarea>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-12 col-xs-12">' +
                '<div class="form-group">' +
                '<button type="submit" class="btn btn-info ui-wizard-content ui-formwizard-button"><span>Submit</span></button>' +
                '</div>' +
                '</div>' +
                '<p class="col-sm-12">*Required field.</p>' +
                '</form></div>',
        });
	
	$('#testmail').validate({
            rules: {
                'email': {
                    required: true,
                    email: true
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
                var $data = $(form).serializeArray();
                $url = base_url + "admin/setting/testmail",
                    $.ajax({
                        type: "POST",
                        url: $url,
                        data: $data,
                        beforeSend: function () {
                            $(".formbtn span").html('Submitting...');
                            $(".formbtn").prop('disabled', true);
                        },
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
		});
});
