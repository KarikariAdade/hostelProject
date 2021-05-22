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
				<h1>Search Results</h1>
			</div>
			<div class="col-md-2">
				<h6>Home ›› Hostels</h6>
			</div>
		</div>
	</div>
	<div class="container-fluid hostels-view" style="margin-top: 8%;">
		<div class="row">
			
			<div class="col-md-8">
				<?php
	if (isset($_POST['search_hostel_btn'])) {
		$hostel_name = (($_POST['hostel_name'])?$_POST['hostel_name']:'');
		// $sql = "SELECT * FROM hostel WHERE name LIKE '%$hostel_name%'";
		$hostel_location = (isset($_POST['hostel_location'])?$_POST['hostel_location']:'');
		$hostel_type = (($_POST['hostel_type'])?$_POST['hostel_type']:'');
		$hostel_min_price = (($_POST['hostel_min_price'])?$_POST['hostel_min_price']:'');
		$hostel_max_price = (($_POST['hostel_max_price'])?$_POST['hostel_max_price']:'');
		$sql = "SELECT * FROM hostel WHERE name LIKE '%$hostel_name%'";

		if (!empty($hostel_location)) {
			$sql .= " OR address LIKE '%$hostel_location%'";
		}
		if (!empty($hostel_type)) {
			$sql .= " OR features LIKE '%$hostel_type%'";
		}
		if (!empty($hostel_min_price)) {
			$sql .= " OR price_range LIKE '%$hostel_min_price%'";
		}
		if (!empty($hostel_max_price)){
			$sql .= " OR price_range LIKE '%$hostel_max_price%'";
		}
		$query = $conn->query($sql) or die(mysqli_error($conn));
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
					$hostel_id = $row['id'];
			$facilities = $row['features'];
			$facilities = explode(',', $facilities);
			$wall_pic = $row['wall_pic'];
			$wall_pic = explode('/', $wall_pic);
			$image = $wall_pic[4].'/'.$wall_pic[5].'/'.$wall_pic[6];
			?>
			<div class="card">
				<div class="row content">
					<div class="col-md-6">
						<div>
							
							<img src="<?= $image; ?>" class="img-fluid">
						</div>
					</div>
					<div class="col-md-6">
						<div class="hostel-details">
							<h4><?= $row['name']; ?></h4>
							<p id="hostel-location"><span class="fa fa-map-marker-alt"></span> <?= $row['address']; ?></p>
							<div class="featured_info">
								<ul>
									<?php
									$i =0;
									foreach ($facilities as $key):
										if ($i == 3) break;
										?>
										<li><?= $key;?></li>
										<?php
										$i++;
									endforeach;
									?>
								</ul>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p>
										<span class="fa fa-calendar-alt"></span> <?= time_ago($row['date_uploaded']);?>
									</p>
								</div>
								<div class="col-md-6">
									<button class="btn"><a href="hostel-details?hostel=<?= urlencode($hostel_id);?>&hname=<?= urlencode($row['name']);?>&a=<?= urlencode($row['address']);?>">View Details</a></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
	}
		}else{
			echo "<h2>No hostels match your search keywords</h2>";
		}
	}else{
		echo "<script>window.location = '../hostel';</script>";
	}
	?>
			</div>
			
<?php include 'includes/hostel-sidebar.php'; ?>
		</div>
	</div>
	<?php include 'includes/discover.php';?>
		<?php include 'includes/footer.php';?>
	</body>
	</html>