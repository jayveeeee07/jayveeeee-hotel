<?php
include 'db.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded admin credentials
    if($username=='JHOM' && $password=='ADMIN'){
        $_SESSION['admin'] = true;
        echo json_encode(['status'=>'success','message'=>'Admin login successful']);
    } else {
        echo json_encode(['status'=>'error','message'=>'Invalid admin credentials']);
    }
}
?>
