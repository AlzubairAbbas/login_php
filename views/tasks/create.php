<?php
require "../../middleware/auth.php";
require "../../config/db.php";

if(isset($_POST['save'])){

    $title = trim($_POST['title']);
    $desc = trim($_POST['description']);

    if(empty($title)){
        $error = "العنوان مطلوب";
    } else {
        $stmt = $conn->prepare("INSERT INTO tasks (title,description) VALUES (?,?)");
        $stmt->execute([$title,$desc]);

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

<title>Create Task</title>
</head>

<body>
<div class="container">

<h2> Add New Task </h2>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>


<form method="POST">

<input type="text" name="title" placeholder=" Title "><br><br>

<textarea name="description" placeholder=" Description "></textarea><br><br>

<button type="submit" name="save"> Save </button>

<a style="margin-top: 20px;" class="btn btn-back" href="index.php"> Back </a>
</form>
</div>
</div>
<br>


</body>
</html>
