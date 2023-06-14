<?php
session_start();
if(!isset($_SESSION['user']['role_id'])){
exit;
}

$servername = "localhost";
$username = "root";
$password = "1234";
$database = "studio";

    try{
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    
        $query= "SELECT * FROM user";
        $PDOstatement = $connection ->prepare('SELECT * FROM user');
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
    <link rel="shortcut icon" type= "x-icon" href="../Images/Logo.png">
    <link rel="stylesheet" href="AdminNav/nav.css">
    <link rel="stylesheet" href="Styles/PanelStyle.css">
    <title>AdminPanel</title>


</head>
<header>
<?php include('AdminNav/nav.php'); ?>
    </header>
<br>
<table border= "1">

        <tr>
            <!-- <th>id</th> -->
            <th>Username</th>
            <!-- <th>Password</th> -->
            <th>Email</th>
            <th>Delete</th>
            <th>Edit</th>
       
      </tr>     
        <?php

            $PDOstatement = $connection ->prepare('SELECT * FROM booking');

             for($i = 0; $i < count($result); $i++){
                echo "<tr>";
              //  echo   "<td>" . $result[$i]['ID'] . "</td>";
                echo   "<td>" . $result[$i]['Name'] . "</td>";
                //echo   "<td>" . $result[$i]['Password'] . "</td>";
                echo   "<td>" . $result[$i]['Email'] . "</td>";
                echo   '<td><a href="Panel.php?id='.$result[$i]['ID'] .'" class="buttondel" >Delete</a></td>';
                echo   '<td><a href="editpage.php?id='.$result[$i]['ID'] .'" class="buttonedit">Edit</a></td>';

             
                echo "</tr>";
            }

            try{
                $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
                
            
                if (isset($_GET['id'])) {
                    $delete_id = $_GET['id'];
                    $sql = "DELETE FROM user WHERE ID = ?";
                        $connection->prepare($sql)->execute([$delete_id]);
        
                }
            
                 

                
            }catch(PDOException $e){
                echo "Connection failed" .$e ->getMessage();
            
            }
        ?>

    </table>
</html>





