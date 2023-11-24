<?php
include("index2.php");
/** @var $pdo PDO */
if (!isset($_GET['id'])) {
    // Redirect back to the list page, as id is not provided in the request
    header("Location: index.php");
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Delete client #<?= $_GET['id'] ?></title>
</head>
<body>

<h1>Delete client</h1>
<div class="center">
    <?php
    include("connection/connection.php");
    if (!empty($_POST)) {
        // Process to delete record request (if a POST form is submitted)
        $query = "DELETE FROM `clients` WHERE `id`=?";
        $stmt = $pdo->prepare($query);
        if ($stmt->execute([$_GET['id']])) {
            echo "Client #" . $_GET['id'] . " has been deleted. ";
            echo "<div class=\"center row\"><button onclick=\"window.location='client.php'\">Back to the client list</button></div>";
        } else {
            echo friendlyError($stmt->errorInfo()[2]);
            echo "<div class=\"center row\"><button onclick=\"window.history.back()\">Back to previous page</button></div>";
            die();
        }
    } else {
        // When no POST form is submitted, get the record from database
        $query = "SELECT * FROM `clients` WHERE `id`=?";
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
                            <input type="text" id="firstname" value="<?= $record->client_Firstname ?>" disabled/>
                        </div>
                        <div class="row">
                            <label for="surname">Surname</label>
                            <input type="text" id="surname" value="<?= $record->client_Surname ?>" disabled/>
                        </div>
                        <div class="row">
                            <label for="address">Address</label>
                            <input type="text" id="address" value="<?= $record->client_Address ?>" disabled/>
                        </div>
                        <div class="row">
                            <label for="contact">Contact</label>
                            <input type="text" id="contact" value="<?= $record->client_Phone ?>" disabled/>
                        </div>
                        <div class="row">
                            <label for="company">Email</label>
                            <input type="text" id="company" value="<?= $record->client_Email ?>" disabled/>
                        </div>
                    </div>
                    <div class="row center">
                        <input type="submit" name="action"  id="delete-button" value="Delete"/>
                        <button type="button" onclick="window.location='index.php';return false;">Cancel</button>
                    </div>
                </form>
    </div>
            <?php } else {
                header("Location: index.php");
            }
        } else {
            die(friendlyError($stmt->errorInfo()[2]));
        }
    } ?>
</div>