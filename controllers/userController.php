<?php
session_start();
require_once "../config/db.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../views/home.php");
    exit;
}

if (isset($_POST['update'])) {

    $id     = (int)$_POST['id'];
    $name   = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $role   = $_POST['role'];
    $status = $_POST['status'];

    if (!in_array($role, ['admin','user'])) $role = 'user';
    if (!in_array($status, ['active','inactive'])) $status = 'active';

    $stmt = $conn->prepare("
        UPDATE users
        SET name = ?, role = ?, status = ?
        WHERE id = ?
    ");

    $stmt->execute([$name, $role, $status, $id]);

    header("Location: ../views/users/index.php");
    exit;
}
