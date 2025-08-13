<?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin'])) die(json_encode([]));

$stmt = $pdo->query("SELECT id, name, email, contact, status FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($users);
?>
