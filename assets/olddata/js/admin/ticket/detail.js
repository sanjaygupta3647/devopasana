$(document).ready(function () {

   $(".summernote").summernote({
        height: 300,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
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

			$url = base_url + "admin/ticket/addComment",
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
	
	
	$("#togglebox").click(function(){
		$(this).siblings(".note-editor").toggle();
	});
	$("#togglebox").click();

	 

});
