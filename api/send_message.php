<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user_id'])) die(json_encode(['status'=>'error','message'=>'Not logged in']));

if($_SERVER['REQUEST_METHOD']=='POST'){
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $ref_number = $_POST['ref_number'];

    $stmt = $pdo->prepare("INSERT INTO messages (user_id,name,email,message,reference_number) VALUES (?,?,?,?,?)");
    if($stmt->execute([$user_id,$name,$email,$message,$ref_number])){
        echo json_encode(['status'=>'success','message'=>'Message sent']);
    } else {
        echo json_encode(['status'=>'error','message'=>'Failed to send message']);
    }
}
?>
