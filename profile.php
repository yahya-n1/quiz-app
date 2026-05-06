<?php
session_start();
include "db.php";

$id = $_SESSION["user_id"];
$res = $conn->query("SELECT * FROM scores WHERE user_id=$id ORDER BY id DESC");
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>👤 Your History</h2>

<?php while ($row = $res->fetch_assoc()) { ?>
    <p>Score: <?php echo $row["score"] . "/" . $row["total_questions"]; ?></p>
<?php } ?>

<a href="index.php">🏠 Back</a>
</div>
