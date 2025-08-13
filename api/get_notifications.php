<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user_id'])) die(json_encode([]));

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT b.full_name, r.name as room_name, r.price, b.reference_number, b.status 
                       FROM bookings b 
                       JOIN rooms r ON b.room_id = r.id 
                       WHERE b.user_id = ?");
$stmt->execute([$user_id]);
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($notifications);
?>
