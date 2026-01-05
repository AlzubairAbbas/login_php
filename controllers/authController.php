<?php
session_start();
require_once "../config/db.php";


if(isset($_POST['login'])){

    $email =  trim($_POST['email']);
    $password = trim($_POST['password']);



    if(empty($email) || empty($password)){
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../views/auth/login.php");
        exit;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = " Invalid email format.";
        header("Location: ../views/auth/login.php");
        exit;
    }

   
    if(strlen($password) < 6){
        $_SESSION['error'] ="Password must be at least 6 characters.";
        header("Location: ../views/auth/login.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if($stmt->rowCount() == 0){
        $_SESSION['error'] = " The user not found ";
        header("Location: ../views/auth/login.php");
        exit;
    }

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

   
    if($user['status'] !== "active"){
        $_SESSION['error'] = " The user is Inactive ";
        header("Location: ../views/auth/login.php");
        exit;
    }

  
    if(!password_verify($password, $user['password'])){
        $_SESSION['error'] = "The password is not correct ";
        header("Location: ../views/auth/login.php");
        exit;
    }

$_SESSION['user_id']   = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_role'] = $user['role']; 
$_SESSION['logged_in'] = true;

    header("Location: ../views/home.php");
    exit;

}else{
    header("Location: ../views/auth/login.php");
    exit;
}
