    <?php 
    include 'includes/sessions.php';
    $id = $_SESSION['admin_id'];
    ?>
    <?php if(!isset($_GET['hostel'])):?>
        <?php 
        echo "<script>window.location = 'my-hostels.php';</script>";
        ?>
        <?php else:?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="utf-8">
              <title>Hostel Finder | Dashboard</title>
              <link href="css/bootstrap.css" rel="stylesheet">
              <link href="css/style.css" rel="stylesheet">
              <link href="css/responsive.css" rel="stylesheet">
              <link rel="stylesheet" type="text/css" href="css/all.css">
              <link rel="stylesheet" type="text/css" href="../css/owl.carousel.min.css">
              <link rel="stylesheet" type="text/css" href="../css/owl.theme.default.min.css">
              <link rel="stylesheet" type="text/css" href="css/line-awesome.css">
              <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
              <link rel="stylesheet" type="text/css" href="../css/style.css">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
              <script src="js/jquery-3.4.1.min.js"></script> 
              <script src="js/popper.min.js"></script>
              <script src="js/bootstrap.min.js"></script>
              <script src="js/script.js"></script>
              <script type="text/javascript" src="js/sweetalert.min.js"></script>
              <script type="text/javascript" src="js/all.js"></script>
              <script type="text/javascript" src="../js/owl.carousel.min.js"></script>
              <script type="text/javascript" src="js/edit-hostel.js"></script>
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
                     </h1>
                     <?php 
                     $hostel = $_GET['hostel'];
                     $sql = $conn->query("SELECT * FROM hostel WHERE id = '$hostel'");
                     while ($row = mysqli_fetch_assoc($sql)) {
                        $hostel_name = $row['name'];
                        $hostel_address = $row['address'];
                        $hostel_status = $row['status'];
                        $hostel_room_type = $row['room_type'];
                        $hostel_description = $row['description'];
                        $facilities = explode(',', $row['features']);
                        $price_range = explode(',', $row['price_range']);
                        $image = $row['wall_pic'];
                    }
                    ?>
                    <div class="row">
                       <div class="column col-lg-12">
                        <div class="properties-box">
                         <div class="inner-container">
                          <div class="property-submit-form">
                           <form method="POST" action="" class="update_hostel_form">
                            <input type="hidden" id="hostel" value="<?= $hostel;?>">
                            <div class="form-fields">
                                <div class="title"><h3>Basic Information *</h3></div>
                                <div class="row">
                                 <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                  <label>Hostel Name</label>
                                  <input type="text" id="hostel_name" placeholder="Property Title" value="<?= $hostel_name;?>"  required>
                              </div>
                              <div class="form-group col-lg-3 col-md-6 col-sm-12">
                                  <label>Status</label>
                                  <select class="custom-select-box" id="hostel_status">
                                    <option selected value="<?= $hostel_status;?>"><?= $hostel_status;?></option>
                                    <option>Rooms Available</option>
                                    <option>No Vacant Rooms</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-6 col-sm-12">
                              <div class="range-slider-one clearfix">
                               <label>Address</label>
                               <input type="text" id="hostel_address" placeholder="Address" value="<?= $hostel_address;?>" required>
                           </div>
                       </div>
                       <div class="form-group col-lg-3 col-md-6 col-sm-12">
                          <div class="range-slider-one clearfix">
                           <label>Rooms Type</label>
                           <select class="custom-select-box" id="hostel_room_type">
                            <option selected value="<?= $hostel_room_type;?>"><?= $hostel_room_type;?></option>
                            <option>Self-Contained Rooms</option>
                            <option>Shared Facilities</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                  <div class="range-slider-one clearfix">
                   <label>Min Price</label>
                   <input type="number" id="hostel_min_price" value="<?= $price_range[0];?>" required>
               </div>
           </div>
           <div class="form-group col-lg-2 col-md-6 col-sm-12">
            <div class="range-slider-one clearfix">
                <label>Max Price</label>
                <input type="number" id="hostel_max_price" value="<?= $price_range[1];?>" required>
            </div>
        </div>
    </div>
    <div class="title"><h3>Detailed Information *</h3></div>
    <div class="row">
        <div class="form-group col-lg-12">
            <textarea id="hostel_detail" placeholder="Detailed Information" value="<?= $hostel_description;?>"><?= $hostel_description; ?></textarea>
        </div>
    </div>
    <div class="title"><h3>Features (optional)</h3></div>
    <div class="row">

        <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
            <div class="check-box">
                <input type="checkbox" <?=(in_array('Air Conditioning', $facilities)?'checked':'')?> name="air_conditioning" id="air_conditioning" value="Air Conditioning"> 
                <label for="air_conditioning">Air Conditioning</label>
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
            <div class="check-box">
                <input type="checkbox" <?=(in_array('Alarm System', $facilities)?'checked':'')?>  name="alarm_system" id="alarm_system" value="Alarm System"> 
                <label for="alarm_system">Alarm System</label>
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
            <div class="check-box">
                <input type="checkbox" <?=(in_array('CCTV Camera', $facilities)?'checked':'')?>  name="cctv_camera" id="cctv_camera" value="CCTV Camera"> 
                <label for="cctv_camera">CCTV Cameras</label>
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
            <div class="check-box">
                <input type="checkbox" <?=(in_array('One in a Room', $facilities)?'checked':'')?>  name="one_room" id="one_room" value="One in a Room"> 
                <label for="one_room">1 in a Room</label>
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
            <div class="check-box">
                <input type="checkbox" <?=(in_array('Two in a Room', $facilities)?'checked':'')?>  name="two_rooms" id="two_rooms" value="Two in a Room"> 
                <label for="two_rooms">2 in a Room</label>
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
            <div class="check-box">
                <input type="checkbox" <?=(in_array('Three in a Room', $facilities)?'checked':'')?>  name="three_rooms" id="three_rooms" value="Three in a Room"> 
                <label for="three_rooms">3 in a Room</label>
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
            <div class="check-box">
                <input type="checkbox" <?=(in_array('Car Parking', $facilities)?'checked':'')?>  name="car_packing" id="car_packing" value="Car Parking"> 
                <label for="car_packing">Car Parking</label>
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
            <div class="check-box">
                <input type="checkbox" <?=(in_array('Swimming Pool', $facilities)?'checked':'')?>  name="swimming_pool" id="swimming_pool" value="Swimming Pool"> 
                <label for="swimming_pool">Swimming Pool</label>
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
            <div class="check-box">
                <input type="checkbox" <?=(in_array('Laundry Room', $facilities)?'checked':'')?>  name="laundry_room" id="laundry_room" value="Laundry Room"> 
                <label for="laundry_room">Laundry Room</label>
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
            <div class="check-box">
                <input type="checkbox" <?=(in_array('Places to Seat', $facilities)?'checked':'')?>  name="seat_places" id="seat_places" value="Places to Seat"> 
                <label for="seat_places">Places to seat</label>
            </div>
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12 ">
            <div class="check-box">
                <input type="checkbox" <?=(in_array('Kitchen', $facilities)?'checked':'')?>  name="shipping-option" name="kitchen" id="kitchen" value="Kitchen"> 
                <label for="kitchen">Kitchen</label>
            </div>
        </div>
    </div>
</div>
<div class="hostel-img-section">
    <div class="title"><h3>Property Gallery</h3></div>
    <div class="row">
       <?php
       $fetch_pics = $conn->query("SELECT * FROM hostel_images WHERE hostel_id = '$hostel'");
       while ($row = mysqli_fetch_assoc($fetch_pics)) {
        $hostel_pic = $row['path'];
        $image = $row['path'];
                // echo $image;
        ?>
        <div class="col-lg-3" style="margin-bottom: 5%;">
            <span>
                <form method="POST" class="update-hostel-pic-form">
                    <input type="hidden" name="pic_id" value="<?= $pic_id;?>">
                    <input type="hidden" name="hostel_pic" value="<?= $hostel_pic;?>">
                    <button class="btn btn-sm theme-btn btn-style-one" onclick="return confirm('Are you sure you want to delete the image?')" name="delete_img_btn" style="position: absolute;padding:5px !important;"><span class="fa fa-trash"></span></button>
                </form>
            </span>
            <img src="../<?= $image; ?>" class='img-fluid'>
        </div>
    <?php }?>
    <div class="form-group col-lg-12">
        <div id="" class="dropzone-design">
            <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
        </div>
        <button type="button" class="theme-btn btn-style-one"><a href="dashboard.php"><< Go Home</a></button>
    </div>
</div>
</div>
<p align="right" style="margin-bottom: 5%;">
    <button class="theme-btn btn-style-one" type="button" id="display_image_section">Proceed to Images</button>
    <button class="theme-btn btn-style-one" type="submit" id="submit_hostel_form_btn">Submit Hostel</button>
</p>
</form>
</div>
<?php
if (isset($_POST['delete_img_btn'])) {
    $pic_id = $_POST['pic_id'];
    $hostel_pic = $_POST['hostel_pic'];
    $seg = explode('/', $hostel_pic);
    $file_path = $seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3].'/'.$seg[4].'/'.$seg[5].'/';
    $del_pic = $conn->query("DELETE FROM hostel_images WHERE id = '$pic_id'");
    if ($del_pic) {
        unlink($file_path.$seg[6]);
        echo "<script>window.location.reload();</script>";
    }
}
?>
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
<?php endif;?>