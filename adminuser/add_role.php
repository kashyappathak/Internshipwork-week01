<?php
// add_role.php

// Include necessary files and start the session
include('functions.php');
session_start();

// Check if the user is logged in and has admin privileges
if (!isLoggedIn() || $_SESSION['user']['user_type'] !== 'admin') {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
    exit;
}

// Check if the required POST parameters are set
if (!isset($_POST['user_id']) || !isset($_POST['role_name'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
    exit;
}

// Get the user ID and role name from the POST request
$user_id = $_POST['user_id'];
$role_name = $_POST['role_name'];

// Update the user role in the database
// Add your code here to update the user role using the provided user ID and role name

// Check if the update was successful
if ($update_success) {
    echo json_encode(['status' => 'success', 'message' => 'Role added successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add role']);
}
?>