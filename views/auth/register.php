<?php
require_once "../../middleware/authadmin.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../../css/style.css">

<title>Add New User</title>
</head>
<body>

<div class="container">

<h2>Add New User</h2>

<?php if (isset($_SESSION['error'])): ?>
    <p style="color:red;">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </p>
<?php endif; ?>



<form method="POST" action="../../controllers/registerController.php">

<input type="text" name="name" placeholder="Username"><br><br>

<input type="email" name="email" placeholder="Email"><br><br>

<input type="password" name="password" placeholder="Password (min 6 chars)"><br><br>

<input type="text" name="phone" placeholder="Phone (e.g. 774698220)"><br><br>

<select name="role">
    <option value="user"> Normal User </option>
    <option value="admin"> Administrator </option>
</select>
<br><br>

<select name="status">
    <option value="active"> Active </option>
    <option value="inactive"> Inactive </option>
</select>
<br><br>


<button style="margin-bottom: 20px;" type="submit" name="register"> Create New User </button>

<a href="../home.php">Back to Home</a>

</form>
</div>

<br>


</body>
</html>
