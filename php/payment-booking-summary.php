<?php
include_once "config.php";

// Checking if session exist or not
if (isset($_SESSION['location_credentail_id'])) {

    // fetching location credential id
    $location_credentail_id = $_SESSION['location_credentail_id'];

    // fecthing data from location_credential table
    $sql = "SELECT * FROM location_credential WHERE id=$location_credentail_id";

    // storing fetched data into variable
    $res = mysqli_query($con, $sql);

    // Checking if data exist or not
    if (mysqli_num_rows($res) > 0) {

        // Converting fetched data into associated array form
        $result = mysqli_fetch_assoc($res);

        // checking if via location exits or not
        if ($result['via_loc'] != "No via location" && !empty($result['via_loc'])) {

            // converting via locations from string to array
            $via_location = explode("%%", $result['via_loc']);
        }

        // fecthing data from ride table by location credentials id
        $q = "SELECT * FROM ride WHERE `loc_cren_id`=$location_credentail_id ";

        // storing fetched data into variable
        $ride_res = mysqli_query($con, $q);

        // Checking if data exist or not
        if (mysqli_num_rows($ride_res) > 0) {

            // Converting fetched data into associated array form
            $ride_result = mysqli_fetch_assoc($ride_res);

            // fetching car id
            $car_id = $ride_result['car_id'];

            // fecthing data from car details table by car id
            $sq = "SELECT * FROM car_details WHERE id=$car_id";

            // storing fetched data into variable
            $car_res = mysqli_query($con, $sq);

            // Checking if data exist or not
            if (mysqli_num_rows($car_res) > 0) {

                // Converting fetched data into associated array form
                $car_result = mysqli_fetch_assoc($car_res);





?>


                <div class="booking-summary">
                    <h3>Booking Summary</h3>
                    <ul class="booking-info">
                        <li><span>Booking Reference: </span><?= $location_credentail_id ?></li>
                        <li><span>Journey Type: </span>One Way</li>
                        <li>
                            <p class="mb-0">Distance & Time: </p><span id="kilo_meter"><?=$ride_result['ride_distance']?></span> Miles
                        </li>
                        <li><span>One Way Fare: </span>&pound; <span id="price"><?= $car_result['price'] ?></span></li>
                    </ul>
                    <div class="journey-info">
                        <h4>One Way Journey</h4>

                    </div>
                    <ul class="service-info ms-2">
                        <li><span>From: </span><?= $result['pickup_loc'] ?></li>
                        <li><span>To: </span><?= $result['drop_loc'] ?></li>
                        <li><span>Pickup Date: </span><?= $result['pickup_date'] ?></li>
                        <li><span>Pickup Time: </span><?= $result['pickup_time'] ?></li>
                        <li><span>Fare Details: </span>Basic Amount: &pound; <span id="amount"><?=$car_result['price']*$ride_result['ride_distance']?></span></li>
                    </ul>
                    <div class="fare-box ms-2">
                        <strong>Total Fare: <span>&pound; <span id="total_amount"><?=$car_result['price']*$ride_result['ride_distance']?></span></span></strong>
                        <span>( inclusive of All Taxes )</span>
                    </div>
                </div>

<?php
            }
        }
    }
} else {
    // if seesion doesn't exist then return 1
    echo 1;
}


?>