<?php

require_once "../../config/db.php";
require_once "../../middleware/authadmin.php";

$id = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../../css/style.css">
<title>Edit User</title>
</head>
<body>
<div class="container">
<h2> Edit User</h2>

<form method="POST" action="../../controllers/userController.php">

<input type="hidden" name="id" value="<?= $user['id'] ?>">

<input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>"><br><br>

<select name="role">
    <option value="user" <?= $user['role']=='user'?'selected':'' ?>>User</option>
    <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
</select><br><br>

<select name="status">
    <option value="active" <?= $user['status']=='active'?'selected':'' ?>>Active</option>
    <option value="inactive" <?= $user['status']=='inactive'?'selected':'' ?>>Inactive</option>
</select><br><br>

<button style="margin-bottom: 20px;" type="submit" name="update">Update</button>


</form>

<a style="margin-top: 20px;" href="../home.php">Back</a>

</div>
</body>
</html>
