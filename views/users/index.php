<?php
require_once "../../config/db.php";
require_once "../../middleware/authadmin.php";


$stmt = $conn->query("SELECT id, name, email, phone, role, status, created_at FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../../css/style.css">
<title>User Management</title>
</head>
<body>
<div class="table-container">
<h2>User Management</h2>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Role</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php foreach ($users as $user): ?>
<tr>
    <td><?= $user['id'] ?></td>
    <td><?= htmlspecialchars($user['name']) ?></td>
    <td><?= $user['email'] ?></td>
    <td><?= $user['phone'] ?></td>
    <td><?= ucfirst($user['role']) ?></td>
    <td><?= ucfirst($user['status']) ?></td>
    <td>
        <a class="btn btn-edit" href="edit.php?id=<?= $user['id'] ?>">Edit</a>
    </td>
</tr>
<?php endforeach; ?>

</table>

<br>
<a style="margin-top: 20px;" href="../home.php">Back</a>
</div>
</body>
</html>
