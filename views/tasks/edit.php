<?php
require "../../middleware/auth.php";
require "../../config/db.php";


if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$task){
    die("المهمة غير موجودة");
}

if(isset($_POST['update'])){

    $title = trim($_POST['title']);
    $desc = trim($_POST['description']);

    if(empty($title)){
        $error = "العنوان مطلوب";
    } else {
        $stmt = $conn->prepare("UPDATE tasks SET title=?, description=? WHERE id=?");
        $stmt->execute([$title,$desc,$id]);

        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../../css/style.css">

<title>Edit Task</title>
</head>

<body>
<div class="container">

<h2> Edit The Task </h2>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="POST">

<input type="text" name="title" value="<?php echo $task['title']; ?>"><br><br>

<textarea name="description"><?php echo $task['description']; ?></textarea><br><br>

<button type="submit" name="update"> Edit </button>

<a style="margin-top: 20px;" class="btn btn-back"  href="index.php"> Back </a>

</form>
</div>
<br>


</body>
</html>
