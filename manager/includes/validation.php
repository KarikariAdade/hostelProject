<?php
include 'config.php';
if (isset($_POST['update_profile_btn'])) {
 	$edit_full_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['edit_full_name']));
 	$edit_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['edit_email']));
 	$edit_address = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['edit_address']));
 	$edit_phone = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['edit_phone']));
 	$edit_description = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['edit_description']));
 	$edit_profile_id = $_POST['edit_profile_id'];
 	if (!empty($edit_full_name) && !empty($edit_email) && !empty($edit_address) && !empty($edit_phone) && !empty($edit_description)) {
 		if (!filter_var($edit_email, FILTER_VALIDATE_EMAIL)) {
 			echo "Invalid Email Address";
 		}elseif (strlen($edit_full_name) < 5) {
 			echo "Full Name too short";
 		}else{
 			$sql = $conn->query("UPDATE managers SET full_name = '$edit_full_name', email = '$edit_email', phone = '$edit_phone', address = '$edit_address', description = '$edit_description' WHERE id = '$edit_profile_id'") or die(mysqli_error($conn));
 			if ($sql) {
 				$success = true;
 				echo "Profile has been updated successfully";
 			}
 		}
 	}else{
 		echo "Fill all fields before submitting";
 	}
 } 

?>
<script type="text/javascript">
	var success = '<?= $success; ?>';
	if (success = true) {
		$('#edit-profile-error').removeClass('alert-danger');
		$('#edit-profile-error').addClass('alert-success');
	}
</script>
