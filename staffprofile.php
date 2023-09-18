<?php
// Include necessary files and database connection here
include 'includes/config.php';

// Check if a session exists or start a new one
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in and has a valid session
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: login.php"); // Replace with the login page URL
    exit();
}

// Rest of your code to fetch staff details and display the profile
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary meta tags, stylesheets, and scripts -->
    <title>Staff Profile</title>
</head>
<body>
    <!-- Include sidebar -->
    <?php include 'staffincludes/sidebar.php'; ?>

    <!-- Staff Profile Content -->
    <div class="content">
        <h1>Staff Profile</h1>
        <div class="profile-details">
            <!-- Display staff details here -->
        </div>
    </div>
</body>
</html>
