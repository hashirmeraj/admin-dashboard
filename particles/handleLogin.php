<?php
include './config.php';

// Determine the request method
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    // Retrieve and sanitize user input
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

    // Fetch email from database
    $existEmail = "SELECT * FROM `users1` WHERE `user_email` = '$loginEmail'";
    $result = mysqli_query($conn, $existEmail);
    $numAccount = mysqli_num_rows($result);

    // Check if the email exists in the database
    if ($numAccount == 1) {
        $row = mysqli_fetch_assoc($result);

        $userId = $row['user_id'];
        $userName = $row['user_name'];
        $userPassword = $row['user_password'];

        // Verify the provided password against the stored hashed password
        if (password_verify($loginPassword, $userPassword)) {

            // Start session and store user information
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['userId'] = $userId;
            $_SESSION['userName'] = $userName;

            // Redirect to the dashboard
            header("Location:../index.php?loggedin=true");
            exit();
        } else {
            // Set error message for invalid password
            $loginError = 'Invalid password';
        }
    } else {
        // Set error message for invalid email
        $loginError = 'Invalid Email';
    }
}

// Redirect back to login page with error message
header("Location:../login.php?login=false&&error=" . urlencode($loginError));
exit();
