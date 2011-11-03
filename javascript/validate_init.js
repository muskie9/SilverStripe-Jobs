$(document).ready(function(){

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

});