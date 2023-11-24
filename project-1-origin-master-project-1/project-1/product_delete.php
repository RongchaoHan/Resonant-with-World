<?php

$PAGE_ID = "product_delete";
$PAGE_HEADER = "Product_delete";

require 'connection/connection.php';
/** @var PDO $pdo Database connection */

function function_alert($message)
{

    // Display the alert box
    echo "<script>alert('$message');</script>";

    // header("Location:client.php");
    // exit;
}

$id = $_GET['id'];
if ($id) {
    $product_stmt = $pdo->prepare("DELETE FROM products WHERE id = $id");
    $product_stmt->execute();
    $product_stmt = $pdo->prepare("UPDATE products SET  id = id-1 WHERE id > $id");
    $product_stmt->execute();
    //echo $stmt->rowCount() . ' row(s) was deleted successfully.';
    header('Location: product.php');
    exit();
}


    //<!-- success message-->
