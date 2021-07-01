<?php
include_once("config.php");
$fn = $_GET['fn'];
$ln = $_GET['ln'];
$e = $_GET['e'];
$jt = $_GET['jt'];
$o = $_GET['o'];
$r = $_GET['r'];
$ex = $_GET['ex'];
$en = $_GET['en'];

if (isset($_POST['update'])) {

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
  } else {
    //updating the table
    $sql = "UPDATE employees SET firstName='$fn',lastName='$ln',email='$e',officeCode='$o',reportsTo='$r',JobTitle='$jt' WHERE employeeNumber=$en";
    // $result = $conn->query($sql);
    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
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

  <title>Updating Employee</title>
</head>

<body>
  <h1>Updating Employee</h1>
  <div class="container">
    <form action="" method="POST">

      <div class="form-group">
        <label for="fName">First Name</label>
        <input type="text" class="form-control" id="fName" name="fName" value="<?php echo "$fn" ?>">
      </div>
      <div class="form-group">
        <label for="lName">Last Name</label>
        <input type="text" class="form-control" id="lName" name="lName" value="<?php echo "$ln" ?>">
      </div>
      <div class="form-group">
        <label for="ext">Extension</label>
        <input type="text" class="form-control" id="ext" name="ext" value="<?php echo "$ex" ?>" disabled>
      </div>

      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo "$e" ?>">
      </div>
      <div class="form-group">
        <label for="oCode">Office Code</label>
        <select name="oCode" id="oCode">
          <?php
          $sql = "SELECT officeCode FROM offices";
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
            $o = $row["officeCode"];
            if ($o == $row['officeCode']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo "<option value='$o' " . $selected . ">$o</option>";
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
            if ($r == $row['employeeNumber']) {
              $selected = 'selected="selected"';
            } else {
              $selected = '';
            }
            echo "<option value='$e' " . $selected . ">$e</option>";
          }

          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="jt">Job Title</label>
        <input type="text" class="form-control" id="jt" name="jt" value="<?php echo "$jt" ?>">
      </div>
      <br>
      <input class="btn btn-primary btn-lg active" type="submit" name="update" value="Update">
      <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a>

    </form>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>