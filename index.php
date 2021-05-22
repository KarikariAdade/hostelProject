<?php
session_start();
include 'includes/config.php';
include 'includes/time-function.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hostel</title>
	<?php include 'includes/header.php';?>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="container-fluid homeslider">
		<div class="pogoSlider" id="js-main-slider">
			<div class="pogoSlider-slide" data-transition="barsRevealDown" data-duration="1000"  style="background-image:url(img/hoteldooropen.jpg);">
				<?php include 'includes/search-banner.php';?>
			</div>
			<div class="pogoSlider-slide " data-transition="blocksReveal" data-duration="1000"  style="background-image:url(img/hoteldooropen.jpg);">
				<?php include 'includes/search-banner.php'; ?>
			</div>
			<div class="pogoSlider-slide " data-transition="shrinkReveal" data-duration="1000"  style="background-image:url(img/hoteldooropen.jpg);">
				<?php include 'includes/search-banner.php'; ?>
			</div>
		</div>
	</div>

	<div class="container homeIntro">
		<div class="row">
			<div class="col-md-4">
				<div>
					<figure class="icon">
						<span class="fa fa-home fa-2x"></span>
					</figure>
					<h5>Search Hostels</h5>
					<p>Aliquam erat volutpatuis finibus eroslacus cursus consequat leocongue nonum its sociis natoque penatibus etmagnis disparturient montes nascetur ridiculusi muse</p>
				</div>
			</div>
			<div class="col-md-4">
				<div>
					<figure class="icon">
						<span class="fa fa-home fa-2x"></span>
					</figure>
					<h5>Search Roomates</h5>
					<p>Aliquam erat volutpatuis finibus eroslacus cursus consequat leocongue nonum its sociis natoque penatibus etmagnis disparturient montes nascetur ridiculusi muse</p>
				</div>
			</div>
			<div class="col-md-4">
				<div>
					<figure class="icon">
						<span class="fa fa-home fa-2x"></span>
					</figure>
					<h5>Search Roomates</h5>
					<p>Aliquam erat volutpatuis finibus eroslacus cursus consequat leocongue nonum its sociis natoque penatibus etmagnis disparturient montes nascetur ridiculusi muse</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container bestHostel">
		<div class="row">
			<div class="col-md-6">
				<h3>Best Hostels On Campus</h3>
				<p>
					Aliquam erat volutpatuis finibus eroslacus cursus consequat leocongue nonum its sociis natoque penatibus etmagnis disparturient montes nascetur ridiculusi muse eocongue nonum its sociis natoque penatibus etmagnis disparturient montes nascetur ridiculusi muse
				</p>
				<button class="btn view-more-btn"><a href="hostels">View More</a></button>
			</div>
			<div class="col-md-6">
				<figure>
					<img src="img/1.jpg" class="img-fluid">
				</figure>
			</div>
		</div>
		<div class="intro-thumb-row">
			<a href="#" class="intro-thumb">
				<img src="img/thumb2.jpg" alt="">
				<h6>Self Contained</h6>
			</a>
			<a href="#" class="intro-thumb">
				<img src="img/thumb2.jpg" alt="">
				<h6>Shared Facilities</h6>
			</a>
			<a href="#" class="intro-thumb">
				<img src="img/thumb2.jpg" alt="">
				<h6>Garages</h6>
			</a>
		</div>
	</div>
	<div class="featured-hostel container">
		<?php
		$fetch_featured = $conn->query("SELECT * FROM hostel ORDER BY reviews_number DESC LIMIT 1") or die(mysqli_error($conn));
		if (mysqli_num_rows($fetch_featured) > 0) {
			while ($row = mysqli_fetch_assoc($fetch_featured)) {
			$image = $row['wall_pic'];

			$features = explode(',', $row['features']);
			$hostel_desc = $row['description'];
			  if (strlen($hostel_desc) > 400){
                  $hostel_desc = wordwrap($hostel_desc,400);
                  $hostel_desc =explode("\n", $hostel_desc);
                  $hostel_desc = $hostel_desc[0]."...";
              }
		?>
		<div class="row" style="padding: 0;">
			<div class="col-md-6" style="padding: 0;">
				<figure style="padding:0;margin:0;">
					<img src="<?= $image; ?>" class="img-fluid" style="height: 65vh;width: 100%;">
				</figure>
			</div>
			<div class="col-md-6">
				<h3><a href="hostel-details?hostel=<?= urlencode($row['id']);?>&hname=<?= urlencode($row['name']);?>&a=<?= urlencode($row['address']);?>"><?= $row['name']?></a></h3>
				<small><span class="fa fa-map-marker-alt"></span> <?= $row['address'];?></small>
				<p id="featured-desc"><?= $hostel_desc;?></p>
				<div class="featured_info">
					<ul>
							<?php
									$i =0;
									foreach ($features as $key):
										if ($i == 3) break;
										?>
										<li><?= $key;?></li>
										<?php
										$i++;
									endforeach;
									?>
					</ul>
				</div>
				<p align="right"><span class="fa fa-calendar-alt"></span> <?= time_ago($row['date_uploaded']);?></p>
			</div>
		</div>
		<?php
			}
		}
		?>
	</div>
	<div class="container popularListing">
		<h2>Popular Hostels</h2>
		<div class="row owl-carousel owl-theme">
			<!-- <div class="col-md-4"> -->
				<?php
				$fetch_hostel = $conn->query("SELECT * FROM hostel ORDER BY id DESC LIMIT 6") or die(mysqli_error($conn));
				if (mysqli_num_rows($fetch_hostel) > 0) {
					while ($row = mysqli_fetch_assoc($fetch_hostel)) {
						$wall_pic = $row['wall_pic'];
			$wall_pic = explode('/', $wall_pic);
			$image = $wall_pic[4].'/'.$wall_pic[5].'/'.$wall_pic[6];
			$features = explode(',', $row['features']);
				?>
				<div class="card">
					<figure>
						<img src="<?= $image;?>" class="img-fluid card-img-top">
					</figure>
					<span id="available-room"><?= $row['status'];?></span>
					<div class="card-body">
						<h3><a href="hostel-details?hostel=<?= urlencode($row['id']);?>&hname=<?= urlencode($row['name']);?>&a=<?= urlencode($row['address']);?>"><?= $row['name'];?></a></h3>
						<p id="map"><span class="fa fa-map-marker-alt"></span> <?= $row['address'];?></p>
						<div class="popular_info">
							<ul>
								<?php
									$i =0;
									foreach ($features as $key):
										if ($i == 3) break;
										?>
										<li><?= $key;?></li>
										<?php
										$i++;
									endforeach;
									?>
							</ul>
						</div>
						<p align="right"><span class="fa fa-calendar-alt"></span> <?= time_ago($row['date_uploaded']);?></p>
					</div>
				</div>
				<?php
					}
				}else{
					echo 'nothing';
				}
				?>
			</div>
			<!-- </div> -->
		</div>
		<?php include 'includes/discover.php'; ?>
		<?php include 'includes/footer.php'; ?>
		
		<script type="text/javascript">
			$('#js-main-slider').pogoSlider({
				autoplay: true,
				autoplayTimeout: 5000,
				displayProgess: true,
				preserveTargetSize: true,
				targetWidth: 1000,
				targetHeight: 300,
				responsive: true
			}).data('plugin_pogoSlider');

		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.owl-carousel').owlCarousel();
			});
			$('.owl-theme').owlCarousel({
				loop: true,
				items: 1,
				nav: false,
				margin: 20,
				stagePadding: 10,
				autoplay: true,
				center: true,
				smartSpeed: 1000,
				responsive: {
					0: {
						items: 1
					},
					600: {
						items: 2
					},
					1000: {
						items: 3
					}
				}
			})
		</script>
	</body>
	</html>