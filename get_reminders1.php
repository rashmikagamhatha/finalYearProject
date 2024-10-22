<?php
header('Content-Type: application/json');

$host = 'localhost'; // ඔබේ දත්ත ගබඩාව
$dbname = 'newfarmdb';
$user = 'root';
$pass = 'Sud123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM feeding_reminder");
    $reminders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['feeding_reminder' => $reminders]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>