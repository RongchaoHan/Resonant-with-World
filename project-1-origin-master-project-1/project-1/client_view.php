
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
    header('Location: client.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM clients WHERE id=?");
$stmt->execute([$id]);
$client = $stmt->fetchObject();

?>


<!-- Approach -->
<div class="container-fluid px-4">
    <p>
        <a href="client.php" class="btn btn-primary">Back to Clients</a>
    </p>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><h1><b><?php echo $client->client_Firstname ?> 's Account Profile</b></h1></h6>
    </div>
    <div class="card-body">


        <div class="container-fluid">



            <div class="form-group">
                <label>Firstname : </label>
                <label><?php echo $client->client_Firstname ?></label>
            </div>
            <div class="form-group">
                <label>Surname :</label>
                <label><?php echo $client->client_Surname ?></label>
            </div>
            <div class="form-group">
                <label>Contact : </label>
                <label><?php echo $client->client_Phone?></label>
            </div>

            <div class="form-group">
                <label>Email :</label>
                <label><?php echo $client->client_Email ?></label>
            </div>

            <div class="form-group">
                <label>Address :</label>
                <label><?php echo $client->client_Address ?></label>
            </div>
            <div class="form-group">
                <label>Other Information : </label>
                <label><?php echo $client->client_Other_information ?></label>
            </div>
            <div class="form-group">
                <label>Subscribe : </label>
                <label><?php echo $client->client_Subscribe ?></label>
            </div>
        </div>

    </div>
    <?php require 'footer.php';?>
</div>
