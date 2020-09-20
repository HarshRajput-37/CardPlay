<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "cardplay";

	$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
	mysqli_select_db($conn, $dBName);
	
	// if ($conn) {
	// 	echo "connection successful";
	// }
	// else {
	// 	echo "connection unsuccesfull";
	// }

	$query = " SELECT category_id, product_id, product_name, product_template, product_template_clear, price, discount, description FROM products order by product_id ASC ";

	$queryfire = mysqli_query($conn, $query);
	$num = mysqli_num_rows($queryfire);

	if ($num > 0) {
		while ($product = mysqli_fetch_array($queryfire)) {
		}
	}
?>