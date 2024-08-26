<?php
include './config.php';
include './init.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $categoryCode = $_POST['categoryCode'];

    //Check Category code is correct or not

    $sql = "SELECT `category_id`, `category_code` FROM `categories` WHERE `category_code` = '$categoryCode'";
    $result = mysqli_query($conn, $sql);
    $categoryExist = mysqli_num_rows($result);
    if ($categoryExist > 0) {
        $row = mysqli_fetch_assoc($result);
        $categoryId = $row['category_id'];
        $categoryQuestion = $_POST['categoryQuestion'];
        $firstOption = $_POST['firstOption'];
        $secondOption = $_POST['secondOption'];
        $thirdOption = $_POST['thirdOption'];
        $fourthOption = $_POST['fourthOption'];
        $correctOptions = $_POST['correctOptions'];
        $adminId = $_SESSION['userId'];
        $adminName = $_SESSION['userName'];

        $sql = "INSERT INTO `category_questions` ( `questionCategory`, `firstOption`, `secondOption`, `thirdOption`, `fourthOption`, `correctOptions`, `categoryId`, `categoryCode`, `adminId`, `adminName`) 
        VALUES ( '$categoryQuestion', '$firstOption', '$secondOption', '$thirdOption', '$fourthOption', '$correctOptions', '$categoryId', '$categoryCode', '$adminId', '$adminName')";
        $result = mysqli_query($conn, $sql);
        header("Location:../addExam.php?add=true");
        exit();
    } else {
        $existError = "Category does not exist";
    }
}
header("Location:../addExam.php?add=false&error=" . urlencode($existError));
exit();
