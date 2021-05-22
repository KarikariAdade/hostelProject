<?php 
session_start();
$id = $_SESSION['admin_id'];
include 'config.php';
if (isset($_POST['update_password_btn'])) {
	$current_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['current_password']));
	$new_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['new_password']));
	$confirm_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['confirm_password']));
	if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
		$uppercase = preg_match('@[A-Z]@', $new_password);
		$numbers = preg_match('@[0-9]@', $new_password);
		$lowercase = preg_match('@[a-z]@', $new_password);
		$current_password = sha1($current_password);
		$fetch = $conn->query("SELECT * FROM managers WHERE id = '$id'");
		while ($row = mysqli_fetch_assoc($fetch)) {
			$old_password = $row['password'];
			if ($old_password != $current_password) {
				echo "Incorrect current password";
			}elseif (!$uppercase) {
				echo "Password should contain uppercase letters";
			}elseif (!$lowercase) {
				echo "Password should contain lowercase letters";
			}elseif (!$numbers) {
				echo "Password should contain at least a number";
			}elseif (strlen($new_password) < 10) {
				echo "Password too short";
			}elseif ($new_password != $confirm_password) {
				echo "New passwords do not match";
			}else{
				$confirm_password = sha1($confirm_password);
				$update_pwd = $conn->query("UPDATE managers SET password = '$confirm_password' WHERE id = '$id'") or die(mysqli_error($conn));
				if ($update_pwd) {
					echo "Password successfully updated";
				}else{
					echo "Password was not updated successfully";
				}
			}
		}
	}else{
		echo "Fill all fields before submitting";
	}
}
?>