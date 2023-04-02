<?php
include_once "config.php";
$car_id = $_POST['car_id'];

if (isset($_SESSION['location_credentail_id'])) {
    $location_credentail_id = $_SESSION['location_credentail_id'];

    $sql = "SELECT * FROM location_credential WHERE id=$location_credentail_id";

    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        $result = mysqli_fetch_assoc($res);
        if ($result['via_loc'] != "No via location" && !empty($result['via_loc'])) {
            $via_location = explode("%%", $result['via_loc']);
        }
?>

        <div class="tab-pane active" id="point">
            <form class="booking-frm" method="POST" id="ride-bform" action="update-loc-credentials.php?car-id=<?=$car_id?> ">
                <div class="col-md-12">
                    <strong>Picking Up</strong>
                    <div class="field-holder">
                        <span class="fas fa-map-marker-alt"></span>
                        <input id="point_start_loc" type="search" name="pickup_loc"  value="<?= $result['pickup_loc'] ?>" placeholder="Pickup Location" pattern="[A-za-z ]{3,16}" title="Pickup Location must contain 3 to 16 character no special character allowed" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-holder">
                        <label for="time" class="ms-3 fs-5 fw-light">Select Date:</label>


                        <input type="date" name="pickup_date" placeholder="Select your Date" value="<?= $result['pickup_date'] ?>" id="datePickerId"   required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-holder">
                        <label for="text" class="ms-3 fs-5 fw-light">Select Timings:</label>


                        <input type="time" name="pickup_time" placeholder="Select Timings" value="<?= $result['pickup_time'] ?>" id="pickup_time"  required>
                    </div>
                </div>
                <div class="col-md-12">
                    <strong>Dropoff</strong>
                    <div class="field-holder">
                        <span class="fas fa-map-marker-alt"></span>
                        <input type="search" id="point_end_loc" name="dropoff_loc" value="<?= $result['drop_loc'] ?>" placeholder="Dropoff Location" pattern="[A-za-z ]{3,16}" title="Drop Location must contain 3 to 16 character no special character allowed" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-holder">
                        <label for="time" class="ms-3 fs-5 fw-light">Select Date:</label>

                        <input type="date" name="dropoff_date" id="datePicker_Id" value="<?= $result['drop_date'] ?>" placeholder="Select your Date" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-holder">
                        <label for="time" class="ms-3 fs-5 fw-light">Select Timings:</label>

                        <input type="time" name="dropoff_time" placeholder="Select Timings" value="<?= $result['drop_time'] ?>" id="dropoff_time" required>
                    </div>
                </div>
                <div class="col-md-12">

                    <!-- <div class="field-box" id="fields">
                    <span class="fas fa-search"></span>
                    <input type="search" name="trip_drop_loc" placeholder="Add Via Locations">
                </div> -->
                    <h4 class="mb-4">Via Destinations:</h4>
                    <!-- <div class="text-center mb-4" id="fields">
                    <button type="button" class="btn-color fs-5" onclick="add()">Multiple
                        Via</button> -->
                </div>
                <?php
                if ($result['via_loc'] != "No via location" && !empty($result['via_loc'])) {
                    $x = 1001;
                    foreach ($via_location as $value) {
                ?>
                        <div id="input<?= $x ?>">
                            <input type="search" class="mt-3" name="via_location[]" value="<?= $value ?>" placeholder="Locations" pattern="[A-za-z ]{3,16}" title="Via Location must contain 3 to 16 character no special character allowed" required>
                            <button type="button" onclick='remove("input<?= $x ?>")' class="remore"><i class="fas fa-times"></i></button>
                        </div>
                <?php
                        $x++;
                    }
                }
                ?>

                <div class="col-md-12">
                    <div class="field-holder">
                        <label for="pay_offline">
                            <input type="radio" name="payment_type" id="pay_offline" checked value="Offline" required>Pay Offline
                        </label>
                        <label for="pay_online">
                            <input type="radio" name="payment_type" id="pay_online" value="PayPal" required>PayPal
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="field-holder">
                        <div class="car-list">
                            <select name="car_name" id="car_list" class="selectpicker">
                                <?php
                                $q = "SELECT * FROM car_details WHERE id=$car_id";
                                $car_res = mysqli_query($con, $q);
                                if (mysqli_num_rows($car_res) > 0) {
                                    $car_result = mysqli_fetch_assoc($car_res);
                                ?>
                                    <option value="<?= $car_result['name'] ?>" data-hrrate="30" data-dayrate="150">
                                        <?= $car_result['name'] ?></option>
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
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="field-holder">
                        <div class="select-list">
                            <select name="service_rate" id="rate_list" class="selectpicker">
                                <option value="default">Select Rate</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <a style="text-decoration: none;"><button type="submit" class="book-btn" style="height:50px;">Next Step
                            <i class="fa fa-arrow-circle-right"></i></button></a>
                </div>
            </form>
        </div>


<?php
    }
}else {
    echo 1;
}






?>