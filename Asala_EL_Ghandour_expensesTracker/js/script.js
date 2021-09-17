$(document).ready(function () { 
    $("#login").click( function () {
        console.log("login");
        var formElement = $("#loginForm");
        var userValid = false;
        var passLen = false;
        var userValue = $("#username").val();
        console.log(formElement);
        console.log(userValue);
        if (
            userValue.length >= 5
        ){
            userValid = true;
        }
        console.log(userValid);
        if ($("#password").val().length >= 5) {
            passLen = true;
        }
        if(!userValid){
            alert("The username should be at least 5 characters long");
        }
        if(!passLen){
            alert("The password should be at least 5 characters long");
        }
        if(userValid && passLen){
            formElement.submit();
        }
    });

    $("#signup").click( function () {
        var formElement = $("#SignupForm");
        var username = $("#username").val();
        var password = $("#password").val();
        var confirmPass = $("#confirmPass").val();
        userValid = false;
        passwordValid = false;
        confirmPassValid = false;
        //username validation
        if (username.length >= 5){
                userValid = true;
        }
        if(!userValid){
            alert("The username should be at least 5 characters long");
        }
        //password validation
        if (password.length >= 5) {
            passwordValid = true;
        }
        if(!passwordValid){
            alert("The password must be at least 5 characters long");
        }
        //confirmPass validation
        if (password == confirmPass) {
            confirmPassValid = true;
        }
        if(!confirmPassValid){
            alert("The confirm password doesn't match the password");
        }
        if(userValid && passwordValid && confirmPassValid){
            formElement.submit();
        }
    });
});
