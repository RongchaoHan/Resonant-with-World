
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">

    <title>Products</title>
</head>
<body>

<?php
if (empty($_POST["product_id"]) || empty($_POST["file"] || empty($_POST["id"]))):
$errors=[];


?>
<h1>Create new Product image</h1>



<form action="product_image_insert.php" method="post">
    <div class="mb-3">
        <label> Product ID </label>
        <input type="text" class="form-control" name="product_id" >
    </div>
    <div class="mb-3">
        <label>ID</label>
        <input type="number" step=".01" class="form-control" name="id" >
    </div>
    <div class="mb-3">
        <label>Product image</label>
        <br>
        <input type="file" name="product_image_filename" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php else:
    include("connection/connection.php");
    $pdo = new PDO('mysql:localhost=$db_host;dbname=fit2104A2_db', $db_username, $db_passwd );
    echo "connection success!";
    $query = "INSERT INTO `product_image` (`id`, `product_id`,`product_image_filename`) VALUES ('$_POST[id]', '$_POST[product_id]','$_POST[product_image_filename]')";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);



    ?>
    <!-- success message-->
    <div class="alert alert-success">
        <strong>Success!</strong> A new product has been added
    </div>
    <pre><?php echo $result; ?></pre>

<?php endif; ?>

</body>
</html>