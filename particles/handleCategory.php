<?php
include './config.php';
include './init.php';

//checking if category exist or not 

echo $categoryCode = $_POST['categoryCode'];
$sql = "SELECT `category_code` FROM `categories` WHERE `category_code` = '$categoryCode'";
$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);
if ($row > 0) {
    $errorMessage = "Category already exist";
} else {

    $adminID = $_SESSION['userId'];

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {

        $categoryName = $_POST['categoryName'];
        $status = $_POST['status'];
        $totalQuestions = $_POST['totalQuestions'];
        $totalMinutes = $_POST['totalMinutes'];

        //Inserting data into database

        $sql = "INSERT INTO `categories`(`category_code`, `category_name`, `category_status`, `category_question`, `category_time`, `admin_id`) VALUES ('$categoryCode','$categoryName','$status','$totalQuestions','$totalMinutes','$adminID')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location:../addExam.php?addCat=true");
            exit();
        }
    }
}
header("Location:../addExam.php?addCat=false&&error=" . urlencode($existError));
exit();
