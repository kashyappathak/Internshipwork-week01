<?php
session_start();

// Check if the form data is stored in the session
if (isset($_SESSION['contact_form_data'])) {
    // Retrieve the form data from the session variable
    $formData = $_SESSION['contact_form_data'];

    // Display the form data
    echo "<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f2f2f2;
                background-image: url('abstract-wallpaper-with-colorful-gradient-polished-metal-lines-3d-rendering_670147-121.avif');
                background-repeat: no-repeat;
                background-size: cover;
                animation:pan 6s infinite alternate linear;
                height:100vh;
            }
            @keyframes pan{
                100%{
                    background-position:100% 80%;
                }
            }

            .container {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                border:5px solid black;
            }

            h1 {
                color: green;
                text-align: center;
                margin-bottom: 20px;
                font-weight:bold;
            }

            p {
                margin-bottom: 10px;
                color:red;
                font-weight:bold;
            }

            strong {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Success!</h1>
            <p>Thank you for contacting us. Your form data:</p>
            <p><strong>Name:</strong> " . $formData['name'] . "</p>
            <p><strong>Email:</strong> " . $formData['email'] . "</p>
            <p><strong>Message:</strong> " . $formData['message'] . "</p>
        
        </div>
    </body>
    </html>";

    // Store the form data in the database
    $db = mysqli_connect('localhost', 'root', '', 'multi_login');
    if ($db) {
        $name = mysqli_real_escape_string($db, $formData['name']);
        $email = mysqli_real_escape_string($db, $formData['email']);
        $message = mysqli_real_escape_string($db, $formData['message']);

        $query = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";
        mysqli_query($db, $query);
    } else {
        echo "Database connection error";
    }

    // Clear the form data from the session
    unset($_SESSION['contact_form_data']);
} else {
    // Redirect to the contact page if the form data is not available
    header('Location: contact.php');
    exit();
}
?>