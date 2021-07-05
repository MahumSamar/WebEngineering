<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$servername = "localhost";
$username = "root";
$password = "";
$mydatabase="library";
// Create connection
$conn = new mysqli($servername, $username, $password,$mydatabase);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Get the posted data.
$postdata = file_get_contents("php://input");
//echo $postdata;

  $request = json_decode($postdata);
  
  $id = $_GET['id'];

  // Delete.
  $sql = "DELETE FROM issue WHERE bookID = $id";
  
  if ($result = $conn->query($sql)){
    $update = "update book set status='available' where bookID=$id";
    $updateres= mysqli_query($conn, $update);
    // http_response_code(201);
    $issue = [
      'bookID'    => $bookID,
      'personID'  => $stdID
    ];
    echo json_encode($issue);
  }
  $conn->close();
  ?>