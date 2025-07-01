<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM people WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($db_password);
    $stmt->fetch();

    if ($db_password && $pass === $db_password) {
        echo "Login successful! Welcome, " . htmlspecialchars($user) . ".";
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
