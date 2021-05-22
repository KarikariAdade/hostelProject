<?php
$hostel_number = $conn->query("SELECT * FROM hostel WHERE manager_id = '$admin_id'") or die(mysqli_error($conn));
$fetch_hostel_number = mysqli_num_rows($hostel_number);

$fetch_review = $conn->query("SELECT SUM(reviews_number)  AS value_sum FROM hostel WHERE manager_id = '$admin_id'") or die(mysqli_error($conn));
$review_numbers = mysqli_fetch_assoc($fetch_review);
$sum = $review_numbers['value_sum'];

$feedback = $conn->query("SELECT * FROM messages WHERE manager_id = '$admin_id'");
$fetch_feedback = mysqli_num_rows($feedback);
?>

<div class="row">
	                	<div class="col-lg-4 col-md-6 col-sm-6">
	                		<div class="ui-item bg-success">
	                			<div class="left">
	                				<h4><?= $fetch_hostel_number; ?></h4>
	                				<p>Hostels</p>
	                			</div>
	                			<div class="right">
	                				<i class="la la-home"></i>
	                			</div>
	                		</div>
	                	</div>
	                	<div class="col-lg-4 col-md-6 col-sm-6">
	                		<div class="ui-item bg-warning">
	                			<div class="left">
	                				<h4><?= $sum; ?></h4>
	                				<p>Good Reviews</p>
	                			</div>
	                			<div class="right">
	                				<i class="la la-heart-o"></i>
	                			</div>
	                		</div>
	                	</div>
	                	<div class="col-lg-4 col-md-6 col-sm-6">
	                		<div class="ui-item bg-active">
	                			<div class="left">
	                				<h4><?= $fetch_feedback; ?></h4>
	                				<p>Message (s)</p>
	                			</div>
	                			<div class="right">
	                				<i class="la la-comments-o"></i>
	                			</div>
	                		</div>
	                	</div>
	                </div>