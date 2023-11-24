
<?php
$PAGE_ID = "clients";
$PAGE_HEADER = "Clients";


require('header.php');

/** @var PDO $pdo Database connection */
?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 pb-2">
        <span>Clients</span>
    </h1>

    <p class="mb-4">You can manage all Clients within the system here.</p>
    <div class="table-responsive">

        <?php $client_stmt = $pdo->prepare("SELECT * FROM `clients`");
        if ($client_stmt->execute() && $client_stmt->rowCount() > 0): ?>
            <table class="table table-bordered">

                <div>
                    <p class="yes" >
                        <a href="client_insert.php" type="button" class="btn btn-primary" name="insert">CREATE NEW CLIENT </a>
                    </p>
                </div>

                <div style="text-align: left">
                    <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <thead>
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subscribe?</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($clients = $client_stmt->fetchObject()): ?>
                    <tr>
                        <td><?= $clients->id?></td>
                        <td><?= $clients->client_Firstname?></td>
                        <td><?= $clients->client_Surname ?></td>
                        <td><?= $clients->client_Address ?></td>
                        <td><?= $clients->client_Phone ?></td>
                        <td><a href="mailto: <?= $clients->client_Email ?>"> <?= $clients->client_Email ?></a></td>
                        <td><?= $clients->client_Subscribe ?></td>
                        <td class="table-cell-center">
                            <a class="btn btn-info btn-circle btn-sm button-delete-product" href="client_view.php?id=<?= $clients->id ?>" >View</a>
                            <a class="btn btn-success btn-circle btn-sm button-delete-product" href="client_update.php?id=<?= $clients->id ?>" >Edit</a>

                            <a  class="btn btn-danger btn-circle btn-sm button-delete-product" onclick="window.location='client_delete.php?id=<?= $clients->id ?>'">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
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






<style>
    a {
        color: #4e73df;
        text-decoration: none;
    }
</style>


<?php



