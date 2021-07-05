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


$books = [];
$sql = "SELECT * FROM book ORDER BY title";

if($result = $conn->query($sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $books[$i]['title'] = $row['title'];
    $books[$i]['author'] = $row['author'];
    $books[$i]['isbn'] = $row['isbn'];
    $books[$i]['image'] = $row['image'];
    $books[$i]['bookID'] = $row['bookID'];
    $books[$i]['description'] = $row['description'];
    $books[$i]['language'] = $row['language'];
    $books[$i]['pages'] = $row['pages'];
    $i++;
  }

  echo json_encode($books);
}
else
{
  http_response_code(404);
}
$conn->close();
?>