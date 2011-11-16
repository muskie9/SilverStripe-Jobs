$(document).ready(function() {

	$('#Apply').css({'display':'none'});
	$('#Form_ApplicationForm').css({'display':'block'});
	
	$("#hidden").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$('#Form_ApplicationForm').offset().top}, 2000);
	});
	
	$('#hidden').click();
	
});