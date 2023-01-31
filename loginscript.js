function validateForm() {
    // form inputs
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password2 = document.getElementById("password2").value;
    var errorUsername = document.getElementById("username").nextElementSibling;
    var errorEmail = document.getElementById("email").nextElementSibling;
    var errorPassword = document.getElementById("password").nextElementSibling;
    var errorPassword2 = document.getElementById("password2").nextElementSibling;

    // checking if the inputs are empty
    if (username == "") {
        errorUsername.innerHTML = "Username is required";
        errorUsername.style.display = "block";
        return false;
    }else{
        errorUsername.style.display = "none";
    }
    if (email == "") {
        errorEmail.innerHTML = "Email is required";
        errorEmail.style.display = "block";
        return false;
    }else{
        errorEmail.style.display = "none";
    }
    if (password == "") {
        errorPassword.innerHTML = "Password is required";
        errorPassword.style.display = "block";
        return false;
    }else{
        errorPassword.style.display = "none";
    }
    if (password2 == "") {
        errorPassword2.innerHTML = "Password is required";
        errorPassword2.style.display = "block";
        return false;
    }else{
        errorPassword2.style.display = "none";
    }

    // checking if the passwords match
    if (password != password2) {
        errorPassword2.innerHTML = "Passwords do not match";
        errorPassword2.style.display = "block";
        return false;
    }else{
        errorPassword2.style.display = "none";
    }

    // checking if email is valid
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(email)) {
        errorEmail.innerHTML = "Invalid email";
        errorEmail.style.display = "block";
        return false;
    }else{
        errorEmail.style.display = "none";
    }

    

}
