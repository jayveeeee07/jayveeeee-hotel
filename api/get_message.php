<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user_id'])) die(json_encode([]));

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM messages WHERE user_id=? ORDER BY id DESC");
$stmt->execute([$user_id]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($messages);
?>
