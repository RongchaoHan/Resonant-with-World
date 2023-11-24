<?php
ob_start(); // To allow setting header when there's already page contents rendered

/** @var string $PAGE_ID Identify which page is loading the header, so the active menu item can be correctly recognised */
/** @var string $PAGE_HEADER The page title set in individual pages */
/** @var string $PAGE_USERNAME Username of the current logged in user */
/** @var string $PAGE_ALLOWGUEST If a page allows guest to visit */

// Database connection
require('connection/connection.php');

/** @var PDO $pdo Database connection */

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title><?= empty($PAGE_HEADER) ? "" : $PAGE_HEADER . " - " ?>FIT2104-Assignment1-Anna sola</title>

    <!-- Custom fonts for this template-->
    <link href="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="Dash/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="header.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Anna <sup> Sola</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item<?= ($PAGE_ID == 'home') ? ' active' : '' ?>">
            <a class="nav-link" href="index.php">
                <i class="fa-address-book"></i>
                <span>Homepage</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            FEATURES
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item" >
            <a class="nav-link collapsed" href="client.php" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa-id-badge"></i>
                <span>Clients' Management </span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Clients Components:</h6>
                    <a class="collapse-item " href="client.php">Clients Lists</a>
                    <a class="collapse-item" href="client_email.php">Send email to clients</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item <?= ($PAGE_ID == 'photo') ? ' active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-building"></i>
                <span>Photo Management</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Photoshoot Event:</h6>
                    <a class="collapse-item" href="Photo_shoot.php"> Photoshoot lists </a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
               aria-expanded="true" aria-controls="collapseUtilities1">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Products Management</span>
            </a>
            <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#collapseUtilities1">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Products Event:</h6>
                    <a class="collapse-item" href="product.php"> Products List</a>
                    <a class="collapse-item" href="category.php">Category List</a>
                </div>
            </div>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading" style=" color: rgba(255, 255, 255, 0.8);">
            Account


        <!-- Nav Item - Pages Collapse Menu -->
        <?php if (empty($PAGE_USERNAME)): ?>
            <li class="nav-link2" style=" color: rgba(255, 255, 255, 0.8);">
                <a  style=" color: rgba(255, 255, 255, 0.8);" class="nav-link" href="login.php">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                    <i style=" color: rgba(255, 255, 255, 0.8);" class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-white-50-800"></i> Login
                </a>
            </li>
        <?php else: ?>
            <li class="nav-link" style=" color: rgba(255, 255, 255, 0.8);">
                <a  style="  color: rgba(255, 255, 255, 0.8);" href="logout.php">
                    <span  style=" color: rgba(255, 255, 255, 0.8);" class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $PAGE_USERNAME ?></span>
                    <i class="fas fa-sign-out fa-sm fa-fw mr-2 text-gray-400" ></i> Logout
                </a>

            </li>
        <?php endif; ?>
        </div>



        <!-- Nav Item - Charts -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->


    </ul>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->







<!-- Bootstrap core JavaScript-->
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.slim.js"></script>
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.js"></script>

<!-- Custom scripts for all pages-->
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.js"></script>

<!-- Page level plugins -->
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.js"></script>

<!-- Page level custom scripts -->
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/js/demo/chart-area-demo.js"></script>
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/js/demo/chart-pie-demo.js"></script>

</body>



</html>
