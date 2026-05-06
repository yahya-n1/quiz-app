<?php
session_start();
include "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST["username"];
    $p = $_POST["password"];

    $res = $conn->query("SELECT * FROM users WHERE username='$u'");
    $user = $res->fetch_assoc();

    if ($user && password_verify($p, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid login";
    }
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
        <h2>Login</h2>

        <?php if ($error) echo "<p>$error</p>"; ?>

        <form method="POST">
            <input name="username" placeholder="Username" required>
            <input name="password" type="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
</div>

</body>
</html>
