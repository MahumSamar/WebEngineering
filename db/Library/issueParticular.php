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
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
  // Sanitize.
  
  $bookID =$request->bookID;
  $stdID = $request->stdID;

  $sql = "insert into issue(bookID,personID) values ($bookID ,$stdID)";
  $del="Delete from issuancerequest where bookID =$bookID"; 
  $update = "update book set status='issued' where bookID=$bookID";
 
  // Create.
  if($result = $conn->query($sql))
  { 
    $res2= mysqli_query($conn, $del);
    $updateres= mysqli_query($conn, $update);
    $issue= [
      'bookID'    => $bookID ,
      'personID'  => $stdID 
    ];
    echo json_encode($issue);
  }
  

 
}
$conn->close();