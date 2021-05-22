 <?php 
 include 'includes/sessions.php';
 include '../includes/time-function.php';
 if (!isset($_GET['id'])) {
 	echo "<script>window.location = 'messages.php';</script>";
 }
 $message_id = $_GET['id'];
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
 						<?php
 						$sql = $conn->query("SELECT * FROM messages WHERE id = '$message_id'") or die(mysqli_error($conn));
 						while ($row = mysqli_fetch_assoc($sql)) {
 							$full_name = $row['full_name'];
 							$email = $row['email'];
 						}
 						?>
 						<div class="row">
 							<div class="column col-lg-12">
 								<div class="messages-box">
 									<form class="row property-submit-form" id="message-reply" action="includes/reply-message.php" method="POST">
 										<div class="form-group col-lg-6 col-md-6 col-sm-12">
 											<div class="range-slider-one clearfix">
 												<label>Full Name</label>
 												<input type="hidden" id="message_id" value="<?= $message_id;?>">
 												<input type="text" id="full_name" placeholder="Address" value="<?= $full_name; ?>" required>
 											</div>
 										</div>
 										<div class="form-group col-lg-6 col-md-6 col-sm-12">
 											<div class="range-slider-one clearfix">
 												<label>Email Address</label>
 												<input type="text" id="email" placeholder="Address" value="<?= $email; ?>" required>
 											</div>
 										</div>
                                    <div class="form-group col-lg-12">
                                        <textarea id="message" placeholder="Type your Message"></textarea>
                                </div>
                                <p align="center"><button type="submit" id="submit_message" class="theme-btn btn-style-one">Send Reply</button></p>
 									</form>
 									
 								</div>

 							</div>
 						</div>
 						<?php include 'includes/copyright.php';?>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
 	<script type="text/javascript">
 		$(document).ready(function (){
 			$('#message-reply').submit(function(e){
 				e.preventDefault();
 				var message_id = $('#message_id').val();
 				var full_name = $('#full_name').val();
 				var email = $('#email').val();
 				var message = $('#message').val();
 				var submit_message = $('#submit_message').val();
 				$.ajax({
 					url: 'includes/reply-message.php',
 					method: 'POST',
 					data:{
 						message_id: message_id,
 						full_name: full_name,
 						email: email,
 						message: message,
 						submit_message: submit_message
 					},
 					success:function (data){
 						if (data == "Reply successfully sent") {
 							swal('Message Sent!', data, 'success')
 						}else{
 							swal('Error', data, 'error');
 						}
 					},
 					error:function(){
 						swal('error', 'there is an error', 'error');
 					}
 				})
 			})
 		})
 	</script>
</body>
</html>