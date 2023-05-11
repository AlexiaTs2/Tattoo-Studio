<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="../IndexPage/indexpage.php" class="active">Home</a>
  <a href="../AdminPanel/Panel.php">Admin-home</a>
  <a href="../AdminPanel/bookingpanel.php">Booking</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <span class="logreg">
    <a href="../LoginPage/loginform.php">Login</a> </span>
</div>
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
