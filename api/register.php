<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $contact = $_POST['contact'];

    $stmt = $pdo->prepare("INSERT INTO users (name,email,password,contact,status) VALUES (?,?,?,?,'Active')");
    if($stmt->execute([$name,$email,$password,$contact])){
        echo json_encode(['status'=>'success','message'=>'Registered successfully']);
    } else {
        echo json_encode(['status'=>'error','message'=>'Registration failed']);
    }
}
?>
