<?php
require "../../middleware/auth.php";
require "../../config/db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE id=?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
