<?php
$PAGE_ID = "products_view";
$PAGE_HEADER = "Products_view";


/** @var PDO $pdo Database connection */
?>

<?php
require 'header.php';
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: product.php');
    exit;
}

$id = $_GET['id'];

if (!$id) {
    header('Location: product.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM products WHERE id=$id");
$stmt->execute();
$products = $stmt->fetchObject();

?>



<div class=" mb-14">

    <p>
        <a href="product.php" class="btn btn-danger">Back to Products</a>
    </p>

    <div class="card-header py-10">
        <h6 class="m-0 font-weight-bold text-primary"><h1>View Product:  </h1></h6>
        <h2><?php echo $products->product_name ?> </h2>
    </div>

    <div class="card-body">
        <label>Product ID :</label>
        <label><?php echo $products->id ?></label>
    </div>
    <div class="card-body">
        <label>UPC :</label>
        <label><?php echo $products->product_upc ?></label>
    </div>
    <div class="card-body">
        <label>Price :</label>
        <label><?php echo $products->product_category ?></label>
    </div>

    <div class="card-body">
        <label>Category :</label>
        <label><?php echo $products->product_category ?></label>
    </div>

    <div class="card-body">
        <label>Images : </label>
    </div>


</div>
    <?php require 'footer.php';?>
</div>
</div>

