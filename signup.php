<?php
require "../csc-335-quiz-app/database.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["signupBtn"])) {
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $userData = mysqli_query($connection, "INSERT INTO quiz_tb (firstname, lastname, email, password) 
        VALUES ('$Firstname', '$Lastname', '$email', '$password')");

    if ($userData) {
        $getUser = mysqli_query($connection, "SELECT * FROM quiz_tb WHERE email = '$email' LIMIT 1");
        if ($getUser && mysqli_num_rows($getUser) > 0) {
            $user = mysqli_fetch_assoc($getUser);

            $_SESSION["quiz_id"] = $user["id"];
        }

        header("Location: ../csc-335-quiz-app/index.php");
        exit();
    } else {
        echo "Error occurred during signup.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSC 335 Quiz App</title>
    <link rel="stylesheet" href="../csc-335-quiz-app/signup.css">
</head>
<body>

<div class="container">
    <div class="auth-header">
        <a href="../csc-335-quiz-app/login.php" class="signup-btn">Back</a>
    </div>
    <h1 class="welcome-text">Welcome to CSC 335 Quiz App</h1>
    <p class="sub-text">Sign Up Here</p>

    <form onsubmit="return signupValidation()" method="post" class="signup-form" required>
        <input type="text" id="firstname" name="Firstname" placeholder="Firstname" required>
        <input type="text" id="lastname" name="Lastname" placeholder="Lastname" required>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="submit" id="submitBtn" name="signupBtn" value="Sign Up">
    </form>

    <div id="error" style="color: red;"></div>
</div>

<footer class="footer">
    Designed by Group 13 - CSC 335 Project Team.
    <br>
    copyright &#169 2025.
</footer>

<script src="../csc-335-quiz-app/signup.js"></script>
</body>
</html>
