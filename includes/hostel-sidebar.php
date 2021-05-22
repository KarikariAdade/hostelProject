<div class="col-md-4 hostel-sidebar">
				<h4>Hostels Search</h4>
				<div class="sidebar-form">
					<div class="form">
						<form method="POST" action="search-results">
						<div class="form-group">
							<input type="text" name="hostel_name" class="form-control" placeholder="Hostel Name">
						</div>
						<div class="form-group">
							<input type="text" name="hostel_location" class="form-control" placeholder="Hostel Location">
						</div>
						<div class="form-group">
							<select name="hostel_type" class="form-control">
								<option selected>Any Type</option>
								<option>1 in a room</option>
								<option>2 in a room</option>
								<option>3 in a room</option>
								<option>Self-contained Rooms</option>
								<option>Shared Facilities</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" name="hostel_min_price" class="form-control" placeholder="Min Price">
						</div>
						<div class="form-group">
							<input type="text" name="hostel_max_price" class="form-control" placeholder="Max Price">
						</div>
						<button class="btn" type="submit" name="search_hostel_btn">Search</button>
						</form>
					</div>
				</div>
				<div class="sidebar-featured popularListing">
					<h4>FEATURED HOSTELS</h4>
				<div class="row">
						<?php
				$fetch_hostel = $conn->query("SELECT * FROM hostel ORDER BY id DESC LIMIT 3") or die(mysqli_error($conn));
				if (mysqli_num_rows($fetch_hostel) > 0) {
					while ($row = mysqli_fetch_assoc($fetch_hostel)) {
			$image = $row['wall_pic'];
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
			</div>
			</div>