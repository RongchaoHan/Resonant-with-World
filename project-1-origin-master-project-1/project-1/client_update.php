<?php
$PAGE_ID = "clients_edit";
$PAGE_HEADER = "Clients_edit";


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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $sub = $_POST['sub'];

    if (!$firstname) {
        $errors[] = 'firstname is required';
    }

    if (!$surname) {
        $errors[] = 'surname is required';
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("UPDATE clients SET client_Firstname = :client_Firstname,
                                        client_Surname = :client_Surname,
                                        client_Address = :client_Address,
                                    client_Email =:client_Email,
                                    client_Subscribe =:client_Subscribe,
                                    client_Phone = :client_Phone , 
                                    client_Other_information=:client_Other_information
                                       WHERE id = :id");
        $stmt->bindValue(':client_Firstname', $firstname);
        $stmt->bindValue(':client_Surname', $surname);
        $stmt->bindValue(':client_Address', $address);
        $stmt->bindValue(':client_Email', $email);
        $stmt->bindValue(':client_Phone', $contact);
        $stmt->bindValue(':client_Subscribe', $sub);
        $stmt->bindValue(':client_Other_information', $company);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        header('Location: client.php');
    }
    echo ' update done';

} else {
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE id=?");
    $stmt->execute([$id]);
    $client = $stmt->fetchObject();
}

?>
<div class="container-fluid">
<p>
    <a href="client.php" class="btn btn-primary">Back to clients</a>
</p>
<h1>Edit Client: <b><?php echo $client->client_Firstname ?></b></h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach;?>
    </div>
    <div class="container-fluid px-4">
        <div class="alert alert-success  ">
            <strong>Success!</strong> A  client has been updated
            <a href="client.php" type="button" class="btn btn-primary">Exit</a>
        </div>
    </div>
<?php endif;?>

    <form method="post">
        <div class="form-group">
            <label>Firstname</label>
            <input type="text" name="firstname" class="form-control" value="<?php echo $client->client_Firstname ?>" required>
        </div>
        <div class="form-group">
            <label>Surname</label>
            <input  type="text" class="form-control" name="surname" value="<?php echo $client->client_Surname ?>" required>
        </div>
        <div class="form-group">
            <label>Phone number</label>
            <input type="text"  name="contact" class="form-control" value="<?php echo $client->client_Phone?>" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text"  name="address" class="form-control" value="<?php echo $client->client_Address ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input   name="email" class="form-control" value="<?php echo $client->client_Email?>" required>
        </div>
        <div class="form-group">
            <label>Other info</label>
            <input type="text"  name="company" class="form-control" value="<?php echo $client->client_Other_information ?>" required>
        </div>
        <div class="form-group">
            <label>Subscribed?</label>
            <input type="text"  name="sub" class="form-control" value="<?php echo $client->client_Subscribe ?>" required>
        </div>
        <input type="hidden" name="id" value="<?= $client->id ?>" />
        <input type="submit" class="btn btn-primary" value="Update" />
    </form>

    <?php require 'footer.php';?>
</div>

    <style type="text/css">

        input:required:invalid, input:focus:invalid {
            /* insert your own styles for invalid form input */
            -moz-box-shadow: none;
        }

    </style>