<?php
include_once "config.php";
// Fetching car id
$car_id = $_POST['car_id'];

// checking if session exist or not
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
        // checking if via location exits or not
        if ($result['via_latitude'] != "No via url" && !empty($result['via_latitude'])) {

            // converting via locations from string to array
            $via_latitude = explode("%%", $result['via_latitude']);
        }
?>

        <div class="tab-pane active" id="point">
            <form class="booking-frm" method="POST" id="ride-bform" action="php/update-loc-credentials.php">
                <div class="col-md-12">
                    <strong>Picking Up</strong>
                    <div class="field-holder">
                        <span class="fas fa-map-marker-alt"></span>
                        <input id="point_start_loc" onfocus="initMap('point_start_loc','','no')" type="search" name="pickup_loc" value="<?= $result['pickup_loc'] ?>" placeholder="Pickup Location" pattern="[A-za-z0-9,./()''-& ]{3,100}" title="Pickup Location must contain 3 to 100 character no special character allowed other than , . / () '' -&" required>
                        <input type="hidden" id="point_start_loc_lat" value="<?= $result['pickup_latitude'] ?>" name="pickup_lat">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-holder">
                        <label for="time" class="ms-3 fs-5 fw-light">Select Date:</label>


                        <input type="date" name="pickup_date" onchange="date_restrict(this.value)" placeholder="Select your Date" value="<?= $result['pickup_date'] ?>" id="datePickerId" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-holder">
                        <label for="text" class="ms-3 fs-5 fw-light">Select Timings:</label>


                        <input type="time" name="pickup_time" placeholder="Select Timings" value="<?= $result['pickup_time'] ?>" id="pickup_time" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <strong>Dropoff</strong>
                    <div class="field-holder">
                        <span class="fas fa-map-marker-alt"></span>
                        <input type="search" id="point_end_loc" onfocus="initMap('point_end_loc','','no')" name="dropoff_loc" value="<?= $result['drop_loc'] ?>" placeholder="Dropoff Location" pattern="[A-za-z0-9,./()''-& ]{3,100}" title="Drop Location must contain 3 to 100 character no special character allowed other than , . / () '' -&" required>
                        <input type="hidden" id="point_end_loc_lat" name="drop_lat" value="<?= $result['drop_latitude'] ?>">
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="field-holder">
                        <label for="time" class="ms-3 fs-5 fw-light">Select Date:</label>

                        <input type="date" name="dropoff_date" id="datePicker_Id" value="" placeholder="Select your Date" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-holder">
                        <label for="time" class="ms-3 fs-5 fw-light">Select Timings:</label>

                        <input type="time" name="dropoff_time" placeholder="Select Timings" value="" id="dropoff_time" required>
                    </div>
                </div> -->
                <input type="hidden" class="my-3" name="total_distance_of_trip" id="total_distance_of_trip">
                <div class="col-md-12">

                    <!-- <div class="field-box" id="fields">
                    <span class="fas fa-search"></span>
                    <input type="search" name="trip_drop_loc" placeholder="Add Via Locations">
                </div> -->
                    <h4 class="mb-4">Via Destinations:</h4>
                    <!-- <div class="text-center mb-4" id="fields"> -->
                    <!-- <button type="button" class="btn-color fs-5" onclick="add()">Multiple
                        Via</button> -->
                </div>
                <div class="com-md-12" id="via_locations_fields">
                    <?php
                    if ($result['via_loc'] != "No via location" && !empty($result['via_loc'])) {
                        $x = 0;
                        foreach ($via_location as $value) {
                    ?>
                            <div id="input<?= $x ?>">
                                <input type="search" class="mt-3 via_location_childs" id="via<?= $x ?>" onfocus="initMap('via<?= $x ?>','','no')" name="via_location[]" value="<?= $value ?>" placeholder="Locations" pattern="[A-za-z0-9,./()''-& ]{3,100}" title="Via Location must contain 3 to 100 character no special character allowed other than , . / () '' -&" required>
                                <input type="hidden" id="via<?= $x ?>_lat" name="via_lat[]" value="<?= $via_latitude[$x] ?>">
                                <button type="button" onclick='remove("input<?= $x ?>","","booking-form")' class="remore"><i class="fas fa-times"></i></button>
                            </div>
                    <?php
                            $x++;
                        }
                    }
                    ?>
                </div>

                <div class="col-md-12">
                    <div class="field-holder">
                        <label for="pay_offline">
                            <input type="radio" name="payment_type" value="Pay offline" id="pay_offline" checked value="Offline" required>Pay Offline
                        </label>
                        <label for="pay_online">
                            <input type="radio" name="payment_type" value="Pay pal" id="pay_online" value="PayPal" required>PayPal
                        </label>
                    </div>
                </div>
                <?php
                $q = "SELECT * FROM car_details WHERE id=$car_id";
                $car_res = mysqli_query($con, $q);
                if (mysqli_num_rows($car_res) > 0) {
                    $car_result = mysqli_fetch_assoc($car_res);
                ?>

                    <div class="col-md-12">
                        <div class="field-holder">
                            <div class="car-list">
                                <select name="car_id" onchange="point_to_point(this.value)" id="car_list" class="selectpicker">
                                    <option value="<?= $car_id ?>" data-hrrate="30" data-dayrate="150">
                                        <?= $car_result['name'] ?></option>
                                    <?php
                                    $all_cars = "SELECT * FROM car_details WHERE id!=$car_id";
                                    $all_car_res = mysqli_query($con, $all_cars);
                                    if (mysqli_num_rows($all_car_res) > 0) {
                                        foreach($all_car_res as $values){
                                            ?>
                                            <option value="<?= $values['id'] ?>" data-hrrate="30" data-dayrate="150">
                                        <?= $values['name'] ?></option>
                                            <?php
                                        }
                                    }


                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="field-holder">
                            <!-- <div class="select-list"> -->
                                <input type="text" name="service_rate" id="rate_list" class="" value="&pound; <?= $car_result['price'] ?> per mile" readonly>
                                <!-- <select name="service_rate" id="rate_list" class="selectpicker">
                                    <option value="">&pound;   per mile</option>
                                </select> -->
                            <!-- </div> -->
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- <option value="">Select Car</option>
                            <option value="Nissan Vela" data-hrrate="30" data-dayrate="150">
                                MERCEDES E CLASS ESTATE</option>
                            <option value="BMW Sedan" data-hrrate="40" data-dayrate="190">
                                MERCEDES E CLASS SALOON</option>
                            <option value="Mercedes SUV" data-hrrate="65" data-dayrate="200">
                                MERCEDES V CLASS</option>
                            <option value="Renault Sedan" data-hrrate="20" data-dayrate="100">
                                MERCEDES V CLASS LARGE</option> -->


                <div class="mt-3">
                    <a style="text-decoration: none;"><button type="button" onclick="initMap('','nothing beats real experience','yes')" class="book-btn" style="height:50px;">Next Step
                            <i class="fa fa-arrow-circle-right"></i></button></a>
                </div>
            </form>
        </div>


<?php
    }
} else {
    // if session is not exist then return 1
    echo 1;
}






?>