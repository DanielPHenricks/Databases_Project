<?php
require 'db_handler.php';

$stmt = $pdo->prepare("INSERT INTO trips (food_cost, max_budget, max_transport, max_accommodation, max_activities)
                       VALUES (?, ?, ?, ?, ?)");
$stmt->execute([
    $_POST['food_cost'],
    $_POST['max_budget'],
    $_POST['max_transport'],
    $_POST['max_accommodation'],
    $_POST['max_activities']
]);

$trip_id = $pdo->lastInsertId();
header("Location: dashboard.php?trip_id=$trip_id");
exit;
?>

