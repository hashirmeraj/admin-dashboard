<?php
$servername = 'localhost'; // Server name, including port if not the default (3306)
$username = 'root'; // MySQL username
$password = ''; // MySQL password (empty if not set)
$dbname = 'admin_dashboard'; // Name of the database to connect to

// Establishing a connection to the MySQL database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    // If the connection fails, redirect to a 404 error page
    header('Location: ../404.html');
    exit(); // Terminate the script to ensure the redirection occurs
}
