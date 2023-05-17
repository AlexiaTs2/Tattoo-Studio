 <?php
	// $servername = "localhost";
	// $username = "root";
	// $password = "1234";
	// $database = "studio";
	
	// try {
	// 	$connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	// 	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 	//echo "Connected successfully!";
	// } catch(PDOException $e) {
	// 	//echo "Connection failed: " . $e->getMessage();
	// }

	// if ( isset( $_POST['submit'] ) ) {
	
	// 	$username = $_POST['username'];
	// 	$password = $_POST['password'];
	// 	$email = $_POST['email'];
	// 	$confirmPassword = $_POST['confirmPassword'];

		
	// 	$errors = [];
	// 	if(strlen($username) < 3 || strlen($username) > 20)
	// 	{
	// 		$errors[] = "Ivalid username !";
	// 	}
	
	// 	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	// 	{
	// 		$errors[] =  "Ivalid email !";
	// 	}
	
	// 	if($password != $confirmPassword)
	// 	{
	// 		$errors[] = "Paasword do not mach !";
	// 	}
	
	// 	//Проверка за паролата
	// 	//-да съдържа поне една гравна буква
	// 	//-да съдържа поне една цифра
	// 	//-дължината да е минимум 8 символа
	// 	$pattern = "/[A-Z]/i";
	// 	if(preg_match($pattern, $password) != 1) // preg_match() функцията връща 1 ако е намерила главна буква
	// 	{
	// 		$errors[] = "Password must contens upper letter !";
	// 	}

	// 	$sql = "SELECT * FROM user WHERE Email = ?";
	// 	$pdoStament = $connection->prepare($sql);
	// 	$pdoStament->execute([$email]);
	// 	$data =  $pdoStament->fetchAll();
	// 	//data e масив ако дължината му е различна от 0 значи имаме вече регистриран email
	// 	if(count($data) != 0)
	// 	{
	// 		$errors[] = "Allready register email !";
	// 	}
	
	

	// 	if( !$errors ) {

	// 		$password = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);

	// 		$sql = "INSERT INTO user (Name,Password,Email) VALUES (?,?,?)";
	// 		$c = $connection->prepare($sql)->execute([$username,$password, $email]);
	// 		header("Location: http://localhost/Tattoo-Studio/LoginPage/loginform.php");
							
	// 		exit();
	// 	} else {

	// 		include("register.php");
	// 	}
	// }
?> 


<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "studio";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully!";
} catch(PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $confirmPassword = $_POST['confirmPassword'];

    $errors = [];

    if (strlen($username) < 3 || strlen($username) > 20) {
        $errors[] = "Invalid username!";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email!";
    }

    if ($password != $confirmPassword) {
        $errors[] = "Passwords do not match!";
    }

    // Password requirements:
    // - At least one uppercase letter
    // - At least one digit
    // - Minimum length of 8 characters
    $pattern = "/^(?=.*\d)(?=.*[A-Z]).{8,}$/";
    if (!preg_match($pattern, $password)) {
        $errors[] = "Password must contain at least one uppercase letter and one digit, and be at least 8 characters long!";
    }

    $sql = "SELECT * FROM user WHERE Email = ?";
    $pdoStatement = $connection->prepare($sql);
    $pdoStatement->execute([$email]);
    $data = $pdoStatement->fetchAll();

    if (count($data) != 0) {
        $errors[] = "Email already registered!";
    }

    if (!$errors) {
     
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);

        $sql = "INSERT INTO user (Name, Password, Email) VALUES (?,?,?)";
        $pdoStatement = $connection->prepare($sql);
        $pdoStatement->execute([$username, $hashedPassword, $email]);

        header("Location: http://localhost/Tattoo-Studio/LoginPage/loginform.php");
        exit();
    } else {
       include("register.php");
		exit;
    }
}
?>
