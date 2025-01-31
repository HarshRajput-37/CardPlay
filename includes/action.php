<?php

	session_start();

	require 'dbh.php';

	if (isset($_POST['pid'])) {
		$pid = $_POST['pid'];
		$pname = $_POST['pname'];
		$pprice = $_POST['pprice'];
		$pimage = $_POST['pimage'];
		$pcode = $_POST['pcode'];
		$uid = $_SESSION['userId'];
		$pqty = 1;

		$stmt = $conn->prepare("SELECT product_id FROM cart WHERE product_id=?");
		$stmt->bind_param("s",$pcode);
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		$code = $r['product_id'];

		if (!$code) {
			$query = $conn->prepare("INSERT INTO cart (product_name, product_price, product_image, product_id, qty, total_price,userid) VALUES (?,?,?,?,?,?,?)");
			$query->bind_param("ssssisi",$pname,$pprice,$pimage,$pcode,$pqty,$pprice,$uid);
			$query->execute();

			echo '<div class="alert alert-success alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Item has been added to your cart</strong>
					</div>';
		}
		else{
			echo '<div class="alert alert-danger alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Item already added to your cart !</strong>
					</div>';
		}

	}


	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
		$userid = $_SESSION['userId'];
		$stmt = $conn->prepare("SELECT * FROM cart WHERE userid = {$userid}");
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;

		echo $rows;
	}

	if (isset($_GET['remove'])) {
		$id = $_GET['remove'];

		$stmt = $conn->prepare("DELETE FROM cart WHERE id=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();

		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Item has been removed from the cart !';
		$path = $_SERVER['servername'].'/cardplay';
		header("location: " . $path ."/cart.php");
	}

	if (isset($_GET['clear'])) {
		$userid = $_SESSION['userId'];
		$stmt = $conn->prepare("DELETE FROM cart WHERE userid = {$userid}");
		$stmt->execute();
		$path = $_SERVER['servername'].'/cardplay';
		header("location: " . $path ."/cart.php");
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'All items has been removed from the cart !';
	}

	if (isset($_POST['qty'])) {
		$qty = $_POST['qty'];
		$pid = $_POST['pid'];
		$pprice = $_POST['pprice'];

		$tprice = $qty*$pprice;

		$stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=?");
		$stmt->bind_param("isi",$qty,$tprice,$pid);
		$stmt->execute();
	}

	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
		$name = $_POST['name'];
		$email = $_POST['mail'];
		$phone  = $_POST['phone'];
		$products = $_POST['products'];
		$grand_total = $_POST['grand_total'];
		$address = $_POST['address'];
		$pmode = $_POST['pmode'];
		$userid = $_POST['userid'];

		$data = '';

		$stmt = $conn->prepare("INSERT INTO orders(name,email,phone,address,paymode,products,ammount_paid,userid) VALUES(?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssssssss",$name,$email,$phone,$address,$pmode,$products,$grand_total,$userid);
		$stmt->execute();
		$data .= '<div class="text-center">
					<h1 class="display-4 mt-2 text-danger" style="padding-top: 30px; padding-bottom: 15px; font-weight: bold;"> Thank You !</h1>
					<h2 class="text-success" style="padding-bottom: 15px;">Your Order Has Been Placed Successfully !</h2>
					<h4 class="bg-danger text-light rounded p-2" style="padding-bottom: 10px; padding-top: 10px; border-bottom-style: solid; border-bottom-width: 0px; margin-bottom: 20px;">Items Purchased : '.$products.'</h4>
					<h4> Your Name : '.$name.'</h4>
					<h4> Your Email : '.$email.'</h4>
					<h4> Your Phone Number : '.$phone.'</h4>
					<h4> Total Amount Paid : '.number_format($grand_total,2).'</h4>
					<h4 style="margin-bottom: 50px;"> Payment Mode : '.$pmode.'</h4>
				</div>';

		echo $data;
	}