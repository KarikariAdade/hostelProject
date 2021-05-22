<?php
$fetch_manager = $conn->query("SELECT * FROM managers WHERE id ='$manager_id'") or die(mysqli_error($conn));
while ($man = mysqli_fetch_assoc($fetch_manager)) {
	$manager_id = $man['id'];
	$manager_name = $man['full_name'];
	$manager_email = $man['email'];
	$manager_address = $man['address'];
	$manager_phone = $man['phone'];
	$image = $man['profile_picture'];
}
?>
<div class="hostel-desc manager-section">
	<h4>Contact Hostel Manager</h4>
	<div class="row">
		<div class="col-md-3">
			<figure>
				<img src="<?= $image;?>" class="img-fluid">
			</figure>
		</div>
		<div class="col-md-9">
			<h6><span class="fa fa-user-tie icon"></span><?= $manager_name;?></h6>
			<h6>
				<span class="fa fa-home icon"></span>
				<?= $manager_address;?>
			</h6>
			<h6><span class="fa fa-phone icon"></span><?= $manager_phone; ?></h6>
			<h6><span class="fa fa-envelope icon"></span><?= $manager_email; ?></h6>
		</div>
	</div>
	<form method="POST" class="hostel-manager-contact">
		<input type="hidden" id="manager_id" value="<?= $manager_id; ?>">
		<p id="data"></p>
		<div class="form-group">
			<input type="text" id="full_name" placeholder="Full Name" class="form-control">
		</div>
		<div class="form-group">
			<input type="email" id="email_address" placeholder="Email Address" class="form-control">
		</div>
		<div class="form-group">
			<input type="tel" id="phone" placeholder="Phone" class="form-control">
		</div>
		<div class="form-group">
			<textarea class="form-control" id="user_message" rows="6" cols="5" placeholder="Your Message"></textarea>
		</div>
		<button class="btn" type="submit" id="contact_manager_btn">Contact Manager <span class="fab fa-telegram-plane"></span></button>
	</form>
</div>