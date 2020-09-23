var col = undefined;
var col_two = undefined;

let input_first_value = $('meta[name="first_key"]').attr('content');
let input_second_value = $('meta[name="second_key"]').attr('content');

$(document).ready(function () {

    (function ($) {
        "use strict";
        let credit = $('#credit').text();
        $('#fee').text(10 * (credit / 100));
        $('#total').text(credit - (10 * (credit / 100)));
        
        

        // Country is India at the beginning
        createInputs($('select').val());

            // On country change, change IFSC to other codes
            $('select').on('change', function () {
                let value = $('select').val();
                col.remove();
                input_first_value = '';
                input_second_value = '';
                if (col_two != undefined)
                    col_two.remove();
                createInputs(value);

            });
        $('#payout').click(function () {
            window.location = "/main/payout"
        });

        jQuery.validator.addMethod("alpha", function (value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
        });
        // validate contactForm form
        $(function () {
            $('#contactForm').validate({
                rules: {
                    old_password: {
                        minlength: 8
                    },
                    old_password : {
                        minlength: 8
                    },
                    email: {
                        required: true
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
                    new_password: { minlength: "Your title must consist of at least 8 characters" },
                    old_password: { minlength: "Your title must consist of at least 8 characters" },
                    confirm_password: {
                        minlength: "Your title must consist of at least 8 characters",
                        equalTo: "New Password and Confirm password should match"
                    },

                }
            })
        })

    })(jQuery)
});

function createInputs(value) {
    if (value == 'aus')
        col = createAcc(input_first_value);
    else if (value == 'ind') {
        col_two = createAcc(input_first_value);
        col = createIFSC(input_second_value);
    } else if (value == 'uk') {
        col_two = createAcc(input_first_value);
        col = createShort(input_second_value);
    } else if (value == 'bel' || value == 'fra' || value == 'ger' || value == 'fin')
        col = createIBAN(input_first_value);
    else if (value == 'jap' || value == 'can') {
        col = createIBAN(input_first_value);
        col_two = createBIC(input_second_value);
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
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'ifsc');
    input.setAttribute('placeholder', 'IFSC CODE');
    input.setAttribute('required', 'required');
    form_control.appendChild(label);
    form_control.appendChild(input);
    col.appendChild(form_control);
    $('#row').append(col);
    return col;
}

function createAcc(value) {
    let col = document.createElement('div');
    col.setAttribute('class', 'col-md-6');
    let form_control = document.createElement('div')
    form_control.setAttribute('class', 'form-group');
    let label = document.createElement('label');
    label.innerText = 'Account Number';
    let input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'ac_number');
    input.setAttribute('value', value);
    input.setAttribute('placeholder', 'Account Number');
    input.setAttribute('required', 'required');
    form_control.appendChild(label);
    form_control.appendChild(input);
    col.appendChild(form_control);
    $('#row').append(col);
    return col;
}

function createIBAN(value) {
    let col = document.createElement('div');
    col.setAttribute('class', 'col-md-6');
    let form_control = document.createElement('div')
    form_control.setAttribute('class', 'form-group');
    let label = document.createElement('label');
    label.innerText = 'IBAN';
    let input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'iban');
    input.setAttribute('placeholder', 'IBAN');
    input.setAttribute('required', 'required');
    form_control.appendChild(label);
    form_control.appendChild(input);
    col.appendChild(form_control);
    $('#row').append(col);
    return col;
}

function createBIC(value) {
    let col = document.createElement('div');
    col.setAttribute('class', 'col-md-6');
    let form_control = document.createElement('div')
    form_control.setAttribute('class', 'form-group');
    let label = document.createElement('label');
    label.innerText = 'BIC';
    let input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'bic');
    input.setAttribute('placeholder', 'BIC');
    input.setAttribute('required', 'required');
    form_control.appendChild(label);
    form_control.appendChild(input);
    col.appendChild(form_control);
    $('#row').append(col);
    return col;
}

function createShort(value) {
    let col = document.createElement('div');
    col.setAttribute('class', 'col-md-6');
    let form_control = document.createElement('div')
    form_control.setAttribute('class', 'form-group');
    let label = document.createElement('label');
    label.innerText = 'SHORT CODE';
    let input = document.createElement('input');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'short_code');
    input.setAttribute('placeholder', 'SHORT CODE');
    input.setAttribute('required', 'required');
    form_control.appendChild(label);
    form_control.appendChild(input);
    col.appendChild(form_control);
    $('#row').append(col);
    return col;
}