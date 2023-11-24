<?php
$PAGE_ID = "categories";
$PAGE_HEADER = "Categories";

require('header.php');

/** @var PDO $pdo Database connection */
?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 pb-2">
        <span>Categories</span>
        <a href="#" class="btn btn-danger btn-icon-split float-right" id="delete-selected-category">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
        </a>
    </h1>

    <p class="mb-4">You can manage all categories within the system here.</p>
    <div class="table-responsive">

        <?php $category_stmt = $pdo->prepare("SELECT * FROM `category`");
        if ($category_stmt->execute() && $category_stmt->rowCount() > 0): ?>
            <form method="post" action = "category_delete.php" id="delete-category">
                <table class="table table-bordered" width="100%" cellspacing="0">

                    <div>
                        <p class="yes" >
                            <a href="category_insert.php" type="button" class="btn btn-success" name="insert">CREATE NEW CATEGORY </a>
                        </p>
                    </div>

                    <thead>
                    <tr>

                        <th scope="col" >ID</th>
                        <th scope="col" >Category-Name</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($categories = $category_stmt->fetchObject()): ?>
                        <tr>


                            <td><?= $categories->id?></td>
                            <td><?= $categories->category_name ?></td>

                            <td class="table-cell-center">
                                <a class="btn btn-success btn-circle btn-sm button-edit-category" href="category_edit.php?id=<?= $categories->id ?>" >Edit</a>
                                <a class="btn btn-danger btn-circle btn-sm button-delete-category" href="category_delete.php?id=<?= $categories->id ?>" >Delete</a>
                                <a class="btn btn-info btn-circle btn-sm button-view-category" href="category_view.php?id=<?= $categories->id ?>" >View</a>
                            </td>

                        </tr>

                    <?php endwhile; ?>
                    </tbody>
                </table>
            </form>
        <?php else: ?>
            <p class="mb-4">There's no category in the database. </p>
            <div>
                <p class="yes" >
                    <a href="category_insert.php" type="button" class="btn btn-success" name="insert">CREATE NEW CATEGORY </a>
                </p>
            </div>
        <?php endif; ?>
    </div>
    <?php require('footer.php'); ?>

</div>
<!-- /.container-fluid -->

