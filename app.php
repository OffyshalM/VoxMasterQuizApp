<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>csc335-QUIZAPP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="app.css" />
  <style>
    .timer-wrapper {
      position: relative;
      width: 100px;
      height: 100px;
      margin: 10px auto;
    }

    .circular-timer {
      width: 100px;
      height: 100px;
      background: conic-gradient(#00796b calc(var(--percent) * 1%), #eee 0%);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 16px;
      color: #333;
    }

    #resultContainer {
      padding: 20px;
      background-color: #f7f7f7;
      border: 1px solid #ccc;
      margin: 20px auto;
      width: 90%;
      max-width: 600px;
      border-radius: 10px;
    }

    #resultContainer h2 {
      text-align: center;
      color: #333;
    }

    #resultContainer p {
      margin: 5px 0;
      font-size: 14px;
    }

    #resultContainer hr {
      margin: 10px 0;
    }

    /*Screen reader Styling*/

    .screen-reader-btn {
      display: flex;
      gap: 8px;
      margin-top: 10px;
      margin-bottom: 1rem;
    }

    .pauseBtn {
      background-color: #f0ad4e;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 20px;
      cursor: pointer;
    }

    .resumeBtn {
      background-color: #5cb85c;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 20px;
      cursor: pointer;
    }

    .stopBtn {
      background-color: #f90800ff;
      /* background-color: #d9534f; */
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 20px;
      cursor: pointer;
    }

    .screen-reader-btn input:hover {
      opacity: 0.9;
    }
  </style>
</head>

<body>


  <header class="courseTitle" id="courseTitle">CSC 335 - Software Engineering</header>

  <div class="timeUp" id="timeUp" style="display: none;">Time Up!</div>

  <div class="timer-wrapper">
    <div class="circular-timer" id="circularTimer">
      <span id="timer">01:40</span>
    </div>
  </div>

  <main class="questionContainer" id="questionContainer">

  </main>

  <section class="optionContainer" id="optionContainer">

  </section>

  <div class="buttonsContainer">
    <button class="prev" id="prevBtn">Prev</button>
    <button class="next" id="nextBtn">Next</button>
    <button class="submit" id="submitBtn" style="display: none;">Submit</button>
  </div>

  <button class="restartQuiz" id="restartQuiz" style="display: none;">Restart Quiz</button>

  <div class="screen-reader-btn" id="screenReaderBtn">
    <input type="button" onclick="pauseBtn()" value="Pause" id="pauseBtn" class="pauseBtn">
    <input type="button" value="Resume" onclick="resumeBtn()" id="resumeBtn" class="resumeBtn">
    <input type="button" value="Stop" id="stopBtn" onclick="stopBtn()" class="stopBtn">
  </div>

</body>

<script src="app.js"></script>

</html>