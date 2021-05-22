<?php
include 'config.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$review = $conn->query("UPDATE hostel SET reviews_number = reviews_number + 1 WHERE id = '$id'") or die(mysqli_error($conn));
	if ($review) {
		echo "Thanks for showing us Love";
	}
}
?>