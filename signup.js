function signupValidation() {
    let errorMessages = "";

    let firstname = document.getElementById("firstname").value.trim();
    let lastname = document.getElementById("lastname").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();

    let isValid = true;

    if (firstname === "" || lastname === "" || email === "" || password === "") {
        errorMessages += "Fill out all signup fields!<br>";
        isValid = false;
    }

    let emailValidate = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email !== "" && !emailValidate.test(email)) {
        errorMessages += "Invalid email address!<br>";
        isValid = false;
    }

    if (password !== "" && password.length < 6) {
        errorMessages += "Password must contain at least 6 characters!<br>";
        isValid = false;
    }

    displayError(errorMessages);
    return isValid;
}

function displayError(msg) {
    document.getElementById("error").innerHTML = msg;
}