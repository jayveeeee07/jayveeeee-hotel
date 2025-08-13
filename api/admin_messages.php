<?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin'])) die(json_encode([]));

$stmt = $pdo->query("SELECT * FROM messages ORDER BY id DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($messages);
?><?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin'])) die(json_encode([]));

$stmt = $pdo->query("SELECT * FROM messages ORDER BY id DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($messages);
?>
