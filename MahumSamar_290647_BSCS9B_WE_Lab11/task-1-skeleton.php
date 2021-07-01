 <!DOCTYPE html>
 <html>

 <head>
   <title>Task-1</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <link rel="stylesheet" href="style.css">
 </head>

 <body>
   <h2>Task 1</h2>
   <h3>Temperature Calculations</h3>
   <?php
    $month_temp = "78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 81, 76, 73,  
					68, 72, 73, 75, 65, 74, 63, 67, 65, 64, 68, 73, 75, 79, 73";
    $temp_array = explode(',', $month_temp);
    sort($temp_array);

    $total_temp = 0;
    $length = count($temp_array);
    foreach ($temp_array as $temp) {
      $total_temp += $temp;
    }

    $avg_temp = $total_temp / $length;
    echo "Average Temperature is : " . $avg_temp . "";
    echo "<br>";
    echo " List of seven lowest temperatures :";
    for ($i = 0; $i < 7; $i++) {
      echo $temp_array[$i] . ", ";
    }
    echo "<br>";
    echo "List of seven highest temperatures :";
    for ($i = ($length - 7); $i < ($length); $i++) {
      echo $temp_array[$i] . ", ";
    }
    ?>
 </body>

 </html>