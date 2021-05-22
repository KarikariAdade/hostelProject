<?php
session_start();
include 'config.php';
$id = $_SESSION['admin_id'];
if (isset($_FILES)) {
	$file_name = $_FILES['edit-pic-upload']['name'];
	$file_array = explode('.', $file_name);
	$extension = $file_array[1];
	$allowed_ext = array('jpg','jpeg','png','gif');
	if (!in_array($extension, $allowed_ext)) {
		echo "Upload only images";
	}else{
		$http = $_SERVER['DOCUMENT_ROOT'];
		$img_source = $_FILES['edit-pic-upload']['tmp_name'];
		$target_destination = $http.'/hostel/manager/profile-img/'.$file_name;
		$db_path = 'manager/profile-img/'.$file_name;
		if (move_uploaded_file($img_source, $target_destination)) {
			$update_sql = $conn->query("UPDATE managers SET profile_picture = '$db_path' WHERE id = '$id'") or die(mysqli_error($conn));
			if ($update_sql) {
				echo "Profile Picture successfully updated";
			}

		}
	}
}
?>
