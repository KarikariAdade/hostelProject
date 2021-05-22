<?php
include 'config.php';
 	if (isset($_POST['del_hostel_btn'])) {
 		$del_hostel_id = $_POST['del_hostel_id'];
 		// echo "<script>alert('".$del_hostel_id."');</script>";
 		$fetch_pics = $conn->query("SELECT * FROM hostel_images WHERE hostel_id = '$del_hostel_id'") or die(mysqli_error($conn));
 		foreach ($fetch_pics as $row) {
 			$path = $row['path'];
 			$seg = explode('/', $path);
 			$file_path = $seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3].'/'.$seg[4].'/'.$seg[5].'/';
 			// echo $file_path.'<br>';
 			$del_multiple = $conn->query("DELETE FROM hostel_images WHERE hostel_id = '$del_hostel_id'") or die(mysqli_error($conn));
 			unlink($file_path.$seg[6]);
 			$conn->query("DELETE FROM hostel WHERE id = '$del_hostel_id'") or die(mysqli_error($conn));
 			header('Location: ../my-hostels.php');
 		}
 	}
 	?>