function loginValidation() {
    let error = "";
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();

    let isValid = true;

    if (email === "" || password === "") {
        error += "Fill out all login fields!<br>";
        isValid = false;
    }

    let emailValidate = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email !== "" && !emailValidate.test(email)) {
        error += "Invalid email address!<br>";
        isValid = false;
    }

    if (password !== "" && password.length < 6) {
        error += "Password must contain at least 6 characters!<br>";
        isValid = false;
    }

    document.getElementById("error").innerHTML = error;

    return isValid;
}
