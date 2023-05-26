<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $messageText = $_POST['message'];

    // Store the form data in a database or session
    // Example code for storing in a session
    session_start();

    // Create an associative array to store the form data
    $formData = [
        'name' => $name,
        'email' => $email,
        'message' => $messageText
    ];

    // Store the form data in a session variable
    $_SESSION['contact_form_data'] = $formData;

    // Redirect to a success page or display a success message
    header('Location: sucsess.php');
    exit();
} else {
    // Redirect to the contact page if the form is not submitted
    header('Location: contact.php');
    exit();
}
?>