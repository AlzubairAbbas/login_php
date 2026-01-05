<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../../css/style.css">

<title>Login</title>
</head>

<body>

 <div class="container">
<div class="form-box">
    <h2 style="text-align: center;"> Login </h2>

    <?php if(isset($_SESSION['error'])): ?>
        <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

   
    <form action="../../controllers/authController.php" method="POST">
        <label> Email </label>
        <br>
        <input type="email" name="email" placeholder="Email">
        <br>
        <label> PassWord </label>
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <br>
        <button type="submit" name="login">Login</button>
    </form>
    </div>
</div>

</body>
</html>
