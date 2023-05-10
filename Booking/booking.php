<?php
// Връзка към базата данни
    $db_host = "localhost"; // Името на хоста, където се намира базата данни
    $db_name = "studio"; // Името на базата данни
    $db_user = "root"; // Потребителско име за достъп до базата данни
    $db_pass = "1234"; // Парола за достъп до базата данни

// Създаване на връзка към базата данни
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Проверка за грешки при връзката
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Извличане на информацията от формата
$visitor_name = $_POST['visitor_name'];
$visitor_email = $_POST['visitor_email'];
$visitor_phone = $_POST['visitor_phone'];
$checkin_date = $_POST['checkin_date'];
$checkin_hour = $_POST['checkin_hour'];
$artist = $_POST['artist'];


// Записване на информацията в базата данни
$sql = "INSERT INTO booking (visitor_name, visitor_email, visitor_phone, checkin_date, checkin_hour, artist) 
        VALUES ('$visitor_name', '$visitor_email', '$visitor_phone', '$checkin_date', '$checkin_hour', '$artist')";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Затваряне на връзката към базата данни
$conn->close();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="../Nav/nav.css">
    <title>Booking form</title>
</head>
<body>
    <header>
        <?php include('../Nav/nav.php'); ?>
    </header>
    <main>
      <br>
      <div class="bookform">
      <img src="../Booking/BookingIcon.png" class="avatar">
        <form action="booking.php" method="post">
            <div class="elem-group">
              <label for="name">Your Name</label>
              <input type="text" id="name" name="visitor_name" placeholder="John Doe">
            </div>
            <div class="elem-group">
              <label for="email">Your E-mail</label>
              <input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required>
            </div>
            <div class="elem-group">
              <label for="phone">Your Phone</label>
              <input type="tel" id="phone" name="visitor_phone" required>
            </div>
      
            <div class="elem-group inlined">
              <div class="inf">
                 <label for="checkin-date"> Date</label>
                 <input type="date" id="checkin-date" name="checkin_date" required>
              </div>
             
              <div class="inf">
                <label for="checkin-date"> Hour</label> 
                <input type="time" id="checkin-hour" name="checkin_hour" required>
              </div> 
           
             
            </div>
            <div class="elem-group">
              <label for="artist">Select Artist</label>
              <select id="artist" name="artist" required>
                  <option value="">None</option>
                  <option value="artist">Sabrina Wilson</option>
                  <option value="artist">Tomas Smith</option>
                  <option value="artist">Taylor Cooper</option>
              </select>
            </div>
            <input class = "submit" type="submit" name="submit" value="Send" id="button">
          </form>
        </div>
    </main>
</body>
</html>