<?php
session_start();
include 'config.php';
if (isset($_POST['agent_sign_up_btn'])) {
	$agent_full_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['agent_full_name']));
	$agent_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['agent_password']));
	$agent_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['agent_email']));
	$agent_phone = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['agent_phone']));
	$number = preg_match('@[0-9]@', $agent_password);
	$lowercase = preg_match('@[a-z]@', $agent_password);
	$uppercase = preg_match('@[A-Z]@', $agent_password);
	if (!empty($agent_full_name) && !empty($agent_password) && !empty($agent_email) && !empty($agent_phone)) {
		if (strlen($agent_full_name) < 5) {
			echo "Full Name too short";
		}elseif (strlen($agent_phone) < 10) {
			echo "Invalid Phone Number";
		}elseif (strlen($agent_phone) > 15) {
			echo "Invalid Phone Number";
		}elseif (!filter_var($agent_email, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid Email Address";
		}elseif (!$number) {
			echo "Password should contain at least a number";
		}elseif (!$lowercase) {
			echo "Password should contain lowercase letters";
		}elseif (!$uppercase) {
			echo "Password should contain uppercase letters";
		}
		else{
			$agent_password = sha1($agent_password);
			$check = $conn->query("SELECT * FROM managers WHERE email = '$agent_email'") or die(mysqli_error($conn));
			if (mysqli_num_rows($check) > 0) {
				echo "Account already exists";
			}else{
				$query = $conn->query("INSERT INTO managers (full_name, email, phone, password) VALUES('$agent_full_name', '$agent_email','$agent_phone', '$agent_password')") or die(mysqli_error($conn));
				if ($query) {
					$fetch_admin = $conn->query("SELECT * FROM managers WHERE email = '$agent_email'") or die(mysqli_error($conn));
					while ($row = mysqli_fetch_assoc($fetch_admin)) {
						$_SESSION['admin_id'] = $row['id'];
						$_SESSION['admin_email'] = $row['email'];
						echo "<script>window.location = 'manager/dashboard.php';</script>";
					}
				}
			}
		}
	}else{
		echo "Fill all fields before submitting";
	}
}


if (isset($_POST['agent_login_btn'])){
	$agent_login_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['agent_login_email']));
	$agent_login_password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['agent_login_password']));
	$agent_login_password = sha1($agent_login_password);
	if (!empty($agent_login_email) && !empty($agent_login_password)) {
		$checker = $conn->query("SELECT * FROM managers WHERE email = '$agent_login_email' AND password = '$agent_login_password'") or die(mysqli_error($conn));
		if (mysqli_num_rows($checker) > 0) {
			while ($row = mysqli_fetch_assoc($checker)) {
				$_SESSION['admin_id'] = $row['id'];
				$_SESSION['admin_email'] = $row['email'];
				echo "<script>window.location = 'manager/dashboard.php';</script>";
			}
		}else{
			echo "Invalid email or password";
		}
	}else{
		echo "Fill all fields before submitting";
	}
}
?>