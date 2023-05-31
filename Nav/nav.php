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
  <a href="../IndexPage/indexpage.php">Home</a>
  <a href="../Gallery/Gallery.php">Gallery</a>  
  <a href="../About/about.php">About</a>


  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <?php 

//echo "<pre>";/
//print_r( $_SESSION['user'] );


  if( @!$_SESSION['user'] ) {
  ?>
  <span class="logreg">
    <a href="../LoginPage/loginform.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a> </span>
</div>
<?php }else {?>    
  <a href="../FAQ/FAQ.php">FAQ</a>
  <a href="../Artists/Artists.php">Artists</a>
  <span class="logreg">
    <a><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['user']['Name'] ?></a>
<?php
if ( @$_SESSION['user']['role_id'] == 2 ) {
  ?>
    <a href="../AdminPanel/Panel.php"><i class="fa fa-user-secret" aria-hidden="true"></i>Admin-Panel</a>
<?php
}
?>
    <a href="../LogOut/logout.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
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