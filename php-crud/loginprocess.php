<?php

session_start(); // Start the session

// Assuming you have a database connection established
$mysqli = new mysqli("localhost", "root", "", "kashyap");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform any necessary validation and sanitization of the form data

    // Retrieve the user data from the database based on the email
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        // User found, verify the password
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (password_verify($password, $hashedPassword)) {
            // Password is correct, store the user ID in the session
            $_SESSION["user_id"] = $row["id"];
            // Redirect to the desired page after successful login
            header("Location: index-3.php");
            exit();
        } else {
            // Password is incorrect
            $_SESSION["error"] = "Invalid email or password.";
        }
    } else {
        // User not found
        $_SESSION["error"] = "Invalid email or password.";
    }

    $stmt->close();
}

// Close the database connection
$mysqli->close();
?>