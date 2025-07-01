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
    $new_fname = $_POST['new_fname'];
    $new_lname = $_POST['new_lname'];
    $new_email = $_POST['new_email'];
    $new_password = $_POST['new_password'];

   
    $update_query = "UPDATE people SET ";
    $update_values = [];

   
    if (!empty($new_fname)) {
        $update_query .= "fname = ?, ";
        $update_values[] = $new_fname;
    }
    if (!empty($new_lname)) {
        $update_query .= "lname = ?, ";
        $update_values[] = $new_lname;
    }
    if (!empty($new_email)) {
        $update_query .= "email = ?, ";
        $update_values[] = $new_email;
    }
    if (!empty($new_password)) {
        $update_query .= "password = ?, ";
        $update_values[] = $new_password;
    }

    
    $update_query = rtrim($update_query, ", ");
    $update_query .= " WHERE username = ?";

    
    $update_values[] = $user;

   
    $stmt = $conn->prepare($update_query);

    
    $types = str_repeat("s", count($update_values) - 1) . "s"; 
    $stmt->bind_param($types, ...$update_values);

    
    if ($stmt->execute()) {
        echo "User updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
