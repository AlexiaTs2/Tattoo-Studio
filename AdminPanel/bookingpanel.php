<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "studio";

    try{
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    
        $query= "SELECT * FROM user";
        $PDOstatement = $connection ->prepare('SELECT * FROM booking');
        $PDOstatement ->execute();
        $result = $PDOstatement ->fetchAll(PDO::FETCH_ASSOC);

    }catch(PDOException $e){
        echo "Connection failed" .$e ->getMessage();
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AdminNav/nav.css">
    <link rel="stylesheet" href="Styles/PanelStyle.css">
    <title>Document</title>
</head>
<header>
<?php include('AdminNav/nav.php'); ?>
</header>
<body>
<br>
<table border= "1">

<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Date</th>
    <th>Hour</th>
    <th>Artist</th>
    <!-- <th>Check</th> -->

</tr>     
<?php

    $PDOstatement = $connection ->prepare('SELECT * FROM booking');

     for($i = 0; $i < count($result); $i++){
        echo "<tr>";
        echo   "<td>" . $result[$i]['visitor_name'] . "</td>";
        echo   "<td>" . $result[$i]['visitor_email'] . "</td>";
        echo   "<td>" . $result[$i]['visitor_phone'] . "</td>";
        echo   "<td>" . $result[$i]['checkin_date'] . "</td>";
        echo   "<td>" . $result[$i]['checkin_hour'] . "</td>";
        echo   "<td>" . $result[$i]['artist'] . "</td>";

        
       // echo   '<td><a href="bookingpanel.php?id='.$result[$i]['ID'] .'" class="ready" >Ready</a></td>';
        echo "</tr>";
    }

    try{
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        }catch(PDOException $e){
        echo "Connection failed" .$e ->getMessage();
    
    }
?>
</body>
</html>