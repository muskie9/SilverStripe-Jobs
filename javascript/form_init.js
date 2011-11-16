	$('#Apply').click(function(){
		event.preventDefault();
		$('#Apply').slideToggle(500);
		$('#Form_ApplicationForm').slideToggle(500);
		$('html,body').animate({scrollTop:$('#Form_ApplicationForm').offset().top-25}, 2000);
	
	});

	$("#Form_ApplicationForm").validate({
		rules: {
			FirstName: {
				required: true
			},
			LastName: {
				required: true
			},
			Email: {
				required: true,
				email: true
			}
		},
		messages: {
			FirstName: {
				required: "Please enter your first name."
			},
			LastName: {
				required: "Please enter your last name."
			},
			Email: {
				required: "Please enter your email",
				email: "Please provide a valid email address."
			}
		}
	});

	/*function $_GET(q,s) { 
        s = s ? s : window.location.search; 
        var re = new RegExp('&'+q+'(?:=([^&]*))?(?=&|$)','i'); 
        return (s=s.replace(/^?/,'&').match(re)) ? (typeof s[1] == 'undefined' ? '' : decodeURIComponent(s[1])) : undefined; 
    } 
    
    var var1 = $_GET('form');
    
    if(var1=='show'){
    	$('#Apply').css({'display':'none'});
    	$('#Form_ApplicationForm').css({'display':'block'});
    }*/