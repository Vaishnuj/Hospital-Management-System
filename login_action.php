<?php
// Database connection (replace with your own database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database for user
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the user data
    $row = $result->fetch_assoc();
    
    // Verify password
    if (password_verify($password, $row['password'])) {
        // Successful login
        echo "Login successful! Welcome, " . $row['username'];
    } else {
        // Incorrect password
        echo "Invalid password!";
    }
} else {
    // User not found
    echo "No user found with that username!";
}

$conn->close();
?>
