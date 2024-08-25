<?php
include './config.php';
include './init.php';
$adminID = $_SESSION['userId'];
$categoryID = $_GET['cID'];
if (isset($_GET['action']) && $_GET['action'] == 'update') {

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $categoryCode = $_POST['categoryCode'];
        $categoryName = $_POST['categoryName'];
        $status = $_POST['status'];
        $totalQuestions = $_POST['totalQuestions'];
        $totalMinutes = $_POST['totalMinutes'];

        //Update data into database
        $sql = "UPDATE `categories` 
        SET `category_code` = '$categoryCode', 
            `category_name` = '$categoryName', 
            `category_status` = '$status', 
            `category_question` = '$totalQuestions', 
            `category_time` = '$totalMinutes', 
            `admin_id` = '$adminID' 
        WHERE `category_id` = '$categoryID'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'Update Yes' . $adminID;
        } else {
            echo 'Update no';
        }
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $sql = "DELETE FROM `categories` WHERE `category_id` = '$categoryID'";
    $result = mysqli_query($conn, $sql);
}
