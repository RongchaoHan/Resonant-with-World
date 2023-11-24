
<?php
$PAGE_ID = "clients_view";
$PAGE_HEADER = "Clients_view";



/** @var PDO $pdo Database connection */
?>

<?php
require 'header.php';
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: client.php');
    exit;
}

$id = $_GET['id'];

if (!$id) {
    header('Location: Photo_shoot.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM photo_shoot WHERE id=?");
$stmt->execute([$id]);
$photos = $stmt->fetchObject();

?>



<div class=" container-fluid px-4">
    <p>
        <a href="Photo_shoot.php" class="btn btn-primary">Back to List</a>
    </p>
    <div class="card-header py-10">
        <h6 class="m-0 font-weight-bold text-primary"><h1>View Event: <b><?php echo $photos->client_id ?> </b> </h1>
        </h6>
    </div>
    <div class="card-body">
        <div class="container-fluid">
        <label>Name :</label>
        <label><?php echo $photos->photo_shoot_name ?></label>
    </div>
    <div class="form-group">
        <label>Description :</label>
        <label><?php echo $photos->photo_shoot_desc ?></label>
    </div>
    <div class="form-group">
        <label>Quote :</label>
        <label><?php echo $photos->photo_shoot_quote ?></label>
    </div>

    <div class="form-group">
        <label>date :</label>
        <label><?php echo $photos->photo_shoot_dateTime ?></label>
    </div>

    <div class="form-group">
        <label>Address : </label>
        <label><?php echo $photos->photo_shoot_other_information ?></label>
    </div>
        <?php require 'footer.php';?>

</div>

</div>
</div>

