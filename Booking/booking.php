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
        <form action="reservation.php" method="post">
            <div class="elem-group">
              <label for="name">Your Name</label>
              <input type="text" id="name" name="visitor_name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required>
            </div>
            <div class="elem-group">
              <label for="email">Your E-mail</label>
              <input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required>
            </div>
            <div class="elem-group">
              <label for="phone">Your Phone</label>
              <input type="tel" id="phone" name="visitor_phone" pattern=(\d{3})-?\s?(\d{3})-?\s?(\d{4}) required>
            </div>
      
            <div class="elem-group inlined">
              <div class="inf">
                 <label for="checkin-date"> Date</label>
                 <input type="date" id="checkin-date" name="checkin" required>
              </div>
             
              <div class="inf">
                <label for="checkin-date"> Hour</label> 
                <input type="time" id="checkin-date" name="checkin" required>
              </div> 
           
             
            </div>
            <div class="elem-group">
              <label for="room-selection">Select Artist</label>
              <select id="room-selection" name="room_preference" required>
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