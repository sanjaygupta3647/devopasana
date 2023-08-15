$(document).ready(function(){  
	$("#relation-form").validate({
		rules: { 
			'relation': {
				required: true
			},
			'name': {
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
			    let url = base_url + "customer/saveRelation";
				$.ajax({
					type: "POST",
					url: url,
					data: $("#relation-form").serialize(),
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

	$(".edit_relation").click(function(){
		//console.log($(this).data('name'));
		$("#relation-form input[name=relation_id]").val($(this).data('id')); 
		$("#relation-form input[name=name]").val($(this).data('name'));  
		$("#relation-form input[name=gotra]").val($(this).data('gotra')); 
		$("#relation-form input[name=nakshatra]").val($(this).data('nakshatra')); 
		$("#relation-form input[name=rashi]").val($(this).data('rashi')); 
		$("#relation-form input[name=dob]").val($(this).data('dob')); 
		$("#relation-form input[name=tob]").val($(this).data('tob')); 
		$("#relation-form input[name=pob]").val($(this).data('pob')); 
		$("#relation-form input[name=additional_info]").val($(this).data('additional_info')); 
		
		$("#relation-form select[name=relation]").val($(this).data('relation')).trigger("change"); 
		$('#relationModel').modal('show');
	});
});