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
 						<div class="row">
 							<div class="column col-lg-12">
 								<div class="properties-box">
 									<div class="title"><h3>My Hostels List</h3></div>
 									<div class="inner-container">
 										<?php
 										$sql = $conn->query("SELECT * FROM hostel WHERE manager_id = '$admin_id'");
 										if (mysqli_num_rows($sql) > 0) {
 											while ($row = mysqli_fetch_assoc($sql)) {
 												$facilities = explode(',', $row['features']);
 												$price_range = explode(',', $row['price_range']);
 												$wall_pic = $row['wall_pic'];
 												$wall_pic = explode('/', $wall_pic);
 												$image = $row['wall_pic'];
 												?>
 												<div class="property-block">
 													<div class="inner-box clearfix">
 														<div class="image-box">
 															<figure class="image"><img src="../<?= $image;?>" alt=""></figure>
 														</div>
 														<div class="content-box">
 															<h3><?= $row['name']; ?></h3>
 															<div class="location"><i class="fa fa-map-marker-alt"></i> <?= $row['address']; ?></div>
 															<ul class="property-info clearfix">
 																<?php
 																$i =0;
 																foreach ($facilities as $key):
 																	if ($i == 4) break;
 																	?>
 																	<li><?= $key;?></li>
 																	<?php
 																	$i++;
 																endforeach;
 																?>
 															</ul>
 															<div class="price"><?= money($price_range[0]).' to '.money($price_range[1]);?></div>
 														</div>
 														<div class="option-box">
 															<div class="expire-date"><?= time_ago($row['date_uploaded']); ?></div>
 															<ul class="action-list">
 																<li><a href="view-hostel.php?hostel=<?= urlencode($row['id']);?>&hname=<?= urlencode($row['name']);?>&a=<?= urlencode($row['address']);?>"><i class="fa fa-eye"></i> View</a></li>
 																<li><a href="edit-hostel.php?hostel=<?= urlencode($row['id']);?>&hname=<?= urlencode($row['name']);?>&a=<?= urlencode($row['address']);?>"><i class="fa fa-edit"></i> Edit</a></li>
 																<li>
 																	<form method="POST" action="includes/del-hostel.php" class="delete-hostel-form">
 																		<input type="hidden" name="del_hostel_id" id="del_hostel_id" value="<?= $row['id'];?>">
 																		<button type="submit" name="del_hostel_btn" style="background-color: transparent;"><i class="fa fa-trash"></i> Delete</button>
 																	</form>
 																</li>
 															</ul>
 														</div>
 													</div>
 												</div>
 												<?php
 											}
 										}
 										?>
 									</div>
 								</div>
 							</div>
 						</div>
 						<?php include 'includes/copyright.php';?>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	
 </body>
 </html>