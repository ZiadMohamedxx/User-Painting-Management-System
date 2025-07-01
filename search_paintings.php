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
    $painting_title = $_POST['painting_title'];

    $stmt = $conn->prepare("SELECT title, artist, year, description FROM paintings WHERE title LIKE ?");
    $search_query = "%" . $painting_title . "%";
    $stmt->bind_param("s", $search_query);
    $stmt->execute();
    $stmt->bind_result($title, $artist, $year, $description);

    $found = false;
    while ($stmt->fetch()) {
        $found = true;
        echo "<h2>Painting Found</h2>";
        echo "<p><strong>Title:</strong> " . htmlspecialchars($title) . "</p>";
        echo "<p><strong>Artist:</strong> " . htmlspecialchars($artist) . "</p>";
        echo "<p><strong>Year:</strong> " . htmlspecialchars($year) . "</p>";
        echo "<p><strong>Description:</strong> " . htmlspecialchars($description) . "</p>";
        echo "<hr>";
    }

    if (!$found) {
        echo "No paintings found with the title '" . htmlspecialchars($painting_title) . "'.";
    }

    $stmt->close();
}

$conn->close();
?>
