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
  if( trim($request->email) === '' ||  trim($request->firstname) === '' || trim($request->lastname) === '' || trim($request->password) === '' || trim($request->title) === '')
  {
    return http_response_code(400);
  }

  // Sanitize.
  
  $userfirstName = mysqli_real_escape_string($conn, trim($request->firstname));
  $userlastName = mysqli_real_escape_string($conn, trim($request->lastname));
  $useremail= mysqli_real_escape_string($conn, trim($request->email));
  $userpassword= mysqli_real_escape_string($conn, trim($request->password));
  $title= mysqli_real_escape_string($conn, trim($request->title));
  
  if( $title == 'Student')
    $usertitle = 'S';
  else if ( $title == 'Faculty')
    $usertitle = 'F';
  else
    $usertitle = 'BS';

  // Create.
  $sql = "INSERT INTO personInfo (firstName,lastName,email,password,title) VALUES ('{$userfirstName}','{$userlastName}','{$useremail}','{$userpassword}','{$usertitle}')";

  if($result = $conn->query($sql))
  {
    http_response_code(201);
    $user = [
      'firstame' => $userfirstName,
      'lastName'    => $userlastName,
      'email'    => $useremail,
      'password'    => $userpassword,
      'title'    => $title,
      'personID'=>0
    ];
    echo json_encode($user);
  }
  else
  {
    http_response_code(422);
  }
}
$conn->close();
