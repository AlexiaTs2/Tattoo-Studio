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

	if ( isset( $_POST['submit'] ) ) {
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$errors = array();

		if ( !$password ) {

				$errors['password'] = "Pls, password!";

		}

		if( !$errors ) {

			$password = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);

			$sql = "INSERT INTO user (Name,Password,Email) VALUES (?,?,?)";
			$c = $connection->prepare($sql)->execute([$username,$password, $email]);
			header("Location: http://localhost/TattoStudio/LoginPage/loginform.php");
			exit();
		} else {

			include("register.php");
		}
	}
	


     ?>