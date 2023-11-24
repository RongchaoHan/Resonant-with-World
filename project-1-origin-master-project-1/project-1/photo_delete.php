<?php
require 'connection/connection.php';
/** @var PDO $pdo Database connection */
if (!isset($_GET['id'])) {
    // Redirect back to the list page, as id is not provided in the request
    header("Location: Photo_shoot.php");
    die();
}


$id = $_GET['id'];
if ($id) {
$stmt = $pdo->prepare("DELETE FROM photo_shoot WHERE id = $id");
$stmt->execute();
$stmt = $pdo->prepare("UPDATE photo_shoot SET  id = id-1 WHERE id > $id");
//$stmt->execute();

if ($stmt->execute()) {

    echo ' 
             <div class="container-fluid px-4">
                <div class="alert alert-success  ">
                   <strong>Success!</strong> The delete complete
                  <a href="Photo_shoot.php" type="button" class="btn btn-primary"> GO BACK THE LIST </a>
               </div>
             </div> ';

} else {
    echo ' 
             <div class="container-fluid px-4">
                <div class="alert alert-success  ">
                   <strong>ERROR!</strong> The delete failed 
                  <a href="Photo_shoot.php" type="button" class="btn btn-primary"> GO BACK TO ThE LIST AND TRY AGAIN</a>
               </div>
             </div> ';
}
//echo $stmt->rowCount() . ' row(s) was deleted successfully.';
//header('Location: Photo_shoot.php');
exit();
}
?>









<!--

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Delete client #<?= $_GET['id'] ?></title>
</head>
<body>

<h1>Delete Event</h1>
<div class="center">
    <?php
    include("connection/connection.php");
    if (!empty($_POST)) {
        // Process to delete record request (if a POST form is submitted)
        $query = "DELETE FROM `clients` WHERE `id`=?";
        $query = $pdo->prepare("UPDATE photo_shoot SET  id = id-1 WHERE id > $id");
        $stmt = $pdo->prepare($query);
        if ($stmt->execute([$_GET['id']])) {
            echo "Event #" . $_GET['id'] . " has been deleted. ";
            echo "<div class=\"center row\"><button onclick=\"window.location='Photo_shoot.php'\">Back to the Events list</button></div>";
        } else {
            echo friendlyError($stmt->errorInfo()[2]);
            echo "<div class=\"center row\"><button onclick=\"window.history.back()\">Back to previous page</button></div>";
            die();
        }
    } else {
        // When no POST form is submitted, get the record from database
        $query = "SELECT * FROM `photo_shoot` WHERE `id`=?";
        $stmt = $pdo->prepare($query);
        if ($stmt->execute([$_GET['id']])) {
            if ($stmt->rowCount() > 0) {
                $record = $stmt->fetchObject(); ?>


                <div class="container-fluid">
                    <form method="post">
                        <div class="aligned-form">
                            <div class="row">
                                <label for="client_id">ID</label>
                                <input type="number" id="client_id" value="<?= $record->id ?>" disabled/>
                            </div>
                            <div class="row">
                                <label for="firstname">First Name</label>
                                <input type="text" id="firstname" value="<?= $record->photo_shoot_name ?>" disabled/>
                            </div>
                            <div class="row">
                                <label for="surname">Surname</label>
                                <input type="text" id="surname" value="<?= $record->photo_shoot_desc ?>" disabled/>
                            </div>
                        </div>
                        <div class="row center">
                            <input type="submit" name="action"  id="delete-button" value="Delete"/>
                            <button type="button" onclick="window.location='Photo_shoot.php';return false;">Cancel</button>
                        </div>
                    </form>
                </div>
            <?php } else {
                header("Location: Photo_shoot.php");
            }
        } else {
            die(friendlyError($stmt->errorInfo()[2]));
        }
    } ?>
</div>

-->