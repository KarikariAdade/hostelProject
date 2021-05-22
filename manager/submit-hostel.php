    <?php 
    include 'includes/sessions.php';
    $id = $_SESSION['admin_id'];
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
    								<div class="col-md-6 col-sm-12"><h4>Submit Property</h4></div>
    								<div class="col-md-6 col-sm-12">
    									<div class="breadcrumb-nav">
    										<ul>
    											<li><a href="../index-2.html">Index</a></li>
    											<li><a href="dashboard.html">Dashboard</a></li>
    											<li class="active">Submit Hostel</li>
    										</ul>
    									</div>
    								</div>
    							</div>
    						</div>
                            <h1>
                                <?php
        //                         $fetch = $conn->query("SELECT * FROM hostel") or die(mysqli_error($conn));
        // while ($row = mysqli_fetch_assoc($fetch)) {
        //     $price = $row['price_range'];
        //     $features = $row['features'];
        //     $seg = explode(',',$features);
        //     $set = explode(',', $price);
        //     foreach ($seg as $key) {
        //         echo $key.' ';
        //     }
        //     foreach ($set as $key) {
        //         echo money($key);
        //     }
        // }
                                ?>
                            </h1>
                            <div class="row">
                             <div class="column col-lg-12">
                                <div class="properties-box">
                                   <div class="inner-container">
                                      <div class="property-submit-form">
                                         <form method="POST" action="" class="submit_hostel_form dropzone">
                                            <div class="form-fields">
                                                <div class="title"><h3>Basic Information *</h3></div>
                                                <div class="row">
                                                   <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                                      <label>Hostel Name</label>
                                                      <input type="text" id="hostel_name" placeholder="Property Title" required>
                                                  </div>
                                                  <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                                      <label>Status</label>
                                                      <select class="custom-select-box" id="hostel_status">
                                                         <option>Rooms Available</option>
                                                         <option>No Vacant Rooms</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                                  <div class="range-slider-one clearfix">
                                                     <label>Address</label>
                                                     <input type="text" id="hostel_address" placeholder="Address" required>
                                                 </div>
                                             </div>
                                             <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                              <div class="range-slider-one clearfix">
                                                 <label>Rooms Type</label>
                                                 <select class="custom-select-box" id="hostel_room_type">
                                                    <option>Self-Contained Rooms</option>
                                                    <option>Shared Facilities</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-2 col-md-6 col-sm-12">
                                          <div class="range-slider-one clearfix">
                                             <label>Min Price</label>
                                             <input type="number" id="hostel_min_price" required>
                                         </div>
                                     </div>
                                     <div class="form-group col-lg-2 col-md-6 col-sm-12">
                                        <div class="range-slider-one clearfix">
                                            <label>Max Price</label>
                                            <input type="number" id="hostel_max_price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="title"><h3>Detailed Information *</h3></div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <textarea id="hostel_detail" placeholder="Detailed Information"></textarea>
                                    </div>
                                </div>
                                <div class="title"><h3>Features (optional)</h3></div>
                                <div class="row">

                                    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="check-box">
                                            <input type="checkbox" name="air_conditioning" id="air_conditioning" value="Air Conditioning"> 
                                            <label for="air_conditioning">Air Conditioning</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="check-box">
                                            <input type="checkbox" name="alarm_system" id="alarm_system" value="Alarm System"> 
                                            <label for="alarm_system">Alarm System</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="check-box">
                                            <input type="checkbox" name="cctv_camera" id="cctv_camera" value="CCTV Camera"> 
                                            <label for="cctv_camera">CCTV Cameras</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="check-box">
                                            <input type="checkbox" name="one_room" id="one_room" value="One in a Room"> 
                                            <label for="one_room">1 in a Room</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="check-box">
                                            <input type="checkbox" name="two_rooms" id="two_rooms" value="Two in a Room"> 
                                            <label for="two_rooms">2 in a Room</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="check-box">
                                            <input type="checkbox" name="three_rooms" id="three_rooms" value="Three in a Room"> 
                                            <label for="three_rooms">3 in a Room</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="check-box">
                                            <input type="checkbox" name="car_packing" id="car_packing" value="Car Parking"> 
                                            <label for="car_packing">Car Parking</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="check-box">
                                            <input type="checkbox" name="swimming_pool" id="swimming_pool" value="Swimming Pool"> 
                                            <label for="swimming_pool">Swimming Pool</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="check-box">
                                            <input type="checkbox" name="laundry_room" id="laundry_room" value="Laundry Room"> 
                                            <label for="laundry_room">Laundry Room</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="check-box">
                                            <input type="checkbox" name="seat_places" id="seat_places" value="Places to Seat"> 
                                            <label for="seat_places">Places to seat</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
                                        <div class="check-box">
                                            <input type="checkbox" name="shipping-option" name="kitchen" id="kitchen" value="Kitchen"> 
                                            <label for="kitchen">Kitchen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hostel-img-section">
                                <div class="title"><h3>Property Gallery</h3></div>
                                <div class="row">
                                   <div class="form-group col-lg-12">
                                    <div id="" class="dropzone-design">
                                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                                    </div>
                                    <button type="button" class="theme-btn btn-style-one"><a href="dashboard.php"><< Go Home</a></button>
                                </div>
                            </div>
                        </div>
                        <p align="right" style="margin-bottom: 5%;">
                            <button class="theme-btn btn-style-one" type="button" id="display_image_section">Proceed to Image Upload</button>
                            <button class="theme-btn btn-style-one" type="submit" id="submit_hostel_form_btn">Submit Hostel</button>
                        </p>
                    </form>
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