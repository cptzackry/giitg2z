<?php
session_start();
include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the course_id and staff_id from the POST data
    $courseId = $_POST['course_id'];
    
    // Check if the staff is logged in (staff ID is set in the session)
    if (isset($_SESSION['user']['id'])) {
        $staffId = $_SESSION['user']['id']; // Corrected session variable
        
        // Check if the staff member is already enrolled in the course
        $checkQuery = "SELECT * FROM coursetaken WHERE course_id = ? AND staff_id = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("ii", $courseId, $staffId);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Staff member is already enrolled
            echo "You are already enrolled in this course.";
        } else {
            // Staff member is not enrolled, insert a new row into coursetaken
            $insertQuery = "INSERT INTO coursetaken (staff_id, course_id, status, order_date) VALUES (?, ?, 'Enrolled', NOW())";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("ii", $staffId, $courseId);

            if ($insertStmt->execute()) {
                echo "Enrollment successful!";
            } else {
                echo "Enrollment failed. Please try again later.";
            }
        }
    } else {
        echo "You are not logged in."; // Handle the case where the staff is not logged in
    }
} else {
    echo "Invalid request.";
}
?>
