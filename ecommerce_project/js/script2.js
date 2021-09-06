$(document).ready(function () { 
    $("#add_product").on("click", function(){
        var image = $('#image').val();
        var name = $('#name').val();
        var description = $('#description').val();
        var price = $('#price').val();
        var quantity = $('#quantity').val();
        var weight = $('#weight').val();
        var production = $('#production').val();
        var expiry = $('#expiry').val();
        var type = $('#type').val();
        var error = false;
        if (name == ""){
            $("#name_error #error").text("Please enter the name/brand of the product!")
            $("#name_error").show();
            error = true;
        }
        if (price == ""){
            $("#price_error #perror").text("Please enter the price of the product!")
            $("#price_error").show();
            error = true;
        }

        if (description == ""){
            $("#desc_error #derror").text("Please enter the description of the product!")
            $("#desc_error").show();
            error = true;
        }

        if (weight == ""){
            $("#weight_error #werror").text("Please enter the weight of the product! If weight is not specified enter 0")
            $("#weight_error").show();
            error = true;
        }

        if (quantity == ""){
            $("#quantity_error #qerror").text("Please enter the quantity of the product!")
            $("#quantity_error").show();
            error = true;
        }


        
        if (image == ""){
            $("#image_error #ierror").text("Please add the image of the product!")
            $("#image_error").show();
            error = true;
        }
/*         else{
            var extension = image.split(".").pop().toLowerCase();
            if (!(jQuery.inArray(extension, ['gif','png','jpg','jpeg'])==-1)) {
                error = true;
            }
        } */

        if(!error){
            $("#add_productF").submit();
        }
    });

    $("#loginB").click( function () {
        console.log("login");
        var formElement = $("#loginF");
        var emailValid = false;
        var passlen = false;
        var emailValue = $("#email").val();
        if (
            emailValue.length > 5 &&
            emailValue.lastIndexOf(".") > emailValue.lastIndexOf("@") &&
            emailValue.lastIndexOf("@") != -1
        ){
            emailValid = true;
        }
        if ($("#password").val().length > 5) {
            passlen = true;
        }
        if(!emailValid){
            $("#email_validate #error").text("please enter a valid email");
            $("#email_validate").show();
        }else{
            $("#email_validate").hide();
        }
        if(!passlen){
            $("#password_validate #perror").text("the password must be at least 5 characters long");
            $("#password_validate").show();
        }else{
            $("#password_validate").hide();
        }
        if(emailValid && passlen){
            formElement.submit();
        }
    });

    $("#customerSignUp").click( function () {
        var formElement = $("#customerSignUpF");
        var firstName = $("#c_first_name").val();
        var lastName = $("#c_last_name").val();
        var phone = $("#c_phone").val();
        var email = $("#c_email").val();
        var password = $("#c_password").val();
        var confirmPass = $("#c_confirmPass").val();
        fnameValid = false;
        lnameValid = false;
        phoneValid = false;
        emailValid = false;
        passwordValid = false;
        confirmPassValid = false;
        //first name validation
        if (firstName.length >= 3) {
            fnameValid = true;
        }
        if(!fnameValid){
            $("#c_fname_error #cfnerror").text("Please enter your first name");
            $("#c_fname_error").show();
        }else{
            $("#c_fname_error").hide();
        }
        // last name validation
        if (lastName.length >= 3) {
            lnameValid = true;
        }
        if(!lnameValid){
            $("#c_lname_error #clnerror").text("Please enter your last name");
            $("#c_lname_error").show();
        }else{
            $("#c_lname_error").hide();
        }
        //phone nb validation
        //shortest phone number possible with the country code is 7 
        if (phone.length >= 7 && $.isNumeric(phone)) {
            phoneValid = true;
        }
        if(!phoneValid){
            $("#c_phone_error #cperror").text("The phone number you entered is not valid");
            $("#c_phone_error").show();
        }else{
            $("#c_phone_error").hide();
        }
        //email validation
        if (email.length > 5 && email.lastIndexOf(".") > email.lastIndexOf("@") && email.lastIndexOf("@") != -1){
                emailValid = true;
        }
        if(!emailValid){
            $("#c_email_error #cerror").text("please enter a valid email");
            $("#c_email_error").show();
        }else{
            $("#c_email_error").hide();
        }
        //password validation
        if (password.length > 5) {
            passwordValid = true;
        }
        if(!passwordValid){
            $("#c_pass_error #cperror").text("the password must be at least 5 characters long");
            $("#c_pass_error").show();
        }else{
            $("#c_pass_error").hide();
        }
        //confirmPass validation
        if (password == confirmPass) {
            confirmPassValid = true;
        }
        if(!confirmPassValid){
            $("#c_cpass_error #ccperror").text("the confirm password doesnot match the password");
            $("#c_cpass_error").show();
        }else{
            $("#c_cpass_error").hide();
        }
        if(fnameValid && lnameValid && phoneValid && emailValid && passwordValid && confirmPassValid){
            formElement.submit();
        }
    });
    $("#storeSignUp").click( function () {
        var formElement = $("#storeSignUpF");
        var name = $("#name").val();
        var owner = $("#owner").val();
        var phone = $("#phone_nb").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirmPass = $("#confirmPass").val();
        nameValid = false;
        ownerValid = false;
        phoneValid = false;
        emailValid = false;
        passwordValid = false;
        confirmPassValid = false;
        //first name validation
        if (name.length >= 3) {
            nameValid = true;
        }
        if(!nameValid){
            $("#name_error #nerror").text("Please enter your first name");
            $("#name_error").show();
        }else{
            $("#name_error").hide();
        }
        // last name validation
        if (owner.length >= 3) {
            ownerValid = true;
        }
        if(!ownerValid){
            $("#owner_error #oerror").text("Please enter your last name");
            $("#owner_error").show();
        }else{
            $("#owner_error").hide();
        }
        //phone nb validation
        //shortest phone number possible with the country code is 7 
        if (phone.length >= 7 && $.isNumeric(phone)) {
            phoneValid = true;
        }
        if(!phoneValid){
            $("#phone_error #perror").text("The phone number you entered is not valid");
            $("#phone_error").show();
        }else{
            $("#phone_error").hide();
        }
        //email validation
        if (email.length > 5 && email.lastIndexOf(".") > email.lastIndexOf("@") && email.lastIndexOf("@") != -1){
                emailValid = true;
        }
        if(!emailValid){
            $("#email_error #error").text("please enter a valid email");
            $("#email_error").show();
        }else{
            $("#email_error").hide();
        }
        //password validation
        if (password.length > 5) {
            passwordValid = true;
        }
        if(!passwordValid){
            $("#pass_error #perror").text("the password must be at least 5 characters long");
            $("#pass_error").show();
        }else{
            $("#pass_error").hide();
        }
        //confirmPass validation
        if (password == confirmPass) {
            confirmPassValid = true;
        }
        if(!confirmPassValid){
            $("#cpass_error #cperror").text("the confirm password does not match the password");
            $("#cpass_error").show();
        }else{
            $("#cpass_error").hide();
        }
        if(nameValid && ownerValid && phoneValid && emailValid && passwordValid && confirmPassValid){
            formElement.submit();
        }
    });

    $("#viewCart").mouseover(function(){
        $.ajax({
            url: "header1.php",
            method: "GET",
            success: function (data) {
                $("#cartitem").html(data);
            }
        })
    })
});

