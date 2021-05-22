<?php
session_start();
include 'includes/config.php';
include 'includes/time-function.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>About</title>
	<?php include 'includes/header.php';?>
</head>
<body>
	<?php include 'includes/navbar.php';?>
	<div class="container-fluid about-intro">
		<div class="row">
			<div class="col-md-10">
				<h1>Hostels</h1>
			</div>
			<div class="col-md-2">
				<h6>Home ›› Hostels</h6>
			</div>
		</div>
	</div>
	<div class="container search-banner">
		<form class="row">
			<div class="col-md-4 form-group">
				<input type="text" name="" class="form-control" placeholder="Hostel Name">
			</div>
			<div class="col-md-2 form-group">
				<select class="form-control">
					<option>Any Type</option>
					<option>1 in a room</option>
					<option>2 in a room</option>
					<option>3 in a room</option>
					<option>Self-Contained</option>
					<option>Shared Facilities</option>
				</select>
			</div>
			<div class="col-md-2 form-group">
				<input type="number" name="" class="form-control" placeholder="Min Price">
			</div>
			<div class="col-md-2 form-group" style="border-right: none;">
				<input type="number" name="" class="form-control" placeholder="Max Price">
			</div>
			<div class="col-md-2">
			<button type="submit" class="btn btn-primary">Search <span class="fa fa-search"></span></button>
		</div>
		</form>
		</div>
	<div class="container-fluid hostels-view" style="margin-top: 8%;">
		<div class="row">
			<?php include 'includes/hostel-view-cards.php';?>
			<?php include 'includes/hostel-sidebar.php';?>
		</div>
	</div>
	<?php include 'includes/discover.php';?>
		<?php include 'includes/footer.php';?>
	</body>
	</html>