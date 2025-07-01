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

    
    $stmt = $conn->prepare("DELETE FROM people WHERE username = ?");
    $stmt->bind_param("s", $user);

    
    if ($stmt->execute()) {
        echo "User deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
