<?php

// Assuming you have a database connection established
$mysqli = new mysqli("localhost", "root", "", "kashyap");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform any necessary validation and sanitization of the form data

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user data into the database
    $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sss", $name, $email, $hashedPassword);
    
    if ($stmt->execute()) {
        // Registration successful
        echo "<p style='color:white;font-weight:bold;text-align:center;'>Registration successful. User data stored in the database.</p>";
    } else {
        // Error occurred during registration
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$mysqli->close();
?>