$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    $('select').on('change', function() {

    

    });
    $('#payout').click(function(){
        window.location = "/main/payout"
    });

    jQuery.validator.addMethod("alpha", function(value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
    });
    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                password: {
                    minlength: 8
                },
                email:{
                    required:true,
                },
                paypal_email:{
                    required:true,
                },
                company_name:{
                    required:true,
                    alpha:true
                },
                confirm_password: {
                    equalTo : "#password",
                    minlength: 8,
                },
                country: {
                    alpha: true
                }
            },
            messages: {
                company_name:       { alpha: "Only Whitespace and alphabet allowed"},
                password:           { minlength: "Your title must consist of at least 8 characters"},
                country:            { alpha : "Only Whitespace and alphabet allowed"},
                confirm_password:   { 
                    minlength: "Your title must consist of at least 8 characters",
                    equalTo : "Password and Confirm password should match"
                },
                
            }
        })
    })
        
 })(jQuery)
})