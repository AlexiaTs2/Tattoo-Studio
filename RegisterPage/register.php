<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "studio";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully!";
} catch(PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $confirmPassword = $_POST['confirmPassword'];

    $errors = [];

    if (strlen($username) < 3 || strlen($username) > 20) {
        $errors[] = "Invalid username!";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email!";
    }

    if ($password != $confirmPassword) {
        $errors[] = "Passwords do not match!";
    }

    // Password requirements:
    // - At least one uppercase letter
    // - At least one digit
    // - Minimum length of 8 characters
    $pattern = "/^(?=.*\d)(?=.*[A-Z]).{8,}$/";
    if (!preg_match($pattern, $password)) {
        $errors[] = "Password must contain at least one uppercase letter and one digit, and be at least 8 characters long!";
    }

    $sql = "SELECT * FROM user WHERE Email = ?";
    $pdoStatement = $connection->prepare($sql);
    $pdoStatement->execute([$email]);
    $data = $pdoStatement->fetchAll();

    if (count($data) != 0) {
        $errors[] = "Email already registered!";
    }

    if (!$errors) {
     
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);

        $sql = "INSERT INTO user (Name, Password, Email) VALUES (?,?,?)";
        $pdoStatement = $connection->prepare($sql);
        $pdoStatement->execute([$username, $hashedPassword, $email]);

        header("Location: http://localhost/Tattoo-Studio/LoginPage/loginform.php");
        exit();
    } 
}
?>


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
</head>
<header>
    <?php include('../Nav/nav.php'); ?>
</header>
<div class="login-box">
  <img src="regavatar.jpg" class="avatar">
      <h1>Register Here</h1>
          <form action="register.php" method="post">
          <p>Username</p>
          <input type="text" name="username" placeholder="Enter Username">
          <p>Email</p>
          <input type="text" name="email" placeholder="Enter Email">
          <p>Password</p>
          <input type="password" name="password" placeholder="Enter Password">
          <p>Confirm Password</p>
          <input type="password" name="confirmPassword" placeholder="Enter Confirm Password">
          <input type="submit" name="submit" value="Register">
           
          </form>
</div>
<?php
if ( isset($errors) ) {
  echo "<script>";
  echo "alert('";
  foreach( $errors as $error ) {
    echo $error . "\\n";
  }
  echo "');";
  echo "</script>";
}
?>
<footer>
    <?php //include('../Footer/foter.php'); ?> 
</footer>
</body>
</html>
