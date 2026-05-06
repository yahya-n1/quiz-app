<?php
session_start();
include "db.php";

$score = $_GET["score"];
$total = $_GET["total"];
$user_id = $_SESSION["user_id"];

$conn->query("INSERT INTO scores (user_id, score, total_questions)
VALUES ($user_id, $score, $total)");
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<div class="card">

<h1>🎉 Results</h1>

<h2><?php echo "$score / $total"; ?></h2>

<button onclick="location.href='quiz.php'">🔁 Play Again</button>
<button onclick="location.href='index.php'">🏠 Home</button>

</div>
</div>
