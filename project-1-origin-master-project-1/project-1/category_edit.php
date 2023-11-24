<?php
$PAGE_ID = "category_edit";
$PAGE_HEADER = "Category_edit";



/** @var PDO $pdo Database connection */
?>
<?php
require 'header.php';
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: category.php');
    exit;
}

$id = $_GET['id'];

if (!$id) {
    header('Location: category.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $category_name  = $_POST['category_name'];
    $product_id = $_POST['product_id'];


    if (!$category_name ) {
        $errors[] = 'Category name is required';
    }

    if (!$product_id) {
        $errors[] = 'Product ID is required ';
    }


    if (empty($errors)) {
        echo $category_name;
        $stmt = $pdo->prepare("UPDATE category
                                        SET  category_name = :category_name,
                                        WHERE id = :id");

        $stmt->bindValue(':category_name', $category_name);
        $stmt->bindValue(':product_id', $product_id);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        header('Location: category.php');
    }

} else {
    $stmt = $pdo->prepare("SELECT * FROM category WHERE id=?");
    $stmt->execute([$id]);
    $categories = $stmt->fetchObject();
}

?>
    <div class="container-fluid">
        <p>
            <a href="category_edit.php" class="btn btn-default">Back to List</a>
        </p>
        <h1>Edit Category List: <b><?php echo $categories->category_name ?> </b> </h1>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <div><?php echo $error ?></div>
                <?php endforeach;?>
            </div>
        <?php endif;?>

        <form method="post">
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="category_name" class="form-control" value="<?php echo $categories->category_name  ?>" required>
            </div>
            <div class="form-group">
                <label>Product ID</label>
                <input  type="text" class="form-control" name="product_id" value="<?php echo $categories->product_id ?>" required>
            </div>

            <input type="hidden" name="id" value="<?= $categories->id ?>" />
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