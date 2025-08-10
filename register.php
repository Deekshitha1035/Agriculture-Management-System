<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'rtp';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $phone_number = $conn->real_escape_string($_POST["phone_number"]);
    $role = $conn->real_escape_string($_POST["role"]);

    if ($password !== $confirm_password) {
        echo "Passwords do not match";
        exit;
    }

    // Hash password before storing
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, role, phone_number) VALUES ('{$username}', '{$email}', '{$password_hashed}', '{$role}', '{$phone_number}')";
    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully. <a href=\"login.php\">Login</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
