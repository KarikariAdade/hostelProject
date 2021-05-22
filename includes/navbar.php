

	<!-- Header Area -->
	<header class="main_header_area" id="header"> 
		<div class="container">
			<div class="header_menu"> 
				<nav class="navbar navbar-expand-lg">
					<a class="navbar-brand" href="home"><img src="img/hoteldooropen.jpg" style="width: 120px; height: 80px;"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar_supported"  aria-expanded="false" aria-label="Toggle navigation"> 
						<i class="fa fa-bars" aria-hidden="true"></i>
					</button>

					<div class="collapse navbar-collapse navbar_supported">
						<ul class="navbar-nav"> 
							<li><a class="nav-link" href="home">Home</a></li> 
							<li><a class="nav-link" href="about">About</a></li>  
							<li><a class="nav-link" href="hostels">Hostels</a></li>
							<?php if (isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])):?>
							<li><a href="manager/dashboard.php" class="nav-link">Dashboard</a></li>
						<?php endif;?>
							  <li class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Account</a>
                                <ul class="dropdown-menu">
                                	<?php if (isset($_SESSION['user_id']) || isset($_SESSION['admin_id'])):?>
                                    <li><a href="logout.php">Log Out</a></li> 
                                    <?php else:?>
                                    	<li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li> 
                                    <?php endif;?>
                                    <li><a href="#" data-toggle="modal" data-target="#signUpModal">Sign Up</a></li>   
                                </ul>
                            </li> 
					</ul>  
				</div>
			</nav>  
		</div>
	</div>
</header>
<?php include 'login-modal.php'; ?>
<?php include 'sign-up-modal.php'; ?>