<?php
ob_start(); // To allow setting header when there's already page contents rendered
$PAGE_ID = "login";
$PAGE_HEADER = "Logg";

require 'connection/connection.php';

/** @var PDO $pdo Database connection */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        //Run some SQL query here to find that user
        $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `username` = :username");
        $stmt->execute([
            'username' => $_POST['username']
        ]);
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetchObject();
            if(password_verify($_POST['password'], $row->password)) {
                $_SESSION['user_id'] = $row->id;
                //Successfully logged in, redirect user to referer, or index page
                if (empty($_SESSION['referer'])) {
                    header("Location: index.php");
                } else {
                    if($_SESSION['referer'] != 'register.php') {
                        header("Location: " . $_SESSION['referer']);
                    } else {
                        header("Location: index.php");
                    }

                }
            } else {
                header("Location: login.php?action=error&message=" . urlencode('Your username and/or password is incorrect. Please try again!'));

            }

        } else {
            header("Location: login.php?action=error&message=" . urlencode('Your username and/or password is incorrect. Please try again!'));
        }
    } else {
        header("Location: login.php?action=error&message=" . urlencode('Please enter both username and password to login!'));
    }
    exit();
}
?>
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">You have logged out successfully.</div>
        </div>
    </div>
</div>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="Dash/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class=""></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                               id="exampleInputEmail"  name="username" aria-describedby="emailHelp"
                                               placeholder="Enter User name..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password"  name="password"  class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Password" required>
                                    </div>

                                    <button type="submit"   name="login" value="login" class="btn btn-primary btn-user btn-block">Login</button>
                                    <hr>

                                </form>

                                <div class="card-footer text-center py-3">

                                    Need an account?
                                    <div class="small"><a href="register.php"> Sign up!</a></div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>



</body>


<!-- Bootstrap core JavaScript-->
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.js"></script>



