<?php
require_once "../middleware/auth.php";

?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/style.css">
<title>Home</title>
</head>
<body>

<div class="home">
<h2> Hello <?php echo $_SESSION['user_name']; ?> </h2>
<div class="menu">
<?php if ($_SESSION['user_role'] === 'admin'): ?>
    <br><br>
    <a href="auth/register.php"> Go To Add New User</a>
    <br><br>
    <a href="users/index.php"> Go To User Management</a>
    
<?php endif; ?>
<br>
<br>
<a href="tasks/index.php"> Go To Tasks Manager Page </a>
<br>
<br>
<a href="auth/logout.php"> Go To Logout Page </a>
<br>
</div>
</div>

</body>
</html>
