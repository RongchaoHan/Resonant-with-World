<?php
$PAGE_ID = "product_insert";
$PAGE_HEADER = "Product_insert";

require 'header.php';

/** @var PDO $pdo Database connection */
?>


<?php

if (empty($_POST["product_name"]) || empty($_POST["product_upc"] || empty($_POST["product_price"] || empty($_POST["prodcut_category"])))):
    $errors = [];
?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $product_name = $_POST['product_name'];
    }
    ?>

    <div class="container-fluid px-4">
    <h1>Create New Event </h1>

    <form action="product_insert.php" method="post">


        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" class="form-control" name="product_name" >
        </div>

        <div class="mb-3">
            <label>UPC</label>
            <input type="text"  class="form-control" name="product_upc" >
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="number"  class="form-control" name="product_price" >
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
        <div class="mb-3">
            <label>Images</label>
        </div>


        <button type="submit" class="btn btn-primary" name="product_insert">Submit</button>
    </form>
    <style type="text/css">

        input:required:invalid, input:focus:invalid {
            /* insert your own styles for invalid form input */
            -moz-box-shadow: none;
        }

    </style>

<?php else:
    if (isset($_POST['product_insert'])) {
        $query = "INSERT INTO products (`id`,`product_name`,`product_upc`,`product_price`,`product_category`) 
                    VALUES ((select max(id)+1 from products pd), 
                            '$_POST[product_name]', '$_POST[product_upc]',
                            '$_POST[product_price]','$_POST[product_category]')";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    ?>


    <!-- success message-->
    <div class="alert alert-success">
        <strong>Success!</strong> A new Product has been added into the system
    </div>
<?php endif;?>
<?php require 'footer.php';?>