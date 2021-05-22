<?php
session_start();
include 'includes/config.php';
include 'includes/time-function.php';
if (!isset($_GET['hostel'])) {
	echo "<script>window.location = 'hostels';</script>";
}
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
			<div class="col-md-9">
				<h1>Hostel Details</h1>
			</div>
			<div class="col-md-3">
				<h6 style="padding-top: 13% !important;">Home ›› Hostels ›› Hostel Details</h6>
			</div>
		</div>
	</div>
	<div class="container-fluid hostels-view" style="margin-top: 8%;">
		<div class="row">
			<?php
			$hostel = $_GET['hostel'];
			$fetch_pictures = $conn->query("SELECT * FROM hostel_images WHERE hostel_id = '$hostel'");
			$fetch_detail = $conn->query("SELECT * FROM hostel WHERE id = '$hostel'") or die(mysqli_error($conn));
			while ($row = mysqli_fetch_assoc($fetch_detail)) {
				$manager_id = $row['manager_id'];
				$hostel_id = $row['id'];
				$name = $row['name'];
				$address = $row['address'];
				$status = $row['status'];
				$room_type = $row['room_type'];
				$features = $row['features'];
				$price_range = $row['price_range'];
				$price_range = explode(',', $price_range);
				$date_uploaded = $row['date_uploaded'];
				$description = $row['description'];
				$review = $row['reviews_number'];
				$features = explode(',', $features);
			}
			?>
			<div class="col-md-8" style="padding:0 5%;">
				<div class="hostel-detail-headers">
					<h3><?= $name; ?></h3>
					<p id="hostel-address"><span class="fa fa-map-marker-alt"></span><?= $address;?> <span class="fa fa-heart" onclick="love(<?= $hostel_id;?>)" id="love-icon"></span></p>
					<ul>
						<li><?= $status; ?></li>
						<li><?= $room_type ?></li>
						<li><?= money($price_range[0]).' to '.money($price_range[1]);?></li>
						<li><?= 'Uploaded '. time_ago($date_uploaded); ?></li>
					</ul>
				</div>
				<script type="text/javascript">
					function love(id){
		$.ajax({
			url: 'includes/love-feedback.php',
			method:'POST',
			data:{
				id: id
			},
			success:function(data){
				swal('Thank You!', data, 'success');
			}
		})
	}
				</script>
				<div class="hostel-details-carousel">
					<div class="owl-carousel owl-theme">
						<?php
						$i = 0;
						foreach ($fetch_pictures as $row) {
							$image = $row['path'];
							$i++;
							?>
							<div class="item" data-hash="<?= $i; ?>">
								<img src="<?= $image;?>" class="img-fluid">
							</div>
							<?php 
						}
						?>
					</div>
					<div class="carousel-links owl-theme owl-carousel" align="center">
						<?php
						$i = 0;
						foreach ($fetch_pictures as $row) {
							$image = $row['path'];
							$i++;
							?>
							<a href="#<?= $i; ?>">
								<img src="<?= $image;?>" class="img-fluid"></a>
								<?php 
							}
							?> 

						</div>
					</div>
					<?php include 'includes/hostel-desc.php';?>
					<?php include 'includes/hostel-manager-contact.php'; ?>
					<?php include 'includes/hostel-popular-listing.php'; ?>
				</div>
				<?php include 'includes/hostel-sidebar.php'; ?>
			</div>
		</div>
		<?php include 'includes/discover.php';?>
		<?php include 'includes/footer.php';?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.carousel-links').owlCarousel({
					items: 3,
					loop: true,
					center: true,
					margin: 10,
					callbacks: true,
					autoplayHoverPause: true,
					autoplay: true,
					smartSpeed: 1000
				});
				$('.owl-carousel').owlCarousel({
					items: 1,
					loop: true,
					center: true,
					margin: 10,
					callbacks: true,
					URLhashListener: true,
					autoplayHoverPause: true,
					startPosition: 'URLHash',
					autoplay: true,
					smartSpeed: 1000
				});
			})
		</script>
	</body>
	</html>