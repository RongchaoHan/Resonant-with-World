<?php
$PAGE_ID = "photo_edit";
$PAGE_HEADER = "Photos_edit";



/** @var PDO $pdo Database connection */
?>
<?php
require 'header.php';
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: photo_shoot.php');
    exit;
}

$id = $_GET['id'];

if (!$id) {
    header('Location: photo_shoot.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $client_id = $_POST['client_id'];
    $photo_shoot_name = $_POST['photo_shoot_name'];
    $photo_shoot_desc = $_POST['photo_shoot_desc'];
    $photo_shoot_quote = $_POST['photo_shoot_quote'];
    $photo_shoot_dateTime = $_POST['photo_shoot_dateTime'];
    $photo_shoot_other_information = $_POST['photo_shoot_other_information'];

    if (!$photo_shoot_name) {
        $errors[] = 'photoshoot name ';
    }

    if (!$photo_shoot_desc) {
        $errors[] = 'Description  is required';
    }

    if (!$photo_shoot_quote) {
        $errors[] = 'Quote  is required';
    }

    if (!$photo_shoot_dateTime) {
        $errors[] = 'date  is required';
    }
    if (!$photo_shoot_other_information ) {
        $errors[] = 'other_information is required';
    }



    if (empty($errors)) {
        $stmt = $pdo->prepare("UPDATE photo_shoot SET client_id = :client_id, photo_shoot_name = :photo_shoot_name,
                                       photo_shoot_desc = :photo_shoot_desc,
                                        photo_shoot_quote = :photo_shoot_quote,
                  photo_shoot_dateTime = :photo_shoot_dateTime , photo_shoot_other_information=:photo_shoot_other_information WHERE id = :id");
        $stmt->bindValue(':photo_shoot_name', $photo_shoot_name);
        $stmt->bindValue(':photo_shoot_desc', $photo_shoot_desc);
        $stmt->bindValue(':photo_shoot_quote', $photo_shoot_quote);
        $stmt->bindValue(':photo_shoot_dateTime', $photo_shoot_dateTime);
        $stmt->bindValue(':photo_shoot_other_information', $photo_shoot_other_information);
        $stmt->bindValue(':client_id', $client_id);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        header('Location: Photo_shoot.php');
    }

} else {
    $stmt = $pdo->prepare("SELECT * FROM photo_shoot WHERE id=?");
    $stmt->execute([$id]);
    $photos = $stmt->fetchObject();
}
?>
    <div   class="container-fluid px-4">
        <p>
            <a href="photo_edit.php" class="btn btn-primary">Back to List</a>
        </p>
        <h1>Edit Photoshoot list: <b><?php echo $photos->client_id ?></b></h1>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <div><?php echo $error ?></div>
                <?php endforeach;?>
            </div>
        <?php endif;?>

        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="photo_shoot_name" class="form-control" value="<?php echo $photos->photo_shoot_name  ?>" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input  type="text" class="form-control" name="photo_shoot_desc" value="<?php echo $photos->photo_shoot_desc ?>" required>
            </div>

            <div class="form-group">
                <label>Quote</label>
                <input type="number" class="form-control" name="photo_shoot_quote" value="<?php echo $photos->photo_shoot_quote ?>" required>
            </div>

            <div class="form-group">
                <label>date</label>
                <input type="datetime-local" name="photo_shoot_dateTime" class="form-control" value="<?php echo $photos->photo_shoot_dateTime ?>" required>
            </div>

            <div class="form-group">
                <label>Other info</label>
                <input type="text"  name="photo_shoot_other_information" class="form-control" value="<?php echo $photos->photo_shoot_other_information ?>" required>
            </div>

            <input type="hidden" name="id" value="<?= $photos->id ?>" />
            <input type="hidden" name="client_id" value="<?= $photos->client_id ?>" />
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

