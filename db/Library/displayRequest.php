<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$servername = "localhost";
$username = "root";
$password = "";
$mydatabase="library";

$conn = new mysqli($servername, $username, $password,$mydatabase);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id=$_GET['id'];
// echo $id;
$sql = "select * from supplyrequest where supplierID=$id";
$requests = [];
 if($result = $conn->query($sql))
    {if(mysqli_num_rows($result) > 0)
      {$i=0;
        while($data=mysqli_fetch_array($result))
          {
          http_response_code(201); 
          $requests[$i]['title']= $data['title'];
          $requests[$i]['author']= $data['author'];
          $requests[$i]['supplierID']= $data['supplierID'];

          $i++;
          }
          echo json_encode($requests);
        }

      }
  else
  {
    http_response_code(422);
  }
