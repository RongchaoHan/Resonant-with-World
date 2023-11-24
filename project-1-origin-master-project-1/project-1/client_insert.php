<?php
$PAGE_ID = "client_insert";
$PAGE_HEADER = "Clients_insert";

require 'header.php';



/** @var PDO $pdo Database connection */
?>


<?php

if (empty($_POST["client_Firstname"]) || empty($_POST["client_Surname"] || empty($_POST["client_Email"] || empty($_POST["client_Phone"] || empty($_POST["client_Subscribe"]))))):
    $errors = [];
    ?>

	<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = $_POST['client_Firstname'];
    }
    ?>

    <div class="container-fluid">
	    <h1>Create New Client </h1>

	    <form action="client_insert.php" method="post">
	        <div class="mb-3">
	            <input type="hidden" class="form-control" name="id" required>
	        </div>
	        <div class="mb-3">
	            <label>Name</label>
	            <input type="text" step=".01" class="form-control" name="client_Firstname" required>
	        </div>

	        <div class="mb-3">
	            <label>Surname</label>
	            <input type="text"  class="form-control" name="client_Surname" required >
	        </div>

	        <div class="mb-3">
	            <label>Address</label>
	            <input type="text"  class="form-control" name="client_Address" required>
	        </div>

	        <div class="mb-3">
	            <label>Phone</label>
	            <input type="text" step=".01" class="form-control" name="client_Phone" required>
	        </div>
	        <div class="mb-3">
	            <label>Subscribe</label>
	            <input type="text" class="form-control" name="client_Subscribe" required>
	        </div>
	        <div class="mb-3">
	            <label>Email</label>
	            <input type="email"  class="form-control" name="client_Email" required>
	        </div>
	        <div class="mb-3">
	            <label>Other Information</label>
	            <input type="text"  class="form-control" name="client_Other_information" required>
	        </div>

	        <button type="submit" class="btn btn-primary" name="insert">Submit</button>
	    </form>

        <?php require 'footer.php';?>

    </div>

    <style>

        input:required:invalid, input:focus:invalid {
            /* insert your own styles for invalid form input */
            -moz-box-shadow: #d52a1a;
        }

    </style>
	    <?php else:
            if (isset($_POST['insert'])) {

               // echo "connection success!";
                $query = "INSERT INTO `clients` (`id`,`client_Firstname`,`client_Surname`,`client_Address`,`client_Phone`,`client_Email`,`client_Subscribe`,`client_Other_information`) 
VALUES ('$_POST[id]','$_POST[client_Firstname]','$_POST[client_Surname]','$_POST[client_Address]','$_POST[client_Phone]','$_POST[client_Email]','$_POST[client_Subscribe]','$_POST[client_Other_information]')";

                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            }
            ?>
    <!-- success message-->
    <div class="container-fluid px-4">
        <div class="alert alert-success  ">
            <strong>Success!</strong> A new client has been added
            <a href="client.php" type="button" class="btn btn-primary">Exit</a>
        </div>
    </div>

	    <?php endif;?>





