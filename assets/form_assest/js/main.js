
(function ($) {
    "use strict";

    
    /*==================================================================
    [ Validate ]*/
    var name = $('.validate-input input[name="Company Name"]');
    var email = $('.validate-input input[name="Email"]');
    var password = $('.validate-input input[name="Password"]');
    var otp = $('.validate-input input[name="OTP"]');
    $('.validate-form').on('submit',function(){
        var check = true;
        if (name.length != 0){
            if($(name).val().trim() == ''){
                showValidate(name);
                check=false;
            }
        }
        if (otp.length != 0){
            if($(otp).val().trim() == ''){
                showValidate(otp);
                check=false;
            }
        }
        if (password.length != 0){
            if($(password).val().trim() == ''){
                showValidate(password);
                check=false;
            }
        }

        if (email.length != 0){
            if($(email).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                showValidate(email);
                check=false;
            }
        }
        
        return check;
    });


    $('.validate-form .input1').each(function(){
        $(this).focus(function(){
           hideValidate(this);
       });
    });

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);

