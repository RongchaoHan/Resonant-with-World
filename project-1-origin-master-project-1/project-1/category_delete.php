<?php

$PAGE_ID = "category_delete";
$PAGE_HEADER = "Category_delete";

require 'connection/connection.php';
/** @var PDO $pdo Database connection */

function function_alert($message)
{

    // Display the alert box
    echo "<script>alert('$message');</script>";
}

$id = $_GET['id'];
if ($id) {
    $category_stmt = $pdo->prepare("DELETE FROM category WHERE id = $id");
    $category_stmt->execute();
    $category_stmt = $pdo->prepare("UPDATE category SET  id = id-1 WHERE id > $id");
    $category_stmt->execute();
    header('Location: category.php');
    exit();
}


//<!-- success message-->
