<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSC 335 Quiz App</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background-color: #fff;
      color: #00796b;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .container {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 30px 15px;
      text-align: center;
    }

    .welcome-text {
      font-size: 2.3rem;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .sub-text {
      font-size: 1.1rem;
      margin-bottom: 35px;
      color: #444;
    }

    .start-btn {
      background-color: #00796b;
      color: #fff;
      padding: 12px 25px;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      border: none;
      cursor: pointer;
      transition: background 0.3s ease;
      margin-top: 1rem;
    }

    .start-btn:hover {
      background-color: #005f56;
    }

    .footer {
      background-color: #00796b;
      color: white;
      text-align: center;
      padding: 12px 10px;
      font-size: 14px;
      font-weight: 500;
      margin-top: 40px;
    }

    @media (max-width: 600px) {
      .welcome-text {
        font-size: 2rem;
      }

      .sub-text {
        font-size: 1rem;
      }

      .start-btn {
        padding: 10px 22px;
        font-size: 0.95rem;
      }
    }

    @media (max-width: 360px) {
      .welcome-text {
        font-size: 1.7rem;
      }

      .sub-text {
        font-size: 0.95rem;
      }

      .start-btn {
        padding: 10px 18px;
        font-size: 0.9rem;
      }

      .footer {
        background-color: #00796b;
        color: white;
        text-align: center;
        padding: 12px 10px;
        font-size: 14px;
        font-weight: 500;
        margin-top: 40px;

      }

    }

    /* Logout-Btn Styling */
  </style>
</head>

<body>

  <div class="logoutBtn">
    <form action="" method="post">
      <?php
      require "../csc-335-quiz-app/database.php";

      if (isset($_POST["logoutBtn"])) {
        session_unset();
        session_destroy();
        header("location:../csc-335-quiz-app/login.php");
        exit();
      }
      ?>
      <input type="submit" value="Logout" name="logoutBtn" class="styled-logout">
    </form>
  </div>

  <style>
    .logoutBtn {
      display: flex;
      justify-content: flex-start;
      margin-top: 30px;
      margin-left: 1rem;
    }

    .styled-logout {
      background-color: #ff4d4d;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .styled-logout:hover {
      background-color: #e60000;
    }
  </style>


  <div class="container">

    <div class="profile-circle">
      <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png"
        alt="User Icon"
        style="width: 180px; height: 180px; filter: brightness(0) invert(1);">
    </div>


    <style>
      .profile-circle {
        width: 200px;
        height: 200px;
        background-color: #00796b;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: flex-end;
      }

      .profile-circle img {
        width: 100%;
        height: auto;
        object-fit: contain;
        margin-bottom: 10px;
      }
    </style>


    <div class="username">

      <?php
      if (isset($_SESSION["quiz_id"])) {
        $quiz_id = $_SESSION["quiz_id"];

        $getQuizId = mysqli_query($connection, "SELECT * FROM quiz_tb WHERE id = '$quiz_id' ");

        $fetchQuizId = mysqli_fetch_assoc($getQuizId);

        $Firstname = $fetchQuizId['firstname'];
        $Lastname = $fetchQuizId['lastname'];

        $fullname = $Firstname . " " . $Lastname;
      }

      ?>

      <p style="font-weight:bold; margin-top: 10px; font-size: 20px;">Welcome, Dear</p> <?php echo $fullname; ?>
    </div>

    <!-- <h1 class="welcome-text">Welcome to CSC 335 Quiz App</h1>
    <p class="sub-text">Group 13’s Software Engineering Project</p> -->
    <button class="start-btn" onclick="startQuiz()">Start Quiz</button>
  </div>

  <!-- <footer class="footer">
    Designed by Group 13 - CSC 335 Project Team.
    <br>
    copyright &#169 2025.
  </footer> -->

  <script src="../csc-335-quiz-app/navigation.js"></script>

  <script>
    function startQuiz() {
      window.location.href = "../csc-335-quiz-app/app.php";
    }
  </script>
</body>

</html>