<?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin'])) die(json_encode(['status'=>'error','message'=>'Unauthorized']));

if($_SERVER['REQUEST_METHOD']=='POST'){
    $message_id = $_POST['message_id'];
    $reply = $_POST['reply'];

    $stmt = $pdo->prepare("UPDATE messages SET reply=? WHERE id=?");
    if($stmt->execute([$reply,$message_id])){
        echo json_encode(['status'=>'success','message'=>'Reply sent']);
    } else {
        echo json_encode(['status'=>'error','message'=>'Failed to send reply']);
    }
}
?>
