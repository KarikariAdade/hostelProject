<div class="container-fluid admin-profile">
	<ul class="nav nav-pills" align="center" role="tablist">
		<li class="nav-item">
			<button class="nav-link btn-style-one theme-btn active" data-toggle="tab" href="#view-profile-panel" role="tab"><i class="fas fa-user-plus"></i>
			View profile</button>
		</li>
		<li class="nav-item">
			<button class="nav-link btn-style-one theme-btn" data-toggle="tab" href="#edit-profile-panel" role="tab"><i class="fas fa-user-plus"></i>
			Edit Profile</button>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade in show active" id="view-profile-panel">
			<div class="container">
				<div class="row">
					<div class="column col-lg-12">
						<div class="properties-box">
							<div class="inner-container">
								<div class="title"><h3>View Profile</h3></div>
								<div class="profile-form">
									<div class="row">
										<div class="col-lg-4 col-md-12 col-sm-12">
											<div class="edit-profile-photo">
												<img src="../<?= $profile_picture; ?>" alt="profile-photo">
											</div>
										</div>
										<div class="col-lg-8 col-md-12 col-sm-12 view-profile-section">
											<div class="row">
												<div class="col-lg-6">
													<h6>Full Name</h6>
													<p><?= $admin_full_name; ?></p>
												</div>
												<div class="col-lg-6">
													<h6>Email Address</h6>
													<p><?= $email; ?></p>
												</div>
												<div class="col-lg-6">
													<h6>Phone</h6>
													<p><?= $phone; ?></p>
												</div>
												<?php if(!empty($description)):?>
													<div class="col-lg-6">
														<h6>Address</h6>
														<p><?= $address; ?></p>
													</div>
													<div class="col-lg-12">
														<h6>Description</h6>
														<p><?= $description;?></p>
													</div>
												<?php endif;?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade in" id="edit-profile-panel">
			<div class="container">
				<div class="row">
					<div class="column col-lg-12">
						<div class="properties-box">
							<div class="inner-container">
								<div class="title"><h3>Edit Profile</h3></div>
								<div class="profile-form">
									<style type="text/css">
									#fuck{
										display: none;
									}
								</style>
								<h2 id='fuck'></h2>
								<div class="edit-profile-photo" align="center" style="margin-bottom:10% !important;">
									<img src="../<?= $profile_picture;?>" alt="profile-photo"><br><br>
									<form class="edit-profile-pic-form">
										<div class="change-photo-btn">
											<div class="photoUpload">
												<span><i class="fa fa-upload"></i></span>
												<input type="hidden" id="old_pic" value="<?= $profile_picture; ?>">
												<input type="file" name="edit-pic-upload" class="upload" id="edit-pic-upload">
												<button style="display: none;" type="submit" class="theme-btn btn-style-one"></button>
											</div>
										</div>
									</form>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-12 col-sm-12">
										<div class="properties-box">
											<div class="inner-container">
												<div class="title"><h3>Change Password</h3></div>
												<div class="profile-form">
													<p class="alert alert-danger" id="update-password-error"></p>
													<form method="POST" action="" class="update-password-form">
														<div class="row">
															<div class="form-group col-lg-12">
																<label>Current Password</label>
																<input type="password" id="current_password" placeholder="Current Password" required>
															</div>
															<div class="form-group col-lg-12">
																<label>New Password</label>
																<input type="password" id="new_password" placeholder="New Password" required>
															</div>
															<div class="form-group col-lg-12">
																<label>Confirm New Password</label>
																<input type="password" id="confirm_password" placeholder="Confirm New Password" required>
															</div>
															<div class="form-group col-lg-12">
																<button type="submit" id="update-password-btn" class="theme-btn btn-style-one">Update Password</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>

									</div>
									<div class="col-lg-8 col-md-12 col-sm-12">
										<form method="POST" action="" id="edit-profile-form">
											<p class="alert alert-danger" id="edit-profile-error"></p>
											<div class="row">
												<input type="hidden" id="edit_profile_id" value="<?= $admin_id;?>">
												<div class="form-group col-lg-6 col-md-6 col-sm-12">
													<label>Full Name</label>
													<input type="text" id="edit_full_name" placeholder="Full Name" required value="<?= $admin_full_name;?>">
												</div>
												<div class="form-group col-lg-6 col-md-6 col-sm-12">
													<label>Email</label>
													<input type="email" id="edit_email" placeholder="Your Email Address" required value="<?= $email;?>">
												</div>
												<div class="form-group col-lg-6 col-md-6 col-sm-12">
													<label>Phone </label>
													<input type="text" id="edit_phone" placeholder="Phone" required value="<?= $phone; ?>">
												</div>
												<div class="form-group col-lg-6 col-md-6 col-sm-12">
													<label>Address</label>
													<input type="text" id="edit_address" placeholder="Your House Address" required value="<?= $address;?>">
												</div>
												<div class="form-group col-lg-12 col-md-12 col-sm-12">
													<label>Description</label>
													<textarea id="edit_description" placeholder="Personal Info"><?= $description; ?></textarea>
												</div>
												<div class="form-group text-right col-lg-12 col-md-12 col-sm-12">
													<button type="submit" class="theme-btn btn-style-one" id="update_profile_btn">Update Profile</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>