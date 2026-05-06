<?php
session_start();

$count = $_GET['count'] ?? 10;

$data = json_decode(file_get_contents("questions.json"), true);
shuffle($data);
$questions = array_slice($data, 0, $count);
?>

<link rel="stylesheet" href="style.css">

<div class="container">
  <div class="card">

    <div class="top-bar">
      <span id="progressText"></span>
      <span id="timer">⏱️ 15</span>
    </div>

    <div class="progress">
      <div class="progress-bar" id="progressBar"></div>
    </div>

    <h2 id="q"></h2>

    <button class="answer" onclick="answer('A')" id="a"></button>
    <button class="answer" onclick="answer('B')" id="b"></button>
    <button class="answer" onclick="answer('C')" id="c"></button>
    <button class="answer" onclick="answer('D')" id="d"></button>

    <p id="feedback"></p>

  </div>
</div>

<script>
let questions = <?php echo json_encode($questions); ?>;
let current = 0;
let score = 0;
let timeLeft = 15;
let timer;

function updateProgress() {
    document.getElementById("progressText").innerText =
        `Question ${current+1} / ${questions.length}`;
    document.getElementById("progressBar").style.width =
        ((current+1)/questions.length)*100 + "%";
}

function startTimer() {
    timeLeft = 15;
    document.getElementById("timer").innerText = "⏱️ " + timeLeft;

    timer = setInterval(() => {
        timeLeft--;
        document.getElementById("timer").innerText = "⏱️ " + timeLeft;

        if (timeLeft <= 0) {
            clearInterval(timer);
            showAnswer(null); // Time's up, no choice
        }
    }, 1000);
}

function loadQuestion() {
    clearInterval(timer);
    let q = questions[current];

    updateProgress();

    document.getElementById("q").innerText = q.question;

    ["a","b","c","d"].forEach((id) => {
        let btn = document.getElementById(id);
        btn.innerText = q[id.toUpperCase()];
        btn.className = "answer";
        btn.classList.remove("correct","wrong","disabled");
    });

    document.getElementById("feedback").innerText = "";

    startTimer();
}

function showAnswer(choice) {
    clearInterval(timer);

    let correct = questions[current].answer;

    ["a","b","c","d"].forEach(id => {
        let btn = document.getElementById(id);
        btn.classList.add("disabled");
    });

    document.getElementById(correct.toLowerCase()).classList.add("correct");

    if (choice && choice === correct) {
        score++;
        document.getElementById("feedback").innerText = "✅ Correct!";
    } else {
        if (choice) {
            document.getElementById(choice.toLowerCase()).classList.add("wrong");
        }
        document.getElementById("feedback").innerText =
            "❌ Wrong! Correct answer: " + correct;
    }

    setTimeout(() => {
        nextQuestion();
    }, 1500);
}

function answer(choice) {
    showAnswer(choice);
}

function nextQuestion() {
    current++;
    if (current < questions.length) {
        loadQuestion();
    } else {
        window.location = "result.php?score=" + score + "&total=" + questions.length;
    }
}

loadQuestion();
</script>
