<?php
header('Content-Type: application/json');

$host = 'localhost'; // ඔබේ දත්ත ගබඩාව
$dbname = 'newfarmdb';
$user = 'root';
$pass = 'Sud123';

$data = json_decode(file_get_contents('php://input'), true);
$message = $data['message'];
$date = $data['date'];
$time = $data['time'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO vaccination_reminder (message, reminder_date, reminder_time) VALUES (?, ?, ?)");
    $stmt->execute([$message, $date, $time]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
