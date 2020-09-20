<?php

	require 'includes/dbh.php';

	$grand_total = 0;
	$allItems = '';
	$items = array();

	$sql = "SELECT CONCAT(product_name,'(',qty,')')AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt ->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
		$grand_total +=$row['total_price'];
		$items[] = $row['ItemQty'];
	}
	echo $grand_total;
	print_r(expression)