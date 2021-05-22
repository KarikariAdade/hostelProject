<!-- Main Header-->
		<header class="main-header">
			<div class="main-box clearfix">
				<!-- Logo Box -->
				<div class="logo-box">
					<?php
					$fetch_message = $conn->query("SELECT * FROM messages WHERE manager_id = '$admin_id' AND replied = 0");
					$fetch_message_counter = mysqli_num_rows($fetch_message);

					// echo $profile_picture;
					// $explode_dp = explode('/', $profile_picture);
					// $user_pic = $explode_dp[5].'/'.$explode_dp[6];
					 ?>
					 <?php if(!empty($profile_picture)):?>
					<div class="logo"><a href=""><img src="../<?= $profile_picture;?>" style="width:50px;border-radius:50%;height: 50px;" alt="" title=""></a></div>
				<?php endif;?>
				</div>

				<!-- Upper Right-->
				<div class="upper-right">
					<ul class="clearfix">
						<li class="dropdown option-box">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="../<?= $profile_picture;?>" alt="avatar" class="thumb">My Account</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="dashboard.php">Dashboard</a>
								<a class="dropdown-item" href="">Messages</a>
								<a class="dropdown-item" href="profile.php">My profile</a>
								<a class="dropdown-item" href="logout.php">Log out</a>
							</div>
						</li>
						<li class="submit-property">
							<a href="submit-hostel.php" class="theme-btn btn-style-one">Submit Hostel <i class="pe-7s-up-arrow"></i></a>
						</li>
						<li class="nav-toggler">
							<button class="toggler-btn nav-btn"><span class="bar bar-one"></span><span class="bar bar-two"></span><span class="bar bar-three"></span></button>
						</li>
					</ul>
				</div>
			</div>
		</header>
		<!--End Main Header -->

		<!-- Hidden Bar -->
		<section class="hidden-bar">
			<div class="dashboard-inner">
				<div class="cross-icon"><span class="fa fa-times" style="color:#fff;"></span></div>
				<ul class="navigation">
					<li><a href="dashboard.php"> Dashboard</a></li>
					<li><a href="messages.php"> Messages <span class="tag"><?= $fetch_message_counter; ?></span></a></li>
					<li><a href="my-hostels.php">My Hostels</a></li>
					<!-- <li><a href="#">Favorite Hostels</a></li> -->
					<li><a href="submit-hostel.php">Submit Hostel</a></li>
					<li><a href="profile.php">My Profile</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</section>
		<!--End Hidden Bar-->