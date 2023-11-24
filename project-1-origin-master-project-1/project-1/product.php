<?php
$PAGE_ID = "products";
$PAGE_HEADER = "Products";

require('header.php');

/** @var PDO $pdo Database connection */
?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 pb-2">
        <span>Products</span>
        <a href="#" class="btn btn-danger btn-icon-split float-right" id="delete-selected-products">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
        </a>
    </h1>

    <p class="mb-4">You can manage all Products within the system here.</p>
    <div class="table-responsive">

        <?php $product_stmt = $pdo->prepare("SELECT * FROM `products`");
        if ($product_stmt->execute() && $product_stmt->rowCount() > 0): ?>
            <form method="post" action="product_delete.php" id="delete-products">
                <table class="table table-bordered" width="100%" cellspacing="0">

                    <div>
                        <p class="yes" >
                            <a href="product_insert.php" type="button" class="btn btn-success" name="insert">CREATE NEW PRODUCT </a>
                        </p>
                    </div>


                    <thead>
                    <tr>

                        <th scope="col" >ID</th>
                        <th scope="col" >Product-Name</th>
                        <th scope="col" >UPC</th>
                        <th scope="col" >Price</th>
                        <th scope="col" >Category</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($products = $product_stmt->fetchObject()): ?>
                        <tr>


                            <td><?= $products->id?></td>
                            <td><?= $products->product_name ?></td>
                            <td><?= $products->product_upc ?></td>
                            <td><?= $products->product_price ?></td>
                            <td><?= $products->product_category ?></td>
                            <td class="table-cell-center">
                                <a class="btn btn-success btn-circle btn-sm button-delete-product" href="product_edit.php?id=<?= $products->id ?>" >Edit</a>
                                <a class="btn btn-danger btn-circle btn-sm button-delete-product" href="product_delete.php?id=<?= $products->id ?>" >Delete</a>
                                <a class="btn btn-info btn-circle btn-sm button-delete-product" href="product_view.php?id=<?= $products->id ?>" >View</a>
                            </td>

                        </tr>

                    <?php endwhile; ?>
                    </tbody>
                </table>
            </form>
        <?php else: ?>
            <p class="mb-4">There's no product in the database. </p>
        <?php endif; ?>
    </div>
    <?php require('footer.php'); ?>

</div>
<!-- /.container-fluid -->
