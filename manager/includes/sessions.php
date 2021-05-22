<?php
session_start();
include 'config.php';
// include 'time-function.php';
if (!isset($_SESSION['admin_id'])) {
	echo "<script>window.location = '../home';</script>";
}
$admin_id = $_SESSION['admin_id'];
	$admin_call = $conn->query("SELECT * FROM managers WHERE id = '$admin_id'") or die(mysqli_error($conn));
		while ($row = mysqli_fetch_assoc($admin_call)) {
		$admin_full_name = $row['full_name'];
		$explode_name = explode(' ', $admin_full_name);
		$first_name = $explode_name[0];
		$email = $row['email'];
		$phone = $row['phone'];
		$description = $row['description'];
		$address = $row['address'];
		$profile_picture = $row['profile_picture'];
	}
	function money($number){
	return 'Gh&cent'.number_format($number,2);
}
?>