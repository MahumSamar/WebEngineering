<?php
include_once("config.php");

if (isset($_POST['add'])) {

  $en = $_POST['en'];
  $ex = $_POST['ex'];
  $fn =  $_POST['fName'];
  $ln =  $_POST['lName'];
  $e =  $_POST['email'];
  $jt =  $_POST['jt'];
  $o =  $_POST['oCode'];
  $r =  $_POST['r'];

  // checking empty fields
  if (empty($fn) || empty($ln) || empty($e) || empty($jt) || empty($o) || empty($r)) {
    if (empty($fn)) {
      echo "<font color='red'>First Name field is empty.</font><br/>";
    }
    if (empty($ln)) {
      echo "<font color='red'>Last Name field is empty.</font><br/>";
    }
    if (empty($e)) {
      echo "<font color='red'>Email field is empty.</font><br/>";
    }
    if (empty($jt)) {
      echo "<font color='red'>Job Title field is empty.</font><br/>";
    }

    if (empty($o)) {
      echo "<font color='red'>Office Code field is empty.</font><br/>";
    }

    if (empty($r)) {
      echo "<font color='red'>Reports To field is empty.</font><br/>";
    }

    if (empty($en)) {
      echo "<font color='red'>Employee Number field is empty.</font><br/>";
    }

    if (empty($ex)) {
      echo "<font color='red'>Extension field is empty.</font><br/>";
    }
  } else {
    $sql = "INSERT INTO employees(employeeNumber,firstName,lastName,extension,email,officeCode,reportsTo,JobTitle) VALUES('$en','$fn','$ln','$ex','$e','$o','$r','$jt')";
    if (mysqli_query($conn, $sql)) {
      echo "Record Added successfully";
    } else {
      echo "Error adding record: " . mysqli_error($conn);
    }
    $conn->close();
    //redirectig to the display page. In our case, it is index.php
    header("Location: index.php");
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Add</title>
</head>

<body>
  <h1>Adding Employee</h1>
  <div class="container">
    <form action="" method="POST">
      <div class="form-group">
        <label for="en">Employee Number</label>
        <input type="text" class="form-control" id="en" name="en" placeholder="Enter First Name">
      </div>
      <div class="form-group">
        <label for="fName">First Name</label>
        <input type="text" class="form-control" id="fName" name="fName" placeholder="Enter First Name">
      </div>
      <div class="form-group">
        <label for="lName">Last Name</label>
        <input type="text" class="form-control" id="lName" name="lName" placeholder="Enter Last Name">
      </div>
      <div class="form-group">
        <label for="ex">Extension</label>
        <input type="text" class="form-control" id="ex" name="ex" placeholder="Enter Extension">
      </div>

      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
      </div>

      <div class="form-group">
        <label for="oCode">Office Code</label>
        <select name="oCode" id="oCode">
          <?php
          $sql = "SELECT officeCode FROM offices";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
            $o = $row["officeCode"];
            echo "<option value='$o'>$o</option>";
          }

          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="r">Reports To</label>
        <select name="r" id="r">
          <?php
          $sql = "SELECT employeeNumber FROM employees";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
            $e = $row["employeeNumber"];
            echo "<option value='$e'>$e</option>";
          }

          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="jt">Job Title</label>
        <input type="text" class="form-control" id="jt" name="jt" placeholder="Enter Job Title">
      </div>
      <br>
      <input class="btn btn-primary btn-lg active" type="submit" name="add" value="Add">
      <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a>

    </form>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>