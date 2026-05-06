<?php
include "db.php";

$res = $conn->query("
SELECT users.username, MAX(scores.score) as best
FROM scores
JOIN users ON users.id = scores.user_id
GROUP BY users.id
ORDER BY best DESC
LIMIT 10
");
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>🏆 Leaderboard</h2>

<?php while ($row = $res->fetch_assoc()) { ?>
    <p><?php echo $row["username"] . " - " . $row["best"]; ?></p>
<?php } ?>

<a href="index.php">🏠 Back</a>
</div>
