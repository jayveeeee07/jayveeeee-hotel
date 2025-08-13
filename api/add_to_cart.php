<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user_id'])) die(json_encode(['status'=>'error','message'=>'Not logged in']));

if($_SERVER['REQUEST_METHOD']=='POST'){
    $user_id = $_SESSION['user_id'];
    $room_id = $_POST['room_id'];

    $stmt = $pdo->prepare("INSERT INTO cart (user_id, room_id) VALUES (?,?)");
    if($stmt->execute([$user_id,$room_id])){
        echo json_encode(['status'=>'success','message'=>'Added to cart']);
    } else {
        echo json_encode(['status'=>'error','message'=>'Failed to add to cart']);
    }
}
?>
