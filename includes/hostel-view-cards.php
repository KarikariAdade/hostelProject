<div class="col-md-8">
	<?php
	$fetch_hostel = $conn->query("SELECT * FROM hostel ORDER BY id DESC");
	if (mysqli_num_rows($fetch_hostel) > 0) {
		while($row = mysqli_fetch_assoc($fetch_hostel)){
			$hostel_id = $row['id'];
			$facilities = $row['features'];
			$facilities = explode(',', $facilities);
			$image = $row['wall_pic'];
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
		<?php }
	}else{
		echo '<h3>Hostels are not available at the moment. <br> Come back later</h3>';
	}
	?>
</div>