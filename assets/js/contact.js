$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");
    jQuery.validator.addMethod("alpha", function(value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
    });
    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                title: {
                    required: true,
                    minlength: 2,
                    maxlength:12,
                    alpha: true
                },
                price: {
                    required: true,
                    digits: true,
                    number:true
                },
                message: {
                    required: true,
                    minlength: 20,
                    alpha: true,
                    maxlength : 1024
                }
            },
            messages: {
                title: {
                    required: "Title is required",
                    minlength: "Your title must consist of at least 3 characters",
                    alpha : "Only Whitespace and alphabet allowed",
                    maxlength : "Your title cann't consist more then 12 characters",
                },
                price: {
                    required: "Invalid price",
                    digits: "Price should be in natural number",
                    number : "Price should be natural number"
                },
                message: {
                    required: "Description is required",
                    minlength: "Your description must consist of at least 20 characters",
                    alpha : "Only Whitespace and alphabet allowed",
                    maxlength : "Your description cannot consist more then 1024 characters"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"main/upload_game",
                    success: function(result) {
                        alert(result);
                        
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            
                            
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
		                	$('#success').modal('show');
                        })
                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    },
                })
            }
        })
    })
        
 })(jQuery)
})