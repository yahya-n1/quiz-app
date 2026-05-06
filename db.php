<?php
$conn = new mysqli("sql212.infinityfree.com", "if0_41828187", "Quizappgd", "if0_41828187_quiz_app");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
