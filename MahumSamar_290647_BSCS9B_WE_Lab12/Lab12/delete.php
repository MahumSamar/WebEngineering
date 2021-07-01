<?php
include_once("config.php");
$firstName = $_GET['fn'];
$sql = "DELETE FROM employees WHERE firstName = '$firstName'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Delete Employee</title>
</head>

<body>
    <div class="container">
        <div style="font-size: 2.5em;">
            <?php
            if ($result) {
                echo "Record deleted from database.";
            } else {
                echo "Failed to delete the record due to foreign key dependency.";
            }
            ?>
        </div>
        <br>
        <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a>

    </div>
</body>

</html>