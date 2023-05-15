<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
<?php 
session_start();
?>
</style>
</head>
<body>
  
<div class="topnav" id="myTopnav">
  <a href="../IndexPage/indexpage.php" class="active">Home</a>
  <a href="../Gallery/Gallery.php">Gallery</a>
  <a href="../FAQ/FAQ.php">FAQ</a>
  <a href="../Artists/Artists.php">Artists</a>
  <a href="../About/about.php">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <?php 
  if( @!$_SESSION['user'] ) {
  ?>
  <span class="logreg">
    <a href="../LoginPage/loginform.php">Login</a> </span>
</div>
<?php }else {?>
  <span class="logreg">
    <a href="*">Name :   <?php echo $_SESSION['user']['Name'] ?></a>
    <a href="../LogOut/logout.php">Log out</a>
 </span>
</div>
<?php  }?>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>