<?php
session_start();
if(!isset($_SESSION['user'])){
exit;
}
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "studio";
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the ID of the row to edit from the query string
$id = $_GET["id"];

// Retrieve the data of the row to edit from the database
$sql = "SELECT name, email FROM user WHERE ID   = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name = $row["name"];
$email = $row["email"];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the updated data from the form
  $name = $_POST["name"];
  $email = $_POST["email"];
  $role = $_POST["role"];

  $conn->query("DELETE FROM user_role WHERE user_id = $id");
  $conn->query("INSERT INTO user_role SET user_id = $id, role_id = $role");

  // Update the data in the database
  $sql = "UPDATE user SET name='$name', email='$email' WHERE id=$id";




  if ($conn->query($sql) === TRUE) {
    // Redirect back to the table page
    header("Location: Panel.php");
    exit();
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

// Close the database connection
$conn->close();
?>

<!-- Edit form -->
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="AdminNav/nav.css">
  <link rel="stylesheet" href="Styles/editpage.css">
</head>
<header>
    <?php include('AdminNav/nav.php'); ?>
</header>

<br>
<div class="login-box">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=$id"; ?>" method="post">
<h1>Edit User</h1>
<img src="../LoginPage/avatar.png" class="avatar">
<br>
  <label for="name">Name:</label><br>
  <input type="text" name="name" id="name" value="<?php echo $name; ?>">
  <br>
  <label for="email">Email:</label><br>
  <input type="email" name="email" id="email" value="<?php echo $email; ?>">
    
  <input type="radio" name="role" value="1" >
  <input type="radio" name="role" value="2" >

  </label>
  <br><br>
  <input type="submit" value="Update">
</form>
</div>
</html>
