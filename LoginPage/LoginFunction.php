<?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $database = "studio";

    try {
      $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
    } catch(PDOException $e) {
      //echo "Connection failed: " . $e->getMessage();
    }
    if ( isset( $_POST['submit'] ) ) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = $connection->prepare("SELECT * FROM user WHERE name = ? AND password = ?"); 
        $sql->execute([$username,$password]); 
        $user = $sql->fetch();

        if(isset($user['ID'] )){
            header("Location: http://localhost/TattoStudio/IndexPage/indexpage.php");
            exit();
        }else{
            $message = "Username and/or Password incorrect.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } 
    }
     ?>