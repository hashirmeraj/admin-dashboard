<?php

$userName = $_SESSION['userName'];
$userName = htmlspecialchars(ucfirst(strtok($userName, " ")), ENT_QUOTES, 'UTF-8');
echo '
    <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse"
                                                class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="icon hashir-menu-task"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n hd-search-rp">
                                            <div class="breadcome-heading">
                                                <form role="search" class="">
                                                    <input type="text" placeholder="Search..." class="form-control">
                                                    <a href=""><i class="fa fa-search"></i></a>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                        
                                            
                                    
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">


                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <i class="icon hashir-user"></i>
                                                        <span class="admin-name">' . $userName . '</span>
                                                        <i class="icon hashir-down-arrow hashir-angle-dw"></i>
                                                    </a>
                                                    <ul role="menu"
                                                        class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                            
                                                
                                                        
                                                        <li><a href="./particles/logout.php"><span
                                                                    class="icon hashir-unlocked author-log-ic"></span>
                                                                Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a class="has-arrow" href="index.php">
                                <i class="icon hashir-home icon-wrap"></i>
                                <span class="mini-click-non">Dashboard</span>
                            </a>
                                            <ul class="collapse dropdown-header-top">
                                                <li class="active">
                            <a class="has-arrow" href="index.php">
                                <i class="icon hashir-home icon-wrap"></i>
                                <span class="mini-click-non">Dashboard</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="index.php"><span class="mini-sub-pro">Home
                                            </span></a></li>
                                <li><a title="Product List" href="examList.php"><span class="mini-sub-pro">Test 
                                        Category</span></a></li>
                                <li><a title="Product Edit" href="./addExam.php"><span class="mini-sub-pro">Add 
                                        Test Category</span></a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a  href="./particles/logout.php" aria-expanded="false"><i
                                    class="icon hashir-unlocked icon-wrap"></i> <span
                                    class="mini-click-non">Log out</span></a>
                            
                        </li>
                                            </ul>
                                        </li>

                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
