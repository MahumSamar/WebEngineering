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

  //echo $request;
  // Validate.
  if( trim($request->title) === '' ||  trim($request->author) === '' || trim($request->supplier) === '' )
  {
    return http_response_code(400);
  }

  // Sanitize.
  
  $title = mysqli_real_escape_string($conn, trim($request->title));
  $author = mysqli_real_escape_string($conn, trim($request->author));
  $supplier= mysqli_real_escape_string($conn, trim($request->supplier));
 

  // Create.
  $sql = "INSERT INTO supplyrequest (title,author,supplierID) VALUES ('{$title}','{$author}','{$supplier}')";

  if($result = $conn->query($sql))
  {
    http_response_code(201);
    $supply = [
   
      'title'    => $title,
      'author'    => $author, 
      'supplierID'    => $supplier
    ];
    echo json_encode($supply);
  }
  else
  {
    http_response_code(422);
  }
}
$conn->close();
