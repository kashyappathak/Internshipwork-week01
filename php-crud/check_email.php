<?php
// Assuming you have a database connection established
$mysqli = new mysqli("localhost", "root", "", "kashyap");

// Check if the email exists in the database
function checkEmailExists($mysqli, $email) {
    // Prepare the query
    $query = "SELECT COUNT(*) FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $email);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch the count value
    $row = $result->fetch_assoc();
    $count = $row['COUNT(*)'];

    // Close the statement
    $stmt->close();

    // Return true if the count is greater than 0, indicating the email exists
    return $count > 0;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];

    if (checkEmailExists($mysqli, $email)) {
        echo json_encode(false); // Email already exists
    } else {
        echo json_encode(true); // Email is unique
    }
}

// Close the database connection
$mysqli->close();
?>