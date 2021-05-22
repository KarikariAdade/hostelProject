<?php

session_start();
include 'config.php';
$id = $_SESSION['admin_id'];
$address = (isset($_POST['hostel_address'])?$_POST['hostel_address']:'');
if (isset($_POST['display_image_section'])) {
	$hostel = $_POST['hostel'];
	$hostel_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hostel_name']));
	$hostel_status = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hostel_status']));
	$hostel_address = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hostel_address']));
	$hostel_room_type = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hostel_room_type']));
	$hostel_min_price = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hostel_min_price']));
	$hostel_max_price = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hostel_max_price']));
	$hostel_detail = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hostel_detail']));
	$air_conditioning = (isset($_POST['air_conditioning'])?$_POST['air_conditioning']:'');
	$alarm_system = (isset($_POST['alarm_system'])?$_POST['alarm_system']:'');
	$cctv_camera = (isset($_POST['cctv_camera'])?$_POST['cctv_camera']:'');
	$one_room = (isset($_POST['one_room'])?$_POST['one_room']:'');
	$two_rooms = (isset($_POST['two_rooms'])?$_POST['two_rooms']:'');
	$three_rooms = (isset($_POST['three_rooms'])?$_POST['three_rooms']:'');
	$car_packing = (isset($_POST['car_packing'])?$_POST['car_packing']:'');
	$swimming_pool = (isset($_POST['swimming_pool'])?$_POST['swimming_pool']:'');
	$laundry_room = (isset($_POST['laundry_room'])?$_POST['laundry_room']:'');
	$seat_places = (isset($_POST['seat_places'])?$_POST['seat_places']:'');
	$kitchen = (isset($_POST['kitchen'])?$_POST['kitchen']:'');

	if(!empty($hostel_name) && !empty($hostel_status) && !empty($hostel_address) && !empty($hostel_room_type) && !empty($hostel_min_price) && !empty($hostel_max_price) && !empty($hostel_detail)){
		$features = array();
		$features = array($air_conditioning,$alarm_system,$cctv_camera,$two_rooms,$three_rooms,$swimming_pool,$laundry_room,$seat_places,$kitchen,$one_room,$car_packing);
		$price_range = array($hostel_min_price,$hostel_max_price);
		$price_range = implode(',', $price_range);
		$features = implode(',', $features);
		// $add = $conn->query("INSERT INTO hostel (manager_id, name, address, status, room_type, features, price_range, description) VALUES('$id', '$hostel_name', '$hostel_address', '$hostel_status', '$hostel_room_type', '$features', '$price_range','$hostel_detail')");
		$add = $conn->query("UPDATE hostel SET
			manager_id = '$id',
			name = '$hostel_name',
			address = '$hostel_address',
			status = '$hostel_status',
			room_type = '$hostel_room_type',
			features = '$features',
			price_range = '$price_range',
			description = '$hostel_detail' WHERE id = '$hostel'
			");
		if ($add) {
			echo "Hostel updated, Please proceed to updating Images";
		}
	}else{
		echo "Fill all fields under starred categories before submitting";
	}
}

if (isset($_FILES['file']['name'][0])) {
	$fetch_last_id = $conn->query("SELECT * FROM hostel WHERE manager_id = '$id' ORDER BY id DESC LIMIT 1");
	if (mysqli_num_rows($fetch_last_id) > 0) {
		while ($last_row = mysqli_fetch_assoc($fetch_last_id)) {
			$last_id = $last_row['id'];
			foreach ($_FILES['file']['name'] as $keys => $values) {
				$http = $_SERVER['DOCUMENT_ROOT'];
				$images_source = $_FILES['file']['tmp_name'][$keys];
				$path = $http.'/hostel/manager/hostel-img/'.$values;
				$db_path = '/manager/hostel-img/'.$values;
				$img_array = array($path);
				$img_array = implode(',', $img_array);
				if (move_uploaded_file($images_source, $path)) {
					$insert_pic = $conn->query("INSERT INTO hostel_images(hostel_id, path) VALUES('$last_id', '$db_path')") or die(mysqli_error($conn));
					$wall_pic = $conn->query("UPDATE hostel SET wall_pic = '$db_path' WHERE id = '$last_id'") or die(mysqli_error($conn));
					if ($insert_pic && $wall_pic) {
						echo "Your pictures have been uploaded successfully";
					}
				}

			}
		}
	}else{
		echo "Please Fill the necessary forms before uploading an image";
	}
}
?>