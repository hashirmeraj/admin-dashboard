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
            header("Location:../addExam.php?update=success");
            exit();
        } else {
            header("Location:../addExam.php?update=failed");
            exit();
        }
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $sql = "DELETE FROM `categories` WHERE `category_id` = '$categoryID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:../examList.php?update=delete");
        exit();
    } else {
        header("Location:../examList.php?update=deletefailed");
        exit();
    }
}
header("Location:../addExam.php");
exit();
