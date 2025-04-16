<?php
require 'db_handler.php';

$trip_id = $_POST['trip_id'];
$company = $_POST['company'];
$type = $_POST['type'];
$cost = $_POST['cost'];
$departure = $_POST['departure_datetime'] ?? null;
$arrival = $_POST['arrival_datetime'] ?? null;
$from = $_POST['departure_location'] ?? null;
$to = $_POST['arrival_location'] ?? null;

try {
    $stmt = $pdo->prepare("INSERT INTO transport (trip_id, company, type, cost, departure_datetime, arrival_datetime, departure_location, arrival_location)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$trip_id, $company, $type, $cost, $departure, $arrival, $from, $to]);

    header("Location: dashboard.php?trip_id=$trip_id&added=transport");
    exit;
} catch (PDOException $e) {
    echo "Error adding transport: " . $e->getMessage();
}
?>
