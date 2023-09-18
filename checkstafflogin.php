<?php
session_start(); // Start the session if it's not already started

if (isset($_POST['staffLogEmail']) && isset($_POST['staffLogPass'])) {
    include('includes/config.php'); // Include your database connection file

    $staffLogEmail = $_POST['staffLogEmail'];
    $staffLogPass = $_POST['staffLogPass'];

    // Perform user authentication (modify this part based on your database structure)
    $sql = "SELECT * FROM staff WHERE stf_email = ? AND stf_pass = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $staffLogEmail, $staffLogPass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Authentication successful
        $row = $result->fetch_assoc();

        // Store user data in a session (modify this as needed)
        $_SESSION['user'] = $row;

        echo "1"; // Send a success code to the AJAX request
    } else {
        // Authentication failed
        echo "0"; // Send a failure code to the AJAX request
    }

    $stmt->close();
    $con->close();
} else {
    echo "0"; // Send a failure code if POST data is missing
}
?>
