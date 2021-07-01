<!DOCTYPE html>
<html>

<head>
      <title>Task-3</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <link rel="stylesheet" href="style.css">
</head>

<body>
      <h2>Task 3</h2>
      <h3>Chess Board - PHP Nested Loops</h3>
      <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
            <!-- cell 270px wide (8 columns x 60px) -->
            <?php
            for ($row = 1; $row <= 8; $row++) {
                  echo "<tr>";
                  for ($col = 1; $col <= 8; $col++) {
                        $total = $row + $col;
                        if ($total % 2 == 0) {
                              echo "<td height=30px width=30px bgcolor=#000000></td>";
                        } else {
                              echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
                        }
                  }
                  echo "</tr>";
            }
            ?>
      </table>
</body>

</html>