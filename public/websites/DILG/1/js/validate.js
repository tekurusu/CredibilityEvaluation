// Jquery Validation

$(document).ready(function() {
					
	$("#pac_feedback").validate({
		rules: {
			name:{
				required: true
			},			
			email: {
				required: true,			
				email: true			
			},
			contact: {
				required: true
			},
			subject: {
				required: true
			},
			message: {
				required: true
			},
			security_code: {
				required: true
			}							
		},
		messages: {
			name: {
				required: "Please enter your name"
			},			
			email: {
				required: "Please enter a email address",			
				email: "Please enter a valid email address"
			},
			contact: {
				required: "Please enter your contact number"
			},
			subject: {
				required: "Please enter your subject"
			},
			message: {
				required: "Please enter your message"
			}			
		},
		errorPlacement: function(label, element) {
			$('<div class="errorContainer"><span class="error_msg"></span></div>').insertAfter(element).find('.error_msg').append(label)
		},				
		submitHandler: function(form) {
		  //var fname =  form.name.value;
		  //var femail = form.email.value;
		  //var fcontact = form.contact.value;		 	  
		  form.submit();
		}		
	});		
	
	$("#issuances_feedback").validate({
		rules: {
			name:{
				required: true
			},			
			email: {
				required: true,			
				email: true			
			},
			address: {
				required: true
			},
			message: {
				required: true
			},
			security_code: {
				required: true
			}				
		},
		messages: {
			name: {
				required: "Please enter your name"
			},			
			email: {
				required: "Please enter a email address",			
				email: "Please enter a valid email address"
			},
			address: {
				required: "Please enter your address"
			},
			message: {
				required: "Please enter your feedback"
			}			
		},
		errorPlacement: function(label, element) {
			$('<div class="errorContainer"><span class="error_msg"></span></div>').insertAfter(element).find('.error_msg').append(label)
		},				
		submitHandler: function(form) {
		  //var fname =  form.name.value;
		  //var femail = form.email.value;
		  //var fcontact = form.contact.value;		 	  
		  form.submit();
		}		
	});						
					
});
