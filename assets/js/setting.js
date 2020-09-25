var col = undefined;
var col_two = undefined;

$(document).ready(function () {

    (function ($) {
        "use strict";
        let credit = $('#credit').text();
        $('#fee').text(10 * (credit / 100));
        $('#total').text(credit - (10 * (credit / 100)));
        
        createInputs($('select').val());
        $('select').on('change', function () {
            $('#checkbox').prop('checked', false); 
            let value = $('select').val();
            col.remove();
            if (col_two != undefined)
                col_two.remove();
            createInputs(value);

        });

        //Checkbox setting
        $('#checkbox').on('change', function () {
           if ($('#checkbox').prop('checked')){
            $("[name='ac_number']").removeAttr('disabled');
            $("[name='ifsc']").removeAttr('disabled');
            $("[name='bic']").removeAttr('disabled');
            $("[name='short_code']").removeAttr('disabled');
            $("[name='iban']").removeAttr('disabled');
           }else{
            $("[name='ac_number']").attr('disabled','disabled');
            $("[name='ifsc']").attr('disabled','disabled');
            $("[name='bic']").attr('disabled','disabled');
            $("[name='short_code']").attr('disabled','disabled');
            $("[name='iban']").attr('disabled','disabled');
           }
        });   


        $('#payout').click(function () {
            window.location = "/main/payout"
        });

        jQuery.validator.addMethod("alpha", function (value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
        });
        // validate contactForm form
        $(function () {
            /*$('#contactForm').validate({
                rules: {
                    new_password: {
                        minlength: 8
                    },
                    current_password : {
                        required:true,
                        minlength: 8
                    },
                    company_name: {
                        required: true,
                        alpha: true
                    },
                    confirm_password: {
                        equalTo: "#new_password",
                        minlength: 8,
                    },
                    countries: {
                        required: true
                    },
                    ac_number: {
                        required: true,
                        number: true
                    },
                    ac_name: {
                        required: true,
                        alpha: true
                    }
                },
                messages: {
                    company_name: { alpha: "Only Whitespace and alphabet allowed" },
                    ac_name: { alpha: "Only Whitespace and alphabet allowed" },
                    new_password: { minlength: "Your password must consist of at least 8 characters" },
                    current_password: { minlength: "Your password must consist of at least 8 characters" },
                    confirm_password: {
                        minlength: "Your password must consist of at least 8 characters",
                        equalTo: "New Password and Confirm password should match"
                    },

                }
            })*/
        })

    })(jQuery)
});

function createInputs(value) {
    if (value == 'aus')
        col = createAcc();
    else if (value == 'ind') {
        col_two = createAcc();
        col = createIFSC();
    } else if (value == 'uk') {
        col_two = createAcc();
        col = createShort();
    } else if (value == 'bel' || value == 'fra' || value == 'ger' || value == 'fin')
        col = createIBAN();
    else if (value == 'jap' || value == 'can') {
        col = createIBAN();
        col_two = createBIC();
    }
}
function createIFSC(value) {
    let col = document.createElement('div');
    col.setAttribute('class', 'col-md-6');
    let form_control = document.createElement('div')
    form_control.setAttribute('class', 'form-group');
    let label = document.createElement('label');
    label.innerText = 'IFSC CODE';
    let input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'password');
    input.setAttribute('disabled', '');
    input.setAttribute('name', 'ifsc');
    input.setAttribute('placeholder', 'IFSC CODE');
    //input.setAttribute('required', 'required');
    form_control.appendChild(label);
    form_control.appendChild(input);
    col.appendChild(form_control);
    $('#row').append(col);
    return col;
}

function createAcc() {
    let col = document.createElement('div');
    col.setAttribute('class', 'col-md-6');
    let form_control = document.createElement('div')
    form_control.setAttribute('class', 'form-group');
    let label = document.createElement('label');
    label.innerText = 'Account Number';
    let input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'password');
    input.setAttribute('name', 'ac_number');
    input.setAttribute('placeholder', 'Account Number');
    input.setAttribute('disabled', 'disabled');
    //input.setAttribute('required', 'required');
    form_control.appendChild(label);
    form_control.appendChild(input);
    col.appendChild(form_control);
    $('#row').append(col);
    return col;
}

function createIBAN() {
    let col = document.createElement('div');
    col.setAttribute('class', 'col-md-6');
    let form_control = document.createElement('div')
    form_control.setAttribute('class', 'form-group');
    let label = document.createElement('label');
    label.innerText = 'IBAN';
    let input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'password');
    input.setAttribute('name', 'iban');
    input.setAttribute('disabled', 'disabled');
    input.setAttribute('placeholder', 'IBAN');
    //input.setAttribute('required', 'required');
    form_control.appendChild(label);
    form_control.appendChild(input);
    col.appendChild(form_control);
    $('#row').append(col);
    return col;
}

function createBIC() {
    let col = document.createElement('div');
    col.setAttribute('class', 'col-md-6');
    let form_control = document.createElement('div')
    form_control.setAttribute('class', 'form-group');
    let label = document.createElement('label');
    label.innerText = 'BIC';
    let input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'password');
    input.setAttribute('name', 'bic');
    input.setAttribute('disabled', 'disabled');
    input.setAttribute('placeholder', 'BIC');
    //input.setAttribute('required', 'required');
    form_control.appendChild(label);
    form_control.appendChild(input);
    col.appendChild(form_control);
    $('#row').append(col);
    return col;
}

function createShort() {
    let col = document.createElement('div');
    col.setAttribute('class', 'col-md-6');
    let form_control = document.createElement('div')
    form_control.setAttribute('class', 'form-group');
    let label = document.createElement('label');
    label.innerText = 'SHORT CODE';
    let input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'password');
    input.setAttribute('name', 'short_code');
    input.setAttribute('placeholder', 'SHORT CODE');
    input.setAttribute('disabled', 'disabled');
    form_control.appendChild(label);
    form_control.appendChild(input);
    col.appendChild(form_control);
    $('#row').append(col);
    return col;
}