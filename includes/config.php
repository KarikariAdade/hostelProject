<?php
$conn = mysqli_connect("localhost", "root", "", "hostel") or die(mysqli_error($conn));
function money($number){
	return 'Gh&cent'.number_format($number,2);
}
?>