<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type= "x-icon" href="../Images/Logo.png">
    <link rel="stylesheet" href="../Nav/nav.css"> 
    <link rel="stylesheet" href="Contactstyle.css">
    <?php include ('ContactFunction.php'); ?>
    <title>Contact us</title>
</head>
<body>
<header>
    <?php include('../Nav/nav.php'); ?>
</header>
<main>
<div class="contact-box">
  <img src="../Images/Mail_Icon.jpg" class="avatar">
    <form action="ContactForm.php" method="post">
            <h1>Contact Us </h1>
            <input type="text" id="firstName" name="firstname" placeholder="First Name" required>
            <input type="text" id="lastName" name="lastname" placeholder="Last Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="text" id="mobile" name="mobile" placeholder="Mobile" required>
            <h4>Type Your Message Here...</h4>
            <textarea name="message" id="message" required></textarea>
            <input class = "submit" type="submit" name="submit" value="Send" id="button">
        </form>
    </div>
</main>
</body>
</html>