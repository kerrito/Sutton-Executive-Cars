<?php
include_once "config.php";

if (isset($_SESSION['location_credentail_id'])) {
    $location_credentail_id = $_SESSION['location_credentail_id'];

    $sql = "SELECT * FROM location_credential WHERE id=$location_credentail_id";

    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        $result = mysqli_fetch_assoc($res);
        if ($result['via_loc'] != "No via location" && !empty($result['via_loc'])) {
            $via_location = explode("%%", $result['via_loc']);
        }

        $q = "SELECT * FROM ride WHERE `loc_cren_id`=$location_credentail_id ";
        $ride_res = mysqli_query($con, $q);
        if (mysqli_num_rows($ride_res) > 0) {
            $ride_result = mysqli_fetch_assoc($ride_res);
            $car_id = $ride_result['car_id'];


            $sq = "SELECT * FROM car_details WHERE id=$car_id";
            $car_res = mysqli_query($con, $sq);
            if (mysqli_num_rows($car_res) > 0) {
                $car_result = mysqli_fetch_assoc($car_res);





?>


                <div class="booking-summary">
                    <h3>Booking Summary</h3>
                    <ul class="booking-info text-start pe-3 pb-1">
                        <li><span>Booking Reference: </span>
                            <div class="book-ref"><?=$location_credentail_id?></div>
                        </li>
                        <li><span>Journey Type:</span>
                            <div class="service_type"><?=$car_result['class']?></div>
                        </li>
                        <li><p class="mb-0">Selected Ride Car:</p>
                        
                            <div class="ride_car"><?=$car_result['name']?></div>
                        </li>
                    </ul>
                    <div class="journey-info">
                        <h4 class="service_type">Select Service Type</h4>
                    </div>
                    <ul class="service-info ms-3">
                        <li><span>From: </span>
                            <div class="startup_loc info-outer"><?=$result['pickup_loc']?></div>
                        </li>
                        <li><span>To: </span>
                            <div class="end_loc info-outer"><?=$result['drop_loc']?></div>
                        </li>
                        <li><span>Pickup Date: </span>
                            <div class="pick_date info-outer"><?=$result['pickup_date']?></div>
                        </li>
                        <li><span>Pickup Time: </span>
                            <div class="pick_time info-outer"><?=$result['pickup_time']?></div>
                        </li>
                        <li><span>Dropoff Date: </span>
                            <div class="drop_date info-outer"><?=$result['drop_date']?></div>
                        </li>
                        <li><span>Dropoff Time: </span>
                            <div class="drop_time info-outer"><?=$result['drop_time']?></div>
                        </li>
                    </ul>
                    <div class="fare-box">
                        <strong>Trip Estimation</strong>
                        <span class="trip_est">Not Available</span>
                        <div class="est-cost">
                            <strong>Cost Estimation</strong>
                            <div class="total-outer">
                                <span id="trip_cost"></span>
                                <span class="curr"></span>
                            </div>
                        </div>
                        <div class="ride_price_breakdown">
                            <button type="button" class="price_btn" data-toggle="modal" data-target="#ride_pricing_popup" id="ride_popup">Pricing Breakdown <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                            <!-- Modal Popup Start -->
                            <div id="ride_pricing_popup" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal Popup Content Start-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Ride Pricing Breakdown</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="order-summary"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <h4>Thank you for using Prime Cab</h4>
                                        </div>
                                    </div>
                                    <!-- Modal Popup Content End-->
                                </div>
                            </div>
                            <!-- Modal Popup End -->
                        </div>
                    </div>
                </div>
    <?php
            }
        }
    }
} else {
    echo 1;
}


?>


