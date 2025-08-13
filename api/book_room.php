<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user_id'])) die(json_encode(['status'=>'error','message'=>'Not logged in']));

if($_SERVER['REQUEST_METHOD']=='POST'){
    $user_id = $_SESSION['user_id'];
    $room_id = $_POST['room_id'];
    $full_name = $_POST['full_name'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $payment_method = $_POST['payment_method'];
    $proof = $_FILES['proof']['name'];
    $ref_number = uniqid('REF');

    move_uploaded_file($_FILES['proof']['tmp_name'], "uploads/".$proof);

    $stmt = $pdo->prepare("INSERT INTO bookings 
        (user_id, room_id, full_name, check_in, check_out, payment_method, proof, reference_number, status) 
        VALUES (?,?,?,?,?,?,?,?,?)");
    
    if($stmt->execute([$user_id,$room_id,$full_name,$check_in,$check_out,$payment_method,$proof,$ref_number,'Pending'])){
        echo json_encode(['status'=>'success','message'=>'Booking confirmed','reference'=>$ref_number]);
    } else {
        echo json_encode(['status'=>'error','message'=>'Booking failed']);
    }
}
?>
