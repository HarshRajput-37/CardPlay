<?php

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$telephone = $_POST['telephone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];


	$mailTo = "hharshraj372@yahoo.in";
	$headers = "From: ".$emailFrom;
	$txt="You have recieved a email from ".$name.".\n\n".$message;


	mail($mailTo, $subject, $txt, $headers);
	header("Location: index.php?mailsend");
	}
?>