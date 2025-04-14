<?php
require 'db_handler.php';
$trip_id = $_GET['trip_id'];

// Fetch trip
$trip = $pdo->prepare("SELECT * FROM trips WHERE trip_id = ?");
$trip->execute([$trip_id]);
$trip = $trip->fetch();

// Totals
function getTotal($pdo, $table, $trip_id) {
    $stmt = $pdo->prepare("SELECT SUM(cost) as total FROM $table WHERE trip_id = ?");
    $stmt->execute([$trip_id]);
    return $stmt->fetchColumn() ?: 0;
}

$totalTransport = getTotal($pdo, 'transport', $trip_id);
$totalAccommodation = getTotal($pdo, 'accomodations', $trip_id);
$totalActivities = getTotal($pdo, 'activites', $trip_id);
$total = $totalTransport + $totalAccommodation + $totalActivities + $trip['food_cost'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Trip Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="content">
  <h2>Trip #<?= $trip_id ?> Dashboard</h2>

  <h3>Budget Summary</h3>
  <ul>
    <li>Total Transport: $<?= $totalTransport ?> / <?= $trip['max_transport'] ?? 'N/A' ?></li>
    <li>Total Accommodation: $<?= $totalAccommodation ?> / <?= $trip['max_accommodation'] ?? 'N/A' ?></li>
    <li>Total Activities: $<?= $totalActivities ?> / <?= $trip['max_activities'] ?? 'N/A' ?></li>
    <li>Food: $<?= $trip['food_cost'] ?></li>
    <li><strong>Grand Total:</strong> $<?= $total ?> / <?= $trip['max_budget'] ?? 'N/A' ?></li>
  </ul>

  <h3>Alerts</h3>
  <?php
  if ($trip['max_budget'] && $total > $trip['max_budget']) echo "<p class='alert'>⚠️ Total exceeds max budget!</p>";
  if ($trip['max_transport'] && $totalTransport > $trip['max_transport']) echo "<p class='alert'>🚨 Transport over budget!</p>";
  if ($trip['max_accommodation'] && $totalAccommodation > $trip['max_accommodation']) echo "<p class='alert'>🚨 Accommodation over budget!</p>";
  if ($trip['max_activities'] && $totalActivities > $trip['max_activities']) echo "<p class='alert'>🚨 Activities over budget!</p>";
  ?>
</div>
</body>
</html>
