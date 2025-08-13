<?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin'])) die(json_encode([]));

$stmt = $pdo->query("SELECT b.id, r.name as room_name, b.full_name, b.check_in, b.check_out, b.payment_method, b.proof, b.reference_number, b.status 
                     FROM bookings b 
                     JOIN rooms r ON b.room_id = r.id ORDER BY b.id DESC");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($bookings);
?>
