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

		<div class="dashboard">
			<div class="container-fluid">
				<div class="content-area">
					<div class="dashboard-content">
						<div class="dashboard-header clearfix">
							<div class="row">
								<div class="col-md-6 col-sm-12"><h4>Hi , <?= $first_name;?></h4></div>
								<div class="col-md-6 col-sm-12">
									<div class="breadcrumb-nav">
										<ul>
											<li><a href="#">Index</a></li>
											<li class="active">Dashboard</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

	                <div class="alert alert-success" role="alert">
	                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	                    <strong>Your Account</strong> YOUR ACCOUNT HAS BEEN OPENED!
	                </div>

	                <?php include 'includes/dashboard-stats.php';?>

	                <div class="row">
	                	<div class="column col-lg-6 col-md-12">
	                		<div class="comments-tab">
	                			<h3>Messages</h3>
	                			<div class="tabs-box">
	                				<ul class="tab-buttons">
	                					<li data-tab="#pending" class="tab-btn active-btn">Pending</li>
	                					<li data-tab="#approved" class="tab-btn">Replied</li>
	                				</ul>

	                				<div class="tabs-content" >
	                					<div class="tab active-tab" id="pending">
	                						<?php include 'includes/feedback.php';?>
	                					</div>
	                					<div class="tab" id="approved">
	                						<?php include 'includes/feedback-replied.php';?>
	                					</div>
	                				</div>
	                			</div>
	                		</div>
	                	</div>
	                </div>
	            </div>
	            <?php include 'includes/copyright.php';?>
	        </div>
	    </div>
	</div>
</div>
</body>
</html>