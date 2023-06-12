$(function(){ 
	loader = $('.overlay'); 
    $( document ).ajaxStart(function() {
        loader.removeClass('hide');
    }).ajaxStop(function() {
        loader.addClass('hide');
    }).ajaxError(function(event, jqXHR, settings, thrownError){
        if (jqXHR.status === 0 || jqXHR.status === 401) {
            window.location.href = base_url + '/login/logout';
        } else {
            var errorMessage = JSON.parse(jqXHR.responseText);
            bootbox.alert(errorMessage.error);
        }
    });
	
if($('.select').length)	{
	$('.select').select2();
}

if($('.form-validation').length){
	$(".form-validation").formwizard({
	disableUIStyles: true  
});
}


$('.integeronly').on('keyup', function() {
	// Remove any non-numeric characters
	$(this).val($(this).val().replace(/[^0-9]/g, ''));
});



});