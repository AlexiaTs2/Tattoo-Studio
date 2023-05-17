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
