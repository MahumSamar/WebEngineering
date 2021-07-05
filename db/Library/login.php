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
//echo $postdata;
if(isset($postdata) && !empty($postdata))
{// Extract the data.
  $request = json_decode($postdata);
  //echo $request;
  // Validate.
  if(trim($request->email) === '' || trim($request->password) === '' || trim($request->title) === '')
  {
    return http_response_code(400);
  } 

  $email= mysqli_real_escape_string($conn, trim($request->email));
  $password= mysqli_real_escape_string($conn, trim($request->password));
  $title= mysqli_real_escape_string($conn, trim($request->title));
  // Create.
  if ($title == 'Student')
  $usertitle = 'S';
  else if ($title == 'Faculty')
  $usertitle = 'F';
  else if ($title == 'Book Supplier')
  $usertitle = 'BS';
  else
  $usertitle = 'A';

  $sql = "select * from personinfo where email='{$email}' and password='{$password}' and title='{$usertitle}'";
 if($result = $conn->query($sql))
  if(mysqli_num_rows($result) == 1)
  {
    http_response_code(201); 
    $data=$result->fetch_array();   
    $user= [
      'firstName'=>$data['firstName'],
     'lastName'=>$data['lastName'],
     'title'=>$data['title'],
     'email'=>$data['email'],
     'password'=>$data['password'],
     'personID'=>$data['personID']
    ];
    echo json_encode($user);
  }
  
}
$conn->close();
?>