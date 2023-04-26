<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <title>Login</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type= "x-icon" href="../Images/Logo.png">
   <link rel="stylesheet" href="../Nav/nav.css">
  <link rel="stylesheet" href="loginform.css">
  <?php include 'LoginFunction.php'; ?>

</head>

<header>
<?php include('../Nav/nav.php'); ?>
</header>
<div class="login-box">
  <img src="avatar.png" class="avatar">
      <h1>Login Here</h1>
      <form action="loginform.php" method="post">
          <p>Username</p>
          <input type="text" name="username" placeholder="Enter Username">
         
          <p>Password</p>
          <input type="password" name="password" placeholder="Enter Password">
           <input type="submit" name="submit" value="Login"> 
          </form>
      <div class="login-singup">
<span class="text">Not a member?
<a href="../RegisterPage/register.php" clas="text singup-link">Register Now</a>
</span>
</div>
</div>
  
</div>
</body>
</html>
