<?php
include_once "config.php";
if(isset($_SESSION['location_credentail_id'])){
$location_credentail_id = $_SESSION['location_credentail_id'];

$sql = "SELECT * FROM location_credential WHERE id=$location_credentail_id";

$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {
    $result = mysqli_fetch_assoc($res);
    if ($result['via_loc'] != "No via location" && !empty($result['via_loc'])) {
        $via_location = explode("%%", $result['via_loc']);
    }


?>
    <div class="booking-summary">
        <h3>Booking Summary</h3>

        <div class="journey-info mt-5">
            <h4 class="service_type mt-3">Select Service Type</h4>
        </div>
        <ul class="service-info">
            <li><span>From: </span>
                <div class="startup_loc info-outer"><?= $result['pickup_loc'] ?></div>
            </li>
            <li><span>To: </span>
                <div class="end_loc info-outer"><?= $result['drop_loc'] ?></div>
            </li>
            <li><span>Pickup Date: </span>
                <div class="pick_date info-outer"><?= $result['pickup_date'] ?></div>
            </li>
            <li><span>Pickup Time: </span>
                <div class="pick_time info-outer"><?= $result['pickup_time'] ?></div>
            </li>
            <!-- <li><span>Dropoff Date: </span>
                <div class="drop_date info-outer"></div>
            </li>
            <li><span>Dropoff Time: </span>
                <div class="drop_time info-outer"></div>
            </li> -->
            <?php
            if ($result['via_loc'] != "No via location" && !empty($result['via_loc'])) {
                foreach ($via_location as $value) {
            ?>
                    <li><span>Via Locations: </span>
                        <div class="drop_time info-outer"><?= $value ?></div>
                    </li>
                <?php
                }
            } else {
                ?>
                <li><span>Via Locations: </span>
                    <div class="drop_time info-outer">No via location</div>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
<?php

}
}else{
   ?>
   <div class="booking-summary">
							<h3>Booking Summary</h3>

							<div class="journey-info mt-5">
								<h4 class="service_type mt-3">Select Service Type</h4>
							</div>
							<ul class="service-info">
								<li><span>From: </span>
									<div class="startup_loc info-outer">Enter Startup Location</div>
								</li>
								<li><span>To: </span>
									<div class="end_loc info-outer">Enter Destination</div>
								</li>
								<li><span>Pickup Date: </span>
									<div class="pick_date info-outer">Enter Pickup Date</div>
								</li>
								<li><span>Pickup Time: </span>
									<div class="pick_time info-outer">Enter Pickup Time</div>
								</li>
								<!-- <li><span>Dropoff Date: </span>
									<div class="drop_date info-outer">Enter Dropoff Date</div>
								</li>
								<li><span>Dropoff Time: </span>
									<div class="drop_time info-outer">Enter Dropoff Time</div>
								</li> -->
								<li><span>Via Locations: </span>
									<div class="drop_time info-outer">Enter Via locations</div>
								</li>
							</ul>
						</div>
   
   <?php 
}


?>