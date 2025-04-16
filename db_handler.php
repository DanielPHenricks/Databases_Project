<?php
$host = 'localhost';
$db   = 'trip_cost';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to check budget
function checkBudget($trip_id, $pdo) {
    $stmt = $pdo->prepare("
        SELECT 
            t.max_total_budget,
            t.max_transport_budget,
            t.max_accommodation_budget,
            t.max_activities_budget,
            COALESCE(SUM(tr.cost), 0) as total_transport,
            COALESCE(SUM(a.cost), 0) as total_accommodation,
            COALESCE(SUM(act.cost), 0) as total_activities,
            t.food_cost
        FROM trips t
        LEFT JOIN transport tr ON tr.trip_id = t.trip_id
        LEFT JOIN accommodations a ON a.trip_id = t.trip_id
        LEFT JOIN activities act ON act.trip_id = t.trip_id
        WHERE t.trip_id = ?
        GROUP BY t.trip_id
    ");
    $stmt->execute([$trip_id]);
    return $stmt->fetch();
}
?>
