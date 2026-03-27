<?php require "../csc-335-quiz-app/database.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["loginBtn"])) {
    $email = $_POST["email"];
    $plainPassword = $_POST["password"];

    $query = mysqli_query($connection, "SELECT * FROM quiz_tb WHERE email='$email'");

    if (mysqli_num_rows($query) === 1) {
        $user = mysqli_fetch_assoc($query);
        $hashedPassword = $user['password'];

        if (password_verify($plainPassword, $hashedPassword)) {
            $_SESSION["quiz_id"] = $user["id"];
            header("Location: ../csc-335-quiz-app/index.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Email not found.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSC 335 Quiz App</title>
    <link rel="stylesheet" href="../csc-335-quiz-app/login.css">
</head>

<body>

    <div class="auth-header">
        <a href="../csc-335-quiz-app/signup.php" class="signup-btn">Sign Up</a>
    </div>
    <div class="container">
        <h1 class="welcome-text">Welcome to CSC 335 Quiz App</h1>

        <form onsubmit="return loginValidation()" action="" method="post" class="login-form">
            <input type="text" placeholder="Email" name="email" id="email">
            <input type="password" placeholder="Password" name="password" id="password">
            <input type="submit" value="Login" name="loginBtn">
        </form>
        <div id="error" style="color: red;"></div>

    </div>

    <footer class="footer">
        Designed by Group 13 - CSC 335 Project Team.
        <br>
        copyright &#169 2025.
    </footer>
</body>
<script src="../csc-335-quiz-app/login.js"></script>

</html>