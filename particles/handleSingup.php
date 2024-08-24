<?php
include './config.php';

// Get the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    // Retrieve and sanitize input data to prevent XSS attacks
    $username = htmlspecialchars($_POST['Sing_username']);
    $userEmail = htmlspecialchars($_POST['Sing_email']);
    $userPassword = htmlspecialchars($_POST['Sing_password']);
    $confirmPassword = htmlspecialchars($_POST['Sing_ConPassword']);

    // Check whether the email already exists in the database
    $existEmail = "SELECT * FROM `users1` WHERE user_email = '$userEmail'";
    $result = mysqli_query($conn, $existEmail);
    $numRow = mysqli_num_rows($result);

    if ($numRow > 0) {
        // Email already exists, set an error message
        $error = 'Email already exists';
    } else {
        // If passwords match, hash the password and insert the user data into the database
        if ($userPassword == $confirmPassword) {
            $hash = password_hash($userPassword, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users1`(`user_name`, `user_email`, `user_password`) VALUES ('$username', '$userEmail', '$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // Redirect to the register page with a success message
                header("Location: ../register.php?singupsuccess=true");
                exit();
            } else {
                $error = 'Registration failed';
            }
        } else {
            // Passwords do not match, set an error message
            $error = 'Passwords do not match';
        }
    }

    // Redirect to the register page with the error message
    header("Location: ../register.php?singupsuccess=false&error=" . urlencode($error));
    exit();
}
