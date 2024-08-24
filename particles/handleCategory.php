<?php
include './config.php';
include './init.php';
$adminID = $_SESSION['userId'];
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $categoryCode = $_POST['categoryCode'];
    $categoryName = $_POST['categoryName'];
    $status = $_POST['status'];
    $totalQuestions = $_POST['totalQuestions'];
    $totalMinutes = $_POST['totalMinutes'];

    //Inserting data into database

    $sql = "INSERT INTO `categories`(`category_code`, `category_name`, `category_status`, `category_question`, `category_time`, `admin_id`) VALUES ('$categoryCode','$categoryName','$status','$totalQuestions','$totalMinutes','$adminID')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'yes' . $adminID;
    } else {
        echo 'no';
    }
}
