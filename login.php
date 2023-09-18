<?php
session_start();
error_reporting(E_ALL); // Enable error reporting
ini_set('display_errors', 1);
include("includes/config.php");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $ret = mysqli_query($conn, "SELECT * FROM staff WHERE email='$email' AND password='$password'");
    if (!$ret) {
        die('Error: ' . mysqli_error($conn));
    }

    $num = mysqli_fetch_array($ret);

    if ($num > 0) {
        $_SESSION['user'] = $num;
        $_SESSION['staff_name'] = $num['name']; // Set the user's name in the session
        // Redirect to index.php or any other page
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['errmsg'] = "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="https://i.ibb.co/F8pCvb0/logo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    <style>
        .uk-form-icon .uk-icon {
            color: #333;
        }
        
        .uk-password-toggle {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>GIITG</title>
    <link rel="stylesheet" href="style/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/Bootstrap/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.css"
        integrity="sha512-8M8By+q+SldLyFJbybaHoAPD6g07xyOcscIOQEypDzBS+sTde5d6mlK2ANIZPnSyxZUqJfCNuaIvjBUi8/RS0w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/uikit-rtl.min.css" />
    <link rel="stylesheet" href="style/uikit.min.css" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/style/uikit-rtl.min.css" />
    <link rel="stylesheet" href="/style/uikit.min.css" />
    <link rel="shortcut icon" href="https://i.ibb.co/swfD2Yt/giitglogo-01-01.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>GIITG</title>
    <link rel="stylesheet" href="style/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/Bootstrap/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.css"
        integrity="sha512-8M8By+q+SldLyFJbybaHoAPD6g07xyOcscIOQEypDzBS+sTde5d6mlK2ANIZPnSyxZUqJfCNuaIvjBUi8/RS0w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    
</head>
<body>

<div id="fullpage">
        <div class="section web-header">
            <div class="header-container">
                <div class="header-content">
                <div class="content-background">
        <div class="uk-section-large">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                    <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                    <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-header">
                                Please login before continue
                            </div>
                            <div class="uk-card-body">
                            <center>
                                <img src="https://i.ibb.co/BsCvKCj/giitglogo-01.png" alt="GIITG Logo" style="width: 500px;">
                                </center>
                                <?php
                                if (isset($_SESSION['errmsg'])) {
                                    ?>
                                    
                                    <?php
                                    unset($_SESSION['errmsg']);
                                }
                                ?>
                                <form method="post">
                                    <fieldset class="uk-fieldset">
                                        <div class="uk-margin">
                                            <div class="uk-position-relative">
                                                <span class="uk-form-icon ion-android-person"></span>
                                                <input name="email" class="uk-input" type="text" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-position-relative">
                                                <input name="password" id="password" class="uk-input" type="password" placeholder="Password">
                                                <span class="uk-password-toggle" onclick="togglePasswordVisibility()">
                                                    <span class="ion-eye" style="color: #333;"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <button type="submit" class="uk-button uk-button-primary" name="submit">
                                                <span class="ion-forward"></span>&nbsp; Login
                                            </button>
                                        </div>
                                        <hr />
                                    </fieldset>
                                </form>
                                <p class="signup-link">Don't have an account? <a href="signup.php" class="register-link">Sign-up now</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    
    
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var passwordToggleIcon = document.querySelector(".uk-password-toggle .ion-eye");
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordToggleIcon.classList.remove("ion-eye");
                passwordToggleIcon.classList.add("ion-eye-disabled");
                
                setTimeout(function() {
                    passwordField.type = "password";
                    passwordToggleIcon.classList.remove("ion-eye-disabled");
                    passwordToggleIcon.classList.add("ion-eye");
                }, 3000);
            }
        }
    </script>
</body>
</html>