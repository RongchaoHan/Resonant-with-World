<?php

function  check_login($dbh)
{
    if (isset($_SESSION['user_id'])) {
        $user_stmt = $dbh->prepare("SELECT * FROM `user` WHERE `id` = ?");
        if ($user_stmt->execute([$_SESSION['user_id']]) && $user_stmt->rowCount() == 1) {
            //User already logged in, redirect user to dashboard
            header("Location: index.php");
        } else {
            session_destroy();
            header("Location: login.php");
        }
    }
}