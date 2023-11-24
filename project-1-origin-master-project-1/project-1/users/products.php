

<!doctype html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/styles.css">

    <title>Clients </title>
</head>
<?php include "partials/headerPHP.php"
?>
<body>
<h1>Products' list</h1>



<?php
include("connection/connection.php");


$query=('SELECT * FROM products');
$pdo = new PDO('mysql:localhost=$db_host;dbname=fit2104A2_db', $db_username, $db_passwd );
$stmt=$pdo->prepare($query);

if ($stmt->execute()): ?>
    <div class="center">
        <p class="yes" >
            <a href="product_insert.php" type="button" class="btn btn-success">CREATE NEW PRODUCT </a>
        </p>
        <table class="table">
            <thead>
            <tr>

                <th scope="col">#</th>
                <th scope="col" >ID</th>
                <th scope="col">Product Name</th>
                <th scope="col" >Product UPC</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product category</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($stmt as $i => $item):
                ?>
                <tr>
                    <th scope="row"><?php echo $i+1 ?> </th>
                    <td><?= $item['id']?></td>
                    <td><?= $item['product_name'] ?></td>
                    <td><?= $item['product_upc'] ?></td>
                    <td><?= $item['product_price'] ?></td>
                    <td><?= $item['product_category'] ?></td>
                    <td>
                        <button href="edit.php" type="button" class="btn btn-sm btn-dark" >UPDATE</button>
                        <button href="delete.php" type="button" class="btn  btn-sm btn-danger" "> DELETE</button>
                        <!--            <button  href="add.php" type="button" class="btn btn-info" >ADD</button>-->
                    </td>

                </tr>


            <?php endforeach;
            ?>

            </tbody>
        </table>
    </div



<?php else:
    die(friendlyError($stmt->errorInfo()[2]));
endif; ?>




</body>
<?php include_once "partials/footer.php"
?>

</html>