<?php 
include 'includes/sessions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'includes/links.php';?>
</head>

<body>

	<div class="page-wrapper">
		<?php include 'includes/main-header.php';?>
		<div class="container" style="margin-top: 2%;">
			<div class="dashboard-header clearfix">
				<div class="row">
					<div class="col-md-6 col-sm-12"><h4> <?= $admin_full_name;?> (Manager)</h4></div>
					<div class="col-md-6 col-sm-12">
						<div class="breadcrumb-nav">
							<ul>
								<li><a href="#">Index</a></li>
								<li>Dashboard </li>
								<li class="active">Dashboard </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'includes/profile-tabs.php'; ?>
		<div class="container">
			<?php 
			$error = '';
			$form_error = false;
			if (isset($_POST['complete_profile_btn'])) {
				$admin_id = $_POST['admin_id'];
				$admin_address = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['admin_address']));
				$admin_picture = $_FILES['admin_picture'];
				$admin_description = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['admin_description']));
				if (!empty($admin_address) && !empty($admin_picture) && !empty($admin_description)) {
					if (strlen($admin_description) < 20) {
						$error .= "Description is too short";
						$form_error = true;
					}else{
						if (isset($_FILES)){
						$file_name = $_FILES['admin_picture']['name'];
						$file_array = explode('.', $file_name);
						$extension = $file_array[1];
						$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
						if (!in_array($extension, $allowed_ext)) {
							$error .= "Upload only images";
							$form_error = true;
						}else{
							$http = $_SERVER['DOCUMENT_ROOT'];
							$img_source = $_FILES['admin_picture']['tmp_name'];
							$target_destination = '/manager/profile-img/'.$file_name;
							if (move_uploaded_file($img_source, $target_destination)) {
								$complete_query = $conn->query("UPDATE managers SET description = '$admin_description', profile_picture = '$target_destination', address = '$admin_address' WHERE id = '$admin_id'") or die(mysqli_error($conn));
								$error = "Thanks for registering. You are being redirected";
								$form_error = false;
							}
						}
					}
				}
				}else{
					$error .= 'Fill all fields before submitting';
				}
			}
			?>
			
			<div class="row">
				<?php if(empty($description)):?>
				<div class="column col-lg-6 col-md-12">
					<div class="properties-box">
						<div class="inner-container">
							<div class="title"><h3>Complete Profile</h3></div>
							<div class="profile-form">
								<form method="POST" action="" enctype="multipart/form-data">
									<input type="hidden" name="admin_id" value="<?= $admin_id; ?>">
									<div class="row">
										<?php if(isset($_POST['complete_profile_btn'])):?>
										<p class="alert alert-danger" id="complete-profile-error" align="center" role="alert">
											<?= $error;?>
										</p>
										<?php endif;?>
										<div class="form-group col-lg-12">
											<label>Address</label>
											<input type="text" id="admin_address" name="admin_address" placeholder="Address" value="<?= (isset($admin_address)?$admin_address:'');?>">
										</div>
										<div class="form-group col-lg-12">
											<label>Profile Picture</label>
											<input type="file" name="admin_picture" style="border:none;margin-left: -25px;" value="<?= (isset($admin_picture)?$admin_picture:''); ?>">
										</div>
										<div class="form-group col-lg-12">
											<label>Description</label>
											<textarea name="admin_description"><?= (isset($admin_description)?$admin_description:''); ?></textarea>
										</div>
										<div class="form-group col-lg-12">
											<button type="submit" name="complete_profile_btn" class="theme-btn btn-style-one">Update Password</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php endif;?>
			</div>
		</div>

		<?php include 'includes/copyright.php'; ?>
	</div>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
				var error = '<?= $error; ?>';
				var admin_address = $('#admin_address');
				if (error == 'Thanks for registering. You are being redirected') {
					alert('wow');
					$('#complete-profile-error').removeClass('alert-danger');
					$('#complete-profile-error').addClass('alert-success');
					redirect();
				}else{
					admin_address.focus();
					$('#complete-profile-error').addClass('alert-danger');
				}
				function redirect(){
					window.location = 'dashboard.php';
					alert('Profile has been successfully completed');
				}
				
			</script>
</body>
</html>