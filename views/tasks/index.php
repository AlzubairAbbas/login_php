<?php
require_once "../../middleware/auth.php";
require "../../config/db.php";

$stmt = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../../css/style.css">

<title>Tasks</title>
</head>

<body>
<div class="table-container">

<h2> Tasks list </h2>

<a href="create.php" class="btn btn-add"> Add New Task </a>
<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Actions</th>
</tr>

<?php foreach($tasks as $task): ?>
<tr>
    <td><?php echo $task['id']; ?></td>
    <td><?php echo $task['title']; ?></td>
    <td><?php echo $task['description']; ?></td>

    <td>
        <a class="btn btn-edit" href="edit.php?id=<?php echo $task['id']; ?>"> Edit </a>
        |
        <a class="btn btn-delete" href="delete.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Do you Need To Delete')"> Delete </a>
    </td>
</tr>
<?php endforeach; ?>

</table>

<br>
<a href="../home.php"> Back To The Main Page </a>
</div>

</body>
</html>
