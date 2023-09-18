<?php
// Include necessary files and database connection here
include '../includes/config.php'; // Adjust the path as needed

session_start();
var_dump($_SESSION);

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: ../login.php"); // Replace with the login page URL
    exit();
}

// Fetch staff details from the database based on the user's session information
$userID = $_SESSION['user_id']; // Assuming you store the user's ID in the session

// Query to fetch staff details based on the user's ID
$query = "SELECT * FROM staff WHERE id = $userID";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Replace the following placeholders with actual data from the database
    $staffCode = $row['code'];
    $staffName = $row['name'];
    $staffEmail = $row['email'];
    $staffPosition = $row['position'];
    $staffImage = $row['dp'];
} else {
    // Handle the case where the staff member's details are not found
    // You can redirect to an error page or display an error message
    echo "Staff details not found.";
    exit();
}
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
            <img src="<?php echo $staffImage; ?>" alt="Staff Image">
            <p><strong>Staff Code:</strong> <?php echo $staffCode; ?></p>
            <p><strong>Staff Name:</strong> <?php echo $staffName; ?></p>
            <p><strong>Email:</strong> <?php echo $staffEmail; ?></p>
            <p><strong>Position:</strong> <?php echo $staffPosition; ?></p>
        </div>
    </div>
</body>
</html>
