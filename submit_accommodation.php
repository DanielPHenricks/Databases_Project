<?php
require 'db_handler.php';

$trip_id = $_POST['trip_id'];
$name = $_POST['name'];
$cost = $_POST['cost'];
$check_in = $_POST['check_in'] ?: null;
$number_of_days = $_POST['number_of_days'];
$address = $_POST['address'] ?? null;

try {
    $stmt = $pdo->prepare("INSERT INTO accomodations (trip_id, name, cost, check_in, number_of_days, address)
                           VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$trip_id, $name, $cost, $check_in, $number_of_days, $address]);

    // Redirect back to dashboard with success message
    header("Location: dashboard.php?trip_id=$trip_id&added=accommodation");
    exit;
} catch (PDOException $e) {
    echo "Error adding accommodation: " . $e->getMessage();
}
?>
