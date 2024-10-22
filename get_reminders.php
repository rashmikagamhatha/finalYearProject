<?php
header('Content-Type: application/json');

$host = 'localhost'; // ඔබේ දත්ත ගබඩාව
$dbname = 'newfarmdb';
$user = 'root';
$pass = 'Admin@123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM vaccination_reminder");
    $reminders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['vaccination_reminder' => $reminders]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>