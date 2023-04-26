<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <title>Register</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type= "x-icon" href="../Images/Logo.png">
  <link rel="stylesheet" href="../Nav/nav.css"> 
  <link rel="stylesheet" href="register.css">
  <?php include 'RegisterFunction.php'; ?>
</head>
<header>
    <?php include('../Nav/nav.php'); ?>
</header>
<div class="login-box">
  <img src="regavatar.jpg" class="avatar">
      <h1>Register Here</h1>
<?php
if ( isset($errors) ) {

  print_r( $errors );
}
?>
          <form action="register.php" method="post">
          <p>Username</p>
          <input type="text" name="username" placeholder="Enter Username">
          <p>Email</p>
          <input type="text" name="email" placeholder="Enter Email">
          <p>Password</p>
          <input type="password" name="password" placeholder="Enter Password">
          <p>Confirm Password</p>
          <input type="password" name="password" placeholder="Enter Confirm Password">
          <input type="submit" name="submit" value="Register">
           
          </form>
</div>

<footer>
    <?php //include('../Footer/foter.php'); ?> 
</footer>
</body>
</html>
