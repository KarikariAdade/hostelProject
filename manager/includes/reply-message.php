<?php
include 'config.php';
if (isset($_POST['submit_message'])) {
	$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
	$message_id = $_POST['message_id'];
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$message = mysqli_real_escape_string($conn, $_POST['message']);
	if (!empty($full_name) && !empty($email) && !empty($message)) {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid Email Address";
		}else{
			$to = $email;
			$subject = "Message from Hostel Finder";

			$message = "
			<html>
			<head>
			<title>Message from Hostel Finder</title>
			</head>
			<body>
			<p>".$message."</p>
			</body>
			</html>
			";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: Hostel Finder' . "\r\n";

			$mail = mail($to,$subject,$message,$headers);
			if ($mail) {
				$conn->query("UPDATE messages SET replied = 1 WHERE id = $message_id") or die(mysqli_error($conn));
				echo "Reply successfully Sent";
			}else{
				echo "Reply could not be sent. Check your internet connection";
			}
		}
	}else{
		echo "Fill all fields before submitting";
	}
}
?>