<?php
ob_start();
$PAGE_ID = "register";
$PAGE_HEADER = "rehg";
$PAGE_ALLOWGUEST = true; // Homepage should allow guest to visit
require 'connection/connection.php';


if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email);
    $query->execute();
    if ($query->rowCount() > 0) {



       // echo '<p class="alert-danger error">The email address is already registered!</p>';


        echo ' 
             <div class="container-fluid px-4">
                <div class="alert alert-success  ">
                   <strong>ERROR!</strong> The email address is already registered!
                  <a href="register.php" type="button" class="btn btn-primary">Try again</a>
               </div>
             </div> ';
    }
    if ($query->rowCount() == 0) {
        $query = $pdo->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password_hash,:email)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
           // echo '<p class="alert alert-success">Your registration was successful!</p>';

            echo ' 
             <div class="container-fluid px-4">
                <div class="alert alert-success  ">
                   <strong>Success!</strong> Your registration was successful!
                  <a href="login.php" type="button" class="btn btn-primary"> GO BACK TO LOGIN</a>
               </div>
             </div> ';

        }
        else {

          //  echo '<p class="alert-danger error">Something went wrong!</p>';
            echo ' 
             <div class="container-fluid px-4">
                <div class="alert alert-success  ">
                   <strong>ERROR!</strong> Something went wrong! Contact the Admin
                  <a href="register.php" type="button" class="btn btn-primary"> Try again</a>
               </div>
             </div> ';

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

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

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="" name="signup-form">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="username" class="form-control form-control-user" id="validationServer01"
                                           placeholder="Username"  required>

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email"  name="email" class="form-control form-control-user" id="exampleInputEmail"
                                       placeholder="Email Address" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user"
                                           id="exampleInputPassword" placeholder="Password" required>
                                </div>
                            </div>
                            <button  class="btn btn-primary btn-block" type="submit" name="register" value="register">Register Account</button>
                            <hr>
                        </form>
                        <hr>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="Dash/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.js"></script>
<style type="text/css">

    input:required:invalid, input:focus:invalid {
        /* insert your own styles for invalid form input */
        -moz-box-shadow: none;
    }

</style>
</body>

</html>