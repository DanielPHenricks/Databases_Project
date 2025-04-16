<?php
require 'db_handler.php';

$trip_id = $_POST['trip_id'];
$name = $_POST['name'];
$cost = $_POST['cost'];
$location = $_POST['location'] ?? null;
$duration = $_POST['duration_hours'] ?? null;

try {
    $stmt = $pdo->prepare("INSERT INTO activites (trip_id, name, cost, location, duration_hours)
                           VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$trip_id, $name, $cost, $location, $duration]);

    header("Location: dashboard.php?trip_id=$trip_id&added=activity");
    exit;
} catch (PDOException $e) {
    echo "Error adding activity: " . $e->getMessage();
}
?>
