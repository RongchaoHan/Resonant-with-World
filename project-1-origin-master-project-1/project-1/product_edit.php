<?php
$PAGE_ID = "product_edit";
$PAGE_HEADER = "Product_edit";



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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $product_name  = $_POST['product_name'];
    $product_upc   = $_POST['product_upc'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];


    if (!$product_name ) {
        $errors[] = 'product name is required';
    }

    if (!$product_upc) {
        $errors[] = 'UPC is required ';
    }

    if (!$product_price) {
        $errors[] = 'Price is required';
    }

    if (!$product_category) {
        $errors[] = 'Category invalid';
    }


    if (empty($errors)) {
        $stmt = $pdo->prepare("UPDATE products 
                                        SET  product_name = :product_name,
                                        product_upc = :product_upc,
                                        product_price = :product_price,
                                        product_category = :product_category 
                                        WHERE id = :id");

        $stmt->bindValue(':product_name', $product_name);
        $stmt->bindValue(':product_upc', $product_upc);
        $stmt->bindValue(':product_category', $product_category);
        $stmt->bindValue(':product_price', $product_price);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        header('Location: product.php');
    }

} else {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
    $stmt->execute([$id]);
    $products = $stmt->fetchObject();
}

?>
    <div class="container-fluid">
        <p>
            <a href="product_edit.php" class="btn btn-secondary">Back to List</a>
        </p>
        <h1>Edit Product List: <b><?php echo $products->product_name ?> </b> </h1>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <div><?php echo $error ?></div>
                <?php endforeach;?>
            </div>
        <?php endif;?>

        <form method="post">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control" value="<?php echo $products->product_name  ?>" required>
            </div>
            <div class="form-group">
                <label>UPC</label>
                <input  type="text" class="form-control" name="product_upc" value="<?php echo $products->product_upc ?>" required>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="product_price" value="<?php echo $products->product_price?>" required>
            </div>

            <?php
            $query= "SELECT category_name FROM category";
            $categories = $pdo->query($query);
            ?>
            <div class="mb-3">
                <label>Category</label>
                <input type="text"  class = "form-control" list = "categoryList"
                       name="product_category" placeholder="Choose a category">
                <datalist id = "categoryList">
                    <?php
                    foreach ($categories->fetchAll() as $category)
                    {
                        echo "<option>$category[category_name]</option>";
                    }
                    ?>
                </datalist>


            </div>


            <input type="hidden" name="id" value="<?= $products->id ?>" />
            <input type="submit" class="btn btn-primary" value="Update" />
        </form>
    </div>

    <style type="text/css">

        input:required:invalid, input:focus:invalid {
            /* insert your own styles for invalid form input */
            -moz-box-shadow: none;
        }

    </style>

<?php require 'footer.php';?>