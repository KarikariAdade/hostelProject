 <?php 
 include 'includes/sessions.php';
 include '../includes/time-function.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<?php include 'includes/links.php';?>
 </head>

 <body>

 	<div class="page-wrapper">
 		<?php include 'includes/main-header.php';?>
 		<div class="dashboard">
 			<div class="container-fluid">
 				<div class="content-area">
 					<div class="dashboard-content">
 						<div class="dashboard-header clearfix">
 							<div class="row">
 								<div class="col-md-6 col-sm-12"><h4>My Hostels</h4></div>
 								<div class="col-md-6 col-sm-12">
 									<div class="breadcrumb-nav">
 										<ul>
 											<!-- <li><a href="../index-2.html">Index</a></li> -->
 											<li><a href="dashboard.php">Dashboard</a></li>
 											<li class="active">My Hostels</li>
 										</ul>
 									</div>
 								</div>
 							</div>
 						</div>
 						<div class="container-fluid hostels-view">
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
			<div class="col-md-11" style="padding:0 5%;">
				<div class="hostel-detail-headers">
					<h3><?= $name; ?></h3>
					<p id="hostel-address"><span class="fa fa-map-marker-alt"></span><?= $address;?></p>
					<ul>
						<li><?= $status; ?></li>
						<li><?= $room_type ?></li>
						<li><?= money($price_range[0]).' to '.money($price_range[1]);?></li>
						<li><?= 'Uploaded '. time_ago($date_uploaded); ?></li>
					</ul>
				</div>
				<div class="hostel-details-carousel">
					<div class="owl-carousel owl-theme">
						<?php
						$i = 0;
						foreach ($fetch_pictures as $row) {
							$image = $row['path'];
							$i++;
							?>
							<div class="item" data-hash="<?= $i; ?>">
								<img src="../<?= $image;?>" class="img-fluid">
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
								<img src="../<?= $image;?>" class="img-fluid"></a>
								<?php 
							}
							?> 

						</div>
					</div>
					<?php include '../includes/hostel-desc.php';?>
				</div>
			</div>
		</div>

 						<?php include 'includes/copyright.php';?>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
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