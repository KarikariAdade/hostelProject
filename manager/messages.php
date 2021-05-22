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
	                    	<div class="messages-box">
	                    		<div class="title"><h3>Messages List</h3></div>
	                    		<div class="inner-box">
	                    			<?php
	                    			$sql = $conn->query("SELECT * FROM messages WHERE manager_id = '$admin_id' ORDER BY id DESC");
	                    			if (mysqli_num_rows($sql) > 0) {
	                    				while ($row = mysqli_fetch_assoc($sql)) {
	                    					$date = $row['date'];
	                    					$timestamp = strtotime($date);
	                    					$day = date('l M d, Y', $timestamp);
	                    					$time = date('H:ia', $timestamp);
	                    			?>
	                                <article class="message-box">
	                                    <div class="thumb-box">
	                                        <!-- <figure class="thumb"><img src="" alt=""></figure> -->
	                                        <?php if($row['replied'] == 0): ?>
	                                        <a href="reply.php?id=<?= urlencode($row['id']);?>&manager=<?= urlencode($row['manager_id']);?>" class="reply-btn">Reply Now</a>
	                                        <p>
	                                        	<form method="POST">
	                                        		<input type="hidden" name="message_id" value="<?= $row['id']; ?>">
	                                        		<button type="submit" name="del_message" style="padding:0px 5px;margin-top: 4%;background-color: transparent;"><span class="fa fa-trash" style="color:#6a7beb;" onclick="return confirm('Are you sure you want to delete this message?')"></span></button>
	                                        	</form>
	                                        </p>
	                                        <?php
	                                        if (isset($_POST['del_message'])) {
	                                        	$message_id = $_POST['message_id'];
	                                        	$del = $conn->query("DELETE FROM messages WHERE id = '$message_id'");
	                                        	if ($del) {
	                                        		echo "<script>window.location.reload();</script>";
	                                        	}
	                                        }
	                                        ?>
	                                    <?php endif;?>
	                                    </div>
	                                    <div class="content-box">
	                                        <div class="name"><?= $row['full_name']; ?></div>
	                                        <span class="date"><i class="la la-calendar"></i> <?= $time.' on '.$day?></span>
	                                        <div class="text"><?= $row['message'];?></div>
	                                    </div>
	                                </article>
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

</body>
</html>