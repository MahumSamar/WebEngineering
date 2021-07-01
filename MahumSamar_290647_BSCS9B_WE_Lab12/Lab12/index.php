<?php
include('config.php');
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

    <title>Main Page</title>
</head>

<body>
    <h1>List of Employees</h1>
    <table id="content">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Job Title</th>
                <th>Emp Office Address</th>
                <th>Reports To</th>
                <th colspan="2">Update</th>
            </tr>
        </thead>
        <?php


        $sql = "SELECT E1.firstName,
        E1.lastName,
        E1.email,
        E1.extension,
        E1.officeCode AS o,
        O.addressLine1,
        O.addressLine2,
        E2.firstName AS fn,
        E2.lastName AS ln,
        E2.jobTitle AS jt,
        E1.JobTitle,
        O.city,
        O.state,
        O.country,
        E1.reportsTo AS r,
        E1.employeeNumber AS en
 FROM employees E1
          INNER JOIN offices O ON E1.officeCode = O.officeCode
          INNER JOIN employees E2 ON E1.reportsTo = E2.employeeNumber
 GROUP BY E1.firstName";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["firstName"] . " " . $row["lastName"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["JobTitle"] . "</td>";
                echo "<td>" . $row["addressLine1"] . " " . $row["addressLine2"] . " " . $row["city"] . " " . $row["state"] . " " . $row["country"] . "</td>";
                echo "<td>" . $row["fn"] . " " . $row["ln"] . ", " . $row["jt"] . "</td>";
                echo "<td><a href='update.php?fn=$row[firstName]&ln=$row[lastName]&e=$row[email]&jt=$row[JobTitle]&o=$row[o]&r=$row[r]&ex=$row[extension]&en=$row[en]'>Edit</a></td>";
                echo "<td><a href='delete.php?fn=$row[firstName]'>Delete</a></td></tr>";
            }
        } else {
            echo "0 result";
        }
        ?>
    </table>
    <br>
    <a href="add.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add Employee</a>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>