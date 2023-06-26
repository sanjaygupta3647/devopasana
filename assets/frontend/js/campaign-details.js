$(document).ready(function(){
	 
	
	$("body").on("change",".pooja_price",function(){
		let pooja_id = $(this).data('pooja_id');
		console.log(pooja_id);
		var current_id = $(this).val();
		$(".all_price_list_"+pooja_id).hide();
		$("#"+pooja_id+"_price_"+current_id).show();
	});
	 
	 
});