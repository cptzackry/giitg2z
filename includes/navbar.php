<?php
session_start();

if (isset($_SESSION['user'])) {
    $username = $_SESSION['staff_name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>GIITG</title>
    <link rel="stylesheet" href="../style/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/Bootstrap/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.css"
        integrity="sha512-8M8By+q+SldLyFJbybaHoAPD6g07xyOcscIOQEypDzBS+sTde5d6mlK2ANIZPnSyxZUqJfCNuaIvjBUi8/RS0w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add your other scripts and stylesheets here -->
</head>
<body>
<nav id="web-navbar" class="navbar navbar-expand-lg navbar-dark fixed-top py-2">
    <a class="navbar-brand" href="index.php"><img src="https://i.ibb.co/BsCvKCj/giitglogo-01.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/index.php') echo 'active'; ?>">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/course.php') echo 'active'; ?>">
                <a class="nav-link" href="course.php">Courses</a>
            </li>
            <li class="nav-item <?php if ($_SERVER['SCRIPT_NAME'] === '/contact.html') echo 'active'; ?>">
                <a class="nav-link" href="contact.html">Support</a>
            </li>
            <?php
            // Start the session (if not already started)
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // Check if the user is logged in and if 'staff_name' is set in the session
            if (isset($_SESSION['user']) && isset($_SESSION['staff_name'])) {
                echo '<li class="nav-item dropdown">';
                echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo 'Hello, ' . $_SESSION['staff_name']; // Use $_SESSION['staff_name'] here
                echo '</a>';
                echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                echo '<a class="dropdown-item" href="staff/staffprofile.php">Profile</a>';
                echo '<div class="dropdown-divider"></div>';
                echo '<a class="dropdown-item" href="logout.php">Logout</a>';
                echo '</div>';
                echo '</li>';
            } else {
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="login.php">Login</a>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>
</nav>
</body>
</html>
