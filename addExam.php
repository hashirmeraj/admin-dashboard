<?php
$addQuestion = false;
$errorQuestion = false;
include './particles/init.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {

    header("Location:./login.php");
    exit();
}
if (isset($_GET['add']) && $_GET['add'] == "true") {
    $addQuestion = true;
} elseif (isset($_GET['add']) && $_GET['add'] == "false") {
    $errorQuestion = true;
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product List | hashir - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- CSS files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/hashir-icon.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <?php
    include './particles/config.php';
    include './particles/sidebar.php';
    include './particles/header.php';
    ?>
    <!-- Start Welcome area -->
    <div class="single-product-tab-area mg-b-30">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row " style="margin-top: 13vh; margin-left:12rem;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">

                            <?php
                            if ($addQuestion) {
                                echo '
                                <div class="container-fluid" >
                                <span style="font-size: 1.1rem; color:darkgreen;">
                                Your question has been added successfully!
                                </span>
                                </div>';
                            } elseif ($errorQuestion) {
                                echo '
                                <div class="container-fluid" >
                                <span style="font-size: 1.1rem; color:darkred;">
                                The selected category is invalid. Please enter a valid category and try again.
                                </span>
                                </div>';
                            }
                            ?>


                            <?php

                            if (isset($_GET['action']) && $_GET['action'] == 'edit') {
                                $categoryID = $_GET['cID'];
                                $sql = "SELECT * FROM `categories` WHERE `category_id` = '$categoryID'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);



                                echo '
                                        <ul id="myTab3" class="tab-review-design">
                                            <li class="active"><a href="#description"><i class="icon hashir-edit" aria-hidden="true"></i> Update Category</a></li>
                                            <li><a href="#INFORMATION"><i class="icon hashir-chat" aria-hidden="true"></i> Review</a></li>
                                            
                                            
                                        </ul>
                                        <div id="myTabContent" class="tab-content custom-product-edit">
                                            <div class="product-tab-list tab-pane fade active in" id="description">
                                                <form action="./particles/handleEditCategory.php?action=update&&cID=' . $categoryID . '" method="post">
                                            <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon hashir-unlocked" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Category Code" name="categoryCode" required value="' . $row['category_code'] . '">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon hashir-new-file" aria-hidden="true"></i></span>
                                                        <input type="number" class="form-control" placeholder="Total Questions" name="totalQuestions" required value="' . $row['category_question'] . '">
                                                    </div>
                                                    <select name="status" class="form-control pro-edt-select form-control-primary mg-b-pro-edt" required>
                                                        <option value="active">Change Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="paused">Paused</option>
                                                        <option value="disabled">Disabled</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon hashir-new-file" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Category Name" name="categoryName" required value="' . $row['category_name'] . '">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt col-lg-12">
                                                        <span class="input-group-addon"><i class="icon hashir-new-file" aria-hidden="true"></i></span>
                                                        <input type="number" class="form-control" placeholder="Total Minutes" name="totalMinutes" required value="' . $row['category_time'] . '">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update</button>
                                                    <button type="reset" class="btn btn-ctl-bt waves-effect waves-light">Discard</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        ';
                            } else {
                                echo '
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="icon hashir-edit" aria-hidden="true"></i> Product Edit</a></li>
                                    <li><a href="#INFORMATION"><i class="icon hashir-chat" aria-hidden="true"></i> Review</a></li>
                                    <li><a href="#reviews"><i class="icon hashir-picture" aria-hidden="true"></i> Pictures</a></li>
                                </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                            <form action="./particles/handleCategory.php" method="post">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon hashir-unlocked" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Category Code" name="categoryCode" required>
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon hashir-new-file" aria-hidden="true"></i></span>
                                                        <input type="number" class="form-control" placeholder="Total Questions" name="totalQuestions" required>
                                                    </div>
                                                    <select name="status" class="form-control pro-edt-select form-control-primary mg-b-pro-edt" required>
                                                        <option value="active">Select Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="paused">Paused</option>
                                                        <option value="disabled">Disabled</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon hashir-new-file" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Category Name" name="categoryName" required>
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt col-lg-12">
                                                        <span class="input-group-addon"><i class="icon hashir-new-file" aria-hidden="true"></i></span>
                                                        <input type="number" class="form-control" placeholder="Total Minutes" name="totalMinutes" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save</button>
                                                    <button type="reset" class="btn btn-ctl-bt waves-effect waves-light">Discard</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        ';
                            }
                            ?>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="INFORMATION">
                            <form action="./particles/handleQuestions.php" method="post">
                                <div class="row">

                                    <div class="form-group col-lg-6">
                                        <div class="input-group  col-lg-12">
                                            <span class="input-group-addon"><i class="icon hashir-unlocked" aria-hidden="true"></i></span>
                                            <input class="form-control" type="text" placeholder="Category Code" name="categoryCode" required>
                                        </div>

                                    </div>
                                    <div class="form-group col-lg-12">
                                        <div class="input-group  col-lg-12">
                                            <span class="input-group-addon"><i class="icon hashir-unlocked" aria-hidden="true"></i></span>
                                            <input class="form-control" type="text" placeholder="Add Question" name="categoryQuestion" required>
                                        </div>

                                    </div>
                                    <div class="form-group col-lg-12">
                                        <div class="input-group  col-lg-12">
                                            <span class="input-group-addon"><i class="icon hashir-tick" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="First Option" name="firstOption" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <div class="input-group  col-lg-12">
                                            <span class="input-group-addon"><i class="icon hashir-tick" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Second Option" name="secondOption" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <div class="input-group  col-lg-12">
                                            <span class="input-group-addon"><i class="icon hashir-tick" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Third Option" name="thirdOption">

                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <div class="input-group  col-lg-12">
                                            <span class="input-group-addon"><i class="icon hashir-tick" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Fourth Option" name="fourthOption">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <div class="input-group  col-lg-12">
                                            <span class="input-group-addon"><i class="icon hashir-down-arrow" aria-hidden="true"></i></span>

                                            <select name="correctOptions" class="form-control pro-edt-select form-control-primary mg-b-pro-edt" required>
                                                <option value="first">Select Correct Option</option>
                                                <option value="first">First Option</option>
                                                <option value="second">Second Option</option>
                                                <option value="third">Third Option</option>
                                                <option value="fourth">Fourth Option</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class=" review-pro-edt">
                                    <button type="submit" class="btn btn-ctl-bt waves-effect waves-light">Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- JS files -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>