<?php
include './particles/init.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Category List | Quiz Arcade</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon -->
  <link rel="shortcut icon" type="image/png" href="img/logosn2.png">
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
  <div class="all-content-wrapper">
    <div class="product-status">
      <div class="container-fluid">
        <div class="row" style="margin-top: 13vh;">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-status-wrap">
              <h4>Categories</h4>
              <div class="add-product">
                <a href="./addExam.php">Add Category</a>
              </div>
              <table>
                <tr>
                  <th>Sno.</th>
                  <th>Category Code</th>
                  <th>Category Name</th>
                  <th>Status</th>
                  <th>Total Questions</th>
                  <th>Total Minutes</th>
                  <th>Questions List</th>
                  <th>Setting</th>
                </tr>

                <?php
                // Pagination logic
                $items_per_page = 5; // Number of items per page
                $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($current_page - 1) * $items_per_page;

                // Fetch total number of categories
                $total_sql = "SELECT COUNT(*) FROM `categories`";
                $total_result = mysqli_query($conn, $total_sql);
                $total_categories = mysqli_fetch_array($total_result)[0];
                $total_pages = ceil($total_categories / $items_per_page);

                // Fetch categories for the current page
                $sql = "SELECT * FROM `categories` LIMIT $items_per_page OFFSET $offset";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                  $sno = $offset;
                  while ($row = mysqli_fetch_assoc($result)) {
                    $sno++;
                    $categoryID = $row['category_id'];
                    echo '
                      <tr>
                      <td>' . $sno . '</td>
                      <td>' . $row['category_code'] . '</td>
                      <td>' . $row['category_name'] . '</td>';

                    //For Checking status 

                    if ($row['category_status'] == "active") {
                      echo '<td><button class="pd-setting">Active</button></td>';
                    } elseif ($row['category_status'] == "paused") {
                      echo '<td><button class="ps-setting">Paused</button></td>';
                    } elseif ($row['category_status'] == "disabled") {
                      echo '<td><button class="ds-setting">Disabled</button></td>';
                    }
                    echo '
                            
                            <td>' . $row['category_question'] . '</td>
                            <td>' . $row['category_time'] . '</td>
                            <td>
                              <a href="./questionsList.php?cID=' . $categoryID . '" style="color:white;">
                              <button hr data-toggle="tooltip" title="See Questions" class="pd-setting-ed"><i class="fa fa-bars" aria-hidden="true"></i></button>
                              </a>
                            </td>
                            <td>
                              <a href="./addExam.php?action=edit&&cID=' . $categoryID . '" style="color:white;">
                                <button hr data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                              </a>
                              <a href="./particles/handleEditCategory.php?action=delete&&cID=' . $categoryID . '" style="color:white;">
                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                              </a>
                            </td>
                        </tr>';
                  }
                }
                ?>

              </table>
              <div class="custom-pagination">
                <ul class="pagination">
                  <?php if ($current_page > 1): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page - 1; ?>">Previous</a></li>
                  <?php endif; ?>

                  <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php endfor; ?>

                  <?php if ($current_page < $total_pages): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a></li>
                  <?php endif; ?>
                </ul>
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