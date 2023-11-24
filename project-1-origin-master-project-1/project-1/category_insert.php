<?php
$PAGE_ID = "category_insert";
$PAGE_HEADER = "Category_insert";

require 'header.php';

/** @var PDO $pdo Database connection */
?>


<?php

if (empty($_POST["category_name"])):
    $errors = [];
    ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $category_name = $_POST['category_name'];
        $product_id = $_POST['product_id'];
        $id = $_POST['id'];
    }
    ?>

    <div class="container-fluid px-4">
    <h1>Create New Category </h1>

    <form action="category_insert.php" method="post">


        <div class="mb-3">
            <label>Category Name</label>
            <input type="text" class="form-control" name="category_name" >
        </div>

        <div class="mb-3">
            <label>Product ID</label>
            <input type="text" class="form-control" name="product_id" >
        </div>


        <button type="submit" class="btn btn-primary" name="category_insert">Submit</button>
    </form>
        <?php require 'footer.php';?>
    <style type="text/css">

        input:required:invalid, input:focus:invalid {
            /* insert your own styles for invalid form input */
            -moz-box-shadow: none;
        }

    </style>

<?php else:
    if (!isset($_POST['category_insert'])) {

        // echo "connection success!";
        $query = "INSERT INTO `category` (`id`,`category_name`,`product_id`) 
           VALUES ('$_POST[id]','$_POST[category_name]','$_POST[product_id]')";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    ?>

    <!-- success message-->
    <div class="container-fluid px-4">
    <div class="alert alert-success">
        <strong>Success!</strong> A new Category has been added into
        <a href="category.php" type="button" class="btn btn-primary"> GO BACK THE LIST </a>
    </div>
</div>
<?php endif;?>
