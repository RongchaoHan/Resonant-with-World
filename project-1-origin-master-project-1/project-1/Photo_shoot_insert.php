<?php
$PAGE_ID = "photo_insert";
$PAGE_HEADER = "Photo_insert";

require 'header.php';

/** @var PDO $pdo Database connection */
?>


<?php

if (empty($_POST["photo_shoot_name"]) || empty($_POST["photo_shoot_desc"] || empty($_POST["photo_shoot_quote"] || empty($_POST["photo_shoot_dateTime"] || empty($_POST["photo_shoot_other_information"]))))):
    $errors = [];
    ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $photo_shoot_name = $_POST['photo_shoot_name'];
    }
    ?>

    <div class="container-fluid px-4">
    <p>
        <a href="Photo_shoot.php" class="btn btn-primary">Back to List</a>
    </p>

    <h1>Create New Event </h1>

    <form action="Photo_shoot_insert.php" method="post">
        <div class="mb-3">
            <label> ID </label>
            <input type="number" class="form-control" name="id" >
        </div>

        <div class="mb-3">
            <label>Client_ID</label>
            <input type="number"  class="form-control" name="client_id" >
        </div>

        <div class="mb-3">
            <label>Photoshoot Name</label>
            <input type="text" class="form-control" name="photo_shoot_name" >
        </div>

        <div class="mb-3">
            <label>Description</label>
            <input type="text"  class="form-control" name="photo_shoot_desc" >
        </div>

        <div class="mb-3">
            <label>Quote</label>
            <input type="number"  class="form-control" name="photo_shoot_quote" >
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="Date"  class="form-control" name="photo_shoot_dateTime" >
        </div>
        <div class="mb-3">
            <label>Other Info</label>
            <input type="text" class="form-control" name="photo_shoot_other_information" >
        </div>


        <button type="submit" class="btn btn-primary" name="Photo_shoot_insert">Submit</button>
    </form>

    </div>
    <?php require 'footer.php';?>
    <style type="text/css">

        input:required:invalid, input:focus:invalid {
            /* insert your own styles for invalid form input */
            -moz-box-shadow: none;
        }

    </style>

<?php else:
    if (isset($_POST['Photo_shoot_insert'])) {



       // echo "connection success!";
        $query = "INSERT INTO `photo_shoot` (`id`,`client_id`,`photo_shoot_name`,`photo_shoot_desc`,`photo_shoot_quote`,`photo_shoot_dateTime`,`photo_shoot_other_information`) 
VALUES ('$_POST[id]','$_POST[client_id]','$_POST[photo_shoot_name]','$_POST[photo_shoot_desc]','$_POST[photo_shoot_quote]','$_POST[photo_shoot_dateTime]','$_POST[photo_shoot_other_information]')";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    ?>


    <!-- success message-->
    <div class="container-fluid px-4">
        <div class="alert alert-success  ">
            <strong>Success!</strong> A new Event has been added
            <a href="Photo_shoot.php" type="button" class="btn btn-primary">Exit</a>
        </div>
    </div>
<?php endif;?>
