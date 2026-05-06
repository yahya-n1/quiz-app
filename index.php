<?php session_start(); ?>
<link rel="stylesheet" href="style.css">

<div class="container">
<div class="card">

<h1>🎯 Quiz Master</h1>

<form action="quiz.php" method="GET">
    <label>Number of Questions</label>
    <input type="number" name="count" value="10" min="5" max="20">
    <button>Start Quiz</button>
</form>

<hr>

<a href="profile.php">👤 Profile</a>
<a href="leaderboard.php">🏆 Leaderboard</a>
<a href="logout.php">🚪 Logout</a>

</div>
</div>
