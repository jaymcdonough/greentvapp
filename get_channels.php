<?php
// Establish database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "greentv";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch channels from the database
$sql = "SELECT * FROM channels";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='channel'>";
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<p>Hashtag: " . $row["hashtag"] . "</p>";
        // Additional information or UI elements can be added here
        echo "</div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>