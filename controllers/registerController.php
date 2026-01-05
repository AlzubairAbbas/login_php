<?php
session_start();
require_once "../config/db.php";


if (!isset($_SESSION['logged_in']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../views/auth/login.php");
    exit;
}

if (isset($_POST['register'])) {


    $name     = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $email    = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $phone    = trim($_POST['phone']);
    $role   = $_POST['role'] ?? 'user';
    $status = $_POST['status'] ?? 'active';


    if (!in_array($role, ['admin', 'user'])) {
    $role = 'user';
}

if (!in_array($status, ['active', 'inactive'])) {
    $status = 'active';
}

    // Empty check
    if (empty($name) || empty($email) || empty($password) || empty($phone)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../views/auth/register.php");
        exit;
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("Location: ../views/auth/register.php");
        exit;
    }

    //Password length
    if (strlen($password) < 6) {
        $_SESSION['error'] = "Password must be at least 6 characters.";
        header("Location: ../views/auth/register.php");
        exit;
    }

    //  Phone validation 
    if (!preg_match('/^(70|71|73|77|78)[0-9]{7}$/', $phone)) {
        $_SESSION['error'] = "Invalid phone number.";
        header("Location: ../views/auth/register.php");
        exit;
    }

    // Check duplicate email
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->execute([$email]);

    if ($check->rowCount() > 0) {
        $_SESSION['error'] = "Email already exists.";
        header("Location: ../views/auth/register.php");
        exit;
    }

    //  Password Hash ✅
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    //Insert user
   $stmt = $conn->prepare("
    INSERT INTO users (name, email, password, phone, status, role)
    VALUES (?, ?, ?, ?, ?, ?)
");

$stmt->execute([
    $name,
    $email,
    $hashedPassword,
    $phone,
    $status,
    $role
]);

    header("Location: ../views/home.php");
    exit;
}
