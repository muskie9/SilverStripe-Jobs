$(document).ready(function(){

	$('.delete').click(function(){
	
		$('.double-check').fadeIn(500);
	
	});
	
	$('.cancel').click(function(){
	
		$('.double-check').fadeOut(500, function(){
			$('.double-check').css({'display':'none'});
		});
	
	});

});