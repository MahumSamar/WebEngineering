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
  if( trim($request->bookID) === '' ||  trim($request->stdID) === ''  )
  {
    return http_response_code(400);
  }

  // Sanitize.
  
  $bookID = mysqli_real_escape_string($conn, trim($request->bookID));
  $stdID = mysqli_real_escape_string($conn, trim($request->stdID));
  // Create.
  $getstatus="select status from book where bookID=$bookID and status='available'";
  
  if(mysqli_num_rows($conn->query($getstatus))>0)
  {
    $update = "update book set status='pending' where bookID=$bookID";
    $updateres= mysqli_query($conn, $update);
    $sql = "INSERT INTO issuancerequest (bookID,personID) VALUES ('{$bookID }','{$stdID }')";
    
    if(($result = $conn->query($sql)) )
    {  
    
      http_response_code(201);
      $issue= [
        'bookID'    => $bookID ,
        'personID'  => $stdID 
      ];
      echo json_encode($issue);
    }
 }


}

$conn->close();
