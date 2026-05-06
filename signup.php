<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST["username"];
    $p = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $conn->query("INSERT INTO users (username,password) VALUES ('$u','$p')");
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Sign Up</h2>

        <form method="POST">
            <input name="username" placeholder="Username" required>
            <input name="password" type="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>

        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</div>

</body>
</html>
