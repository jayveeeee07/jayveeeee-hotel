<?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin'])) die(json_encode(['status'=>'error','message'=>'Unauthorized']));

if($_SERVER['REQUEST_METHOD']=='POST'){
    $booking_id = $_POST['booking_id'];
    $status = $_POST['status']; // Approved or Rejected

    $stmt = $pdo->prepare("UPDATE bookings SET status=? WHERE id=?");
    if($stmt->execute([$status, $booking_id])){
        echo json_encode(['status'=>'success','message'=>'Booking status updated']);
    } else {
        echo json_encode(['status'=>'error','message'=>'Failed to update status']);
    }
}
?>
