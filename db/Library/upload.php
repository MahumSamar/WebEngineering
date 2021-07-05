<?php
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $mydatabase="library";

    $conn = new mysqli($servername, $username, $password,$mydatabase);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

  $msg = "";
  
  $folderPath = "image/";  
  $file_tmp = $_FILES['file']['tmp_name'];

  $booktitle = $_POST['title'] ;
  $bookauthor = $_POST['author'] ;
  $bookisbn = $_POST['isbn'] ;
  $description= $_POST['description'] ;
  $language= $_POST['language'] ;
  $pages= $_POST['pages'] ;
  $image = $_FILES['file']['name'];

	// Get all the submitted data from the form
	$sql = "INSERT INTO Book (title, author, isbn, image, description, language, pages) VALUES ('$booktitle', '$bookauthor', $bookisbn, '$image','$description','$language','$pages')";

    if($result = $conn->query($sql))
    {
      http_response_code(201);
      // Now let's move the uploaded image into the folder: image
      $file_ext = strtolower(end(explode('.',$_FILES['file']['name'])));
      $file = $folderPath . $image;

      if (move_uploaded_file($file_tmp, $file)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }
    }
    else
    {
      http_response_code(422);
    }
?>