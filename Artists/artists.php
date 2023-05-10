    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <link rel="shortcut icon" type= "x-icon" href="../Images/Logo.png">
        <link rel="stylesheet" href="../Nav/nav.css"> 
      <link rel="stylesheet" href="artistsStyle.css">
        <title>Artists</title>
    </head>
    <body>
        <header>
            <?php include('../Nav/nav.php'); ?>
        </header> 
      <div class="container">
      <div class="box">
      <div class="images">
         <img class="artist" src="profile1.jpg">
        </div>
        <div class="name_job">Sabrina  Wilson</div>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <p class="inf">Sabrina has been interested in tattooing ever since she discovered as a child that she could decorate herself with sharpies.</p>
        <br>
        <div class="btns">
          <button>Tattoos</button>
          <button onclick="location.href = '../Booking/booking.php';">Booking</button>
        </div>
      </div>
    
      <div class="box">
        <div class="images">
       <img class="artist" src="profile2.jpg" alt="">
        </div>
        <div class="name_job">Tomas Smith</div>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p class="inf">Tomas’ interest and love for all things tattooing was peaked because the majority of adults that surrounded him while he was growing up were heavily tattooed.</p>
        <div class="btns">
          <button>Tattoos</button>
          <button onclick="location.href = '../Booking/booking.php';">Booking</button>
        </div>
      </div>
  </form>

      <div class="box">
        <div class="images">
       <img class="artist" src="profile3.jpg" alt="">
        </div>
        <div class="name_job">Taylor Cooper</div>
          <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <p class="inf">Taylor has always been surrounded by tattoos even at a young age. His mother made clothes in the 80's, exposing him to a ton of ink to be inspired by.</p>
        <div class="btns">
          <button>Tattoos</button>
          <button onclick="location.href = '../Booking/booking.php';">Booking</button>
        </div>
      </div>
  
    </div>
    </body>
    </html>