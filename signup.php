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
  
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $national_id = $_POST['national_id'];

    
    $stmt = $conn->prepare("INSERT INTO people (fname, lname, username, password, phone_number, email, national_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $fname, $lname, $user, $pass, $phone_number, $email, $national_id);

    
    if ($stmt->execute()) {
        echo "Sign-up successful! You can now <a href='index.php'>Sign In</a>.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
