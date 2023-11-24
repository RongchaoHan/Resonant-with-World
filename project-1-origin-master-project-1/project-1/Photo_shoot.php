
<?php
$PAGE_ID = "photo";
$PAGE_HEADER = "Photos";

require('header.php');

/** @var PDO $pdo Database connection */
?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 pb-2">
        <span>PhotoShoots</span>
    </h1>

    <p class="mb-4">You can manage all Photoshoots events within the system here.</p>
    <div class="table-responsive">

        <?php $photo_stmt = $pdo->prepare("SELECT * FROM `photo_shoot`");
        if ($photo_stmt->execute() && $photo_stmt->rowCount() > 0): ?>
            <form method="post" action="client_delete.php" id="delete-products">
                <table class="table table-bordered" width="100%" cellspacing="0">

                    <div>
                        <p class="yes" >
                            <a href="Photo_shoot_insert.php" type="button" class="btn btn-primary" name="insert">CREATE NEW PHOTOSHOOT EVENT </a>
                        </p>
                    </div>


                    <thead>
                    <tr>

                        <th scope="col" >ID</th>
                        <th scope="col">Client ID</th>
                        <th scope="col" >Photoshoot-Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quote</th>
                        <th scope="col">Date</th>
                        <th scope="col">Other info</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($photos = $photo_stmt->fetchObject()): ?>
                        <tr>


                            <td><?= $photos->id?></td>
                            <td><?= $photos->client_id?></td>
                            <td><?= $photos->photo_shoot_name ?></td>
                            <td><?= $photos->photo_shoot_desc ?></td>
                            <td><?= $photos->photo_shoot_quote ?></td>
                            <td><?= $photos->photo_shoot_dateTime ?></td>
                            <td><?= $photos->photo_shoot_other_information ?></td>
                            <td class="table-cell-center">
                                <a class="btn btn-success btn-circle btn-sm button-delete-product" href="photo_edit.php?id=<?= $photos->id ?>" >Edit</a>
                                <a class="btn btn-danger btn-circle btn-sm button-delete-product" href="photo_delete.php?id=<?= $photos->id ?>" >Delete</a>
                                <a class="btn btn-info btn-circle btn-sm button-delete-product" href="photo_view.php?id=<?= $photos->id ?>" >View</a>
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

    <?php
    $currentFilePath = $_SERVER["SCRIPT_FILENAME"];
    echo "<b>Current PHP File is " . $currentFilePath . "</b><br/>";

    // return the path of parent directory from a path using dirname()
    $currentDirectoryPath = dirname($currentFilePath);



    $directory = opendir($currentDirectoryPath);
    echo "<ul>";


    while ($file = readdir($directory)) {
        // We don't want to list "current directory" and "parent directory" pseudo-files, which is represented as . and ..
        if ($file == "." || $file == "..") continue;
        // You can use the same way to ignore files with specific format/extension name, with the help of https://www.php.net/manual/en/function.pathinfo.php

        if (is_dir($file)) {
            echo "<li><b>" . $file . "</b> - This is a directory - <a href='file-details.php?filename=" . urlencode($file) . "'>Details</a></li>";
        } else {
            echo "<li>". urlencode($file) . "'>Details</a> <a href='file-contents.php?filename=" . urlencode($file) . "'>Contents</a></li>";
        }

    }
    closedir($directory);
    echo "</ul>";?>

</div>



<!-- /.container-fluid -->
