<?php
session_start();

if (isset($_SESSION['logged_in'])) {
    header("Location: views/home.php");
    exit;
}

header("Location: views/auth/login.php");
exit;
