
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
if (empty($_POST["product_name"]) || empty($_POST["product_upc"] || empty($_POST["product_price"] || empty($_POST["product_category"])))):
    $errors=[];


    ?>
    <h1>Create new Products</h1>

    <form action="product_insert.php" method="post">
        <div class="mb-3">
            <label> Product ID </label>
            <input type="number" class="form-control" name="id" >
        </div>
        <div class="mb-3">
            <label>Product name</label>
            <input type="text" step=".01" class="form-control" name="product_name" >
        </div>

        <div class="mb-3">
            <label>Product UPC</label>
            <input type="number" step=".01" class="form-control" name="product_upc" >
        </div>

        <div class="mb-3">
            <label>Product Price</label>
            <input type="number" step=".01" class="form-control" name="product_price" >
        </div>

        <div class="mb-3">
            <label>Product category</label>
            <input type="text" step=".01" class="form-control" name="product_category" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


<?php else:
    include("connection/connection.php");
    $pdo = new PDO('mysql:localhost=$db_host;dbname=fit2104A2_db', $db_username, $db_passwd );
    echo "connection success!";
    $query = "INSERT INTO `products` (`id`,`product_name`,`product_upc`,`product_price`,`product_category`) VALUES ('$_POST[id]', '$_POST[product_name]','$_POST[product_upc]','$_POST[product_price]','$_POST[product_category]')";

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