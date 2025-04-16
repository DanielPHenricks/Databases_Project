<?php
require 'db_handler.php';

$stmt = $pdo->query("SELECT * FROM trips");
$trips = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>All Trips</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="content">
  <h2>All Trips</h2>
  <ul>
    <?php foreach ($trips as $trip): ?>
      <li>
        <a href="dashboard.php?trip_id=<?= $trip['trip_id'] ?>">Trip #<?= $trip['trip_id'] ?> - Max Budget: $<?= $trip['max_budget'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>

  <hr>
  <h3>Create a New Trip</h3>
  <form action="submit_trip.php" method="POST">
    <label>Max Budget ($):</label>
    <input type="number" step="0.01" name="max_budget" required><br>
    <label>Max Transport Budget ($):</label>
    <input type="number" step="0.01" name="max_transport"><br>
    <label>Max Accommodation Budget ($):</label>
    <input type="number" step="0.01" name="max_accommodation"><br>
    <label>Max Activity Budget ($):</label>
    <input type="number" step="0.01" name="max_activities"><br>
    <label>Food Budget ($):</label>
    <input type="number" step="0.01" name="food_cost"><br>
    <button type="submit">Create Trip</button>
  </form>
</div>
</body>
</html>
