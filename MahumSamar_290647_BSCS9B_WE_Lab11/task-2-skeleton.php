<!DOCTYPE html>
<html>

<head>
	<title>Task-2</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style>
		td {
			padding: 5px;
		}
	</style>
	<link rel="stylesheet" href="style.css">

</head>

<body>
<h2>Task 2</h2>

	<?php
	echo "<table border =\"1\" style='border-collapse: collapse'>";
	for ($row = 1; $row <= 6; $row++) {
		echo "<tr> \n";
		for ($col = 1; $col <= 5; $col++) {
			$product = $col * $row;
			echo "<td>$col * $row = $product</td> \n";
		}
		echo "</tr>";
	}
	echo "</table>";
	?>
</body>

</html>