<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user_id'])) die(json_encode([]));

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT c.id as cart_id, r.name, r.price, r.room_number 
                       FROM cart c JOIN rooms r ON c.room_id=r.id WHERE c.user_id=?");
$stmt->execute([$user_id]);
$cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($cart);
?>
