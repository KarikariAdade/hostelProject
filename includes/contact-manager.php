<?php
include 'config.php';
if (isset($_POST['contact_manager_btn'])) {
	$manager_id = mysqli_real_escape_string($conn, $_POST['manager_id']);
	$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
	$email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$user_message = mysqli_real_escape_string($conn, $_POST['user_message']);
	if (!empty($full_name) && !empty($email_address) && !empty($phone) && !empty($user_message)) {
		if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid email address";
		}else{
			$insert = $conn->query("INSERT INTO messages(manager_id, full_name, phone, email, message) VALUES('$manager_id', '$full_name', '$phone','$email_address', '$user_message')") or die(mysqli_error($conn));
			if ($insert) {
				echo "Message has been sent, a feedback will be sent shortly";
			}
		}
	}else{
		echo "Fill all fields before submitting";
	}
}
?>