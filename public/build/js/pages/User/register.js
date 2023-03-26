// $(document).ready(function() {

//     $("#msg-password").css("display", "none");

// });

//VALIDATION ONKEYUP - PASSWORD
$("#msg-password").css("display", "none");
$("#msg-pengesahan-katalaluan").css("display", "none");

function validatePassword(inputName, msgName) {

    var input = document.getElementById(inputName);
    var minlength = "minlength";
    var lowercase = "lowercase";
    var uppercase = "uppercase";
    var number = "number";
    var symbol = "symbol";
    var counterValid = 0;
    
    if(input.value != ""){       
        $("#msg-info-katalaluan").css("display", "none");
        $("#"+msgName).css("display", "block");
    }else{
        $("#msg-info-katalaluan").css("display", "block");    
        $("#"+msgName).css("display", "none");    
    }

    // Validate length
    if(input.value.length >= 12) {
        if($("#"+minlength).hasClass("invalid")){
            $("#"+minlength).removeClass("invalid");
            $("#"+minlength).addClass("valid");
            $("#minlength").hide();
        }
        counterValid++;
    } else {
        if($("#"+minlength).hasClass("valid")){
            $("#"+minlength).removeClass("valid");
            $("#"+minlength).addClass("invalid");
            $("#minlength").show();
        }
        counterValid--;
    }

    // Validate lowercase lowercases
    var lowerCaseLetters = /[a-z]/g;
    if(input.value.match(lowerCaseLetters)) {  
        if($("#"+lowercase).hasClass("invalid")){
            $("#"+lowercase).removeClass("invalid");
            $("#"+lowercase).addClass("valid");
            $("#lowercase").hide();
        }
        counterValid++;
    } else {
        if($("#"+lowercase).hasClass("valid")){
            $("#"+lowercase).removeClass("valid");
            $("#"+lowercase).addClass("invalid");
            $("#lowercase").show();
        }
        counterValid--;
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(input.value.match(upperCaseLetters)) {  
        if($("#"+uppercase).hasClass("invalid")){
            $("#"+uppercase).removeClass("invalid");
            $("#"+uppercase).addClass("valid");
            $("#uppercase").hide();
        }
        counterValid++;
    } else {
        if($("#"+uppercase).hasClass("valid")){
            $("#"+uppercase).removeClass("valid");
            $("#"+uppercase).addClass("invalid");
            $("#uppercase").show();
        }
        counterValid--;
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if(input.value.match(numbers)) {  
        if($("#"+number).hasClass("invalid")){
            $("#"+number).removeClass("invalid");
            $("#"+number).addClass("valid");
            $("#number").hide();
        }
        counterValid++;
    } else {
        if($("#"+number).hasClass("valid")){
            $("#"+number).removeClass("valid");
            $("#"+number).addClass("invalid");
            $("#number").show();
        }
        counterValid--;
    }

    // Validate symbol
    var symbols = /[!@#$%^&*_-]/g;
    if(input.value.match(symbols)) {
        if($("#"+symbol).hasClass("invalid")){
            $("#"+symbol).removeClass("invalid");
            $("#"+symbol).addClass("valid");
            $("#symbol").hide();
        }
        counterValid++;
    } else {
        if($("#"+symbol).hasClass("valid")){
            $("#"+symbol).removeClass("valid");
            $("#"+symbol).addClass("invalid");
            $("#symbol").show();
        }
        counterValid--;
    }

    // if(counterValid>0){
        
    //     $("#confirm_password").prop('disabled', false);
    //     $("#msg-pengesahan-katalaluan").css("display", "block");
    // }else{  
    //     $("#confirm_password").prop('disabled', true);
    //     $("#msg-pengesahan-katalaluan").css("display", "none");
    // }

}
