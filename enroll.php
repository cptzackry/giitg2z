<?php
// Include the database configuration file
include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the course ID from the POST data
    $courseId = $_POST['course_id'];
    
    // Print the received data for debugging purposes
    echo "Received course_id: " . $courseId;

    // Assuming you have the staff ID and status (e.g., 'enrolled') available, you can add a record to the 'coursetaken' table.
    // Adjust this query to match your database schema.
    $enrollQuery = "INSERT INTO coursetaken (taken_id, staff_id, course_id, status, order_date)
                    VALUES (null, $staffId, $courseId, 'enrolled', NOW())";

    if ($conn->query($enrollQuery) === TRUE) {
        echo "You have been enrolled for this course!";
    } else {
        echo "Error: " . $enrollQuery . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
