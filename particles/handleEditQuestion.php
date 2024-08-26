<?php
include './config.php';
include './init.php';
$questionID = $_GET['cID'];
if (isset($_GET['action']) && $_GET['action'] == 'update') {
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $categoryCode = $_POST['categoryCode'];
        $categoryQuestion = $_POST['categoryQuestion'];
        $firstOption = $_POST['firstOption'];
        $secondOption = $_POST['secondOption'];
        $thirdOption = $_POST['thirdOption'];
        $fourthOption = $_POST['fourthOption'];
        $correctOptions = $_POST['correctOptions'];
        $updatedBy = $_SESSION['userId'];

        $sql = "UPDATE `category_questions` 
        SET `questionCategory` = '$categoryQuestion', 
            `firstOption` = '$firstOption', 
            `secondOption` = '$secondOption', 
            `thirdOption` = '$thirdOption', 
            `fourthOption` = '$fourthOption', 
            `correctOptions` = '$correctOptions', 
            `categoryCode` = '$categoryCode', 
            `updatedBy_Id` = '$updatedBy'
        WHERE `questionId` = '$questionID'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'yes';
        } else {
            echo 'no';
        }
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $sql = "DELETE FROM `category_questions` WHERE `categoryId` = '$questionID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:../examList.php?question=delete");
        exit();
    } else {
        header("Location:../examList.php?question=deletefailed");
        exit();
    }
}
