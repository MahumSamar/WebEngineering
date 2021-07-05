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
// Get the posted data.
$postdata = file_get_contents("php://input");
// echo "shjahd";
$request = json_decode($postdata);
$sql = "select personID,firstName,lastName from personinfo where title='BS'";
$supplier = [];
 if($result = $conn->query($sql))
    {if(mysqli_num_rows($result) > 0)
      {$i=0;
        while($data=mysqli_fetch_array($result))
          {
          http_response_code(201); 
          $supplier[$i]['firstName']= $data['firstName'];
          $supplier[$i]['lastName']= $data['lastName'];
          $supplier[$i]['personID']= $data['personID'];

          $i++;
          }
          echo json_encode($supplier);
        }

      }
  else
  {
    http_response_code(422);
  }


$conn->close();
?>