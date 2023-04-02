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
                    <ul class="booking-info">
                        <li><span>Booking Reference: </span><?=$location_credentail_id?></li>
                        <li><span>Journey Type: </span>One Way</li>
                        <li><p class="mb-0">Distance & Time: </p><span id="kilo_meter">2,522</span> km & 23 hours 7 mins</li>
                        <li><span>One Way Fare: </span>Euro <span class="price"><?=$car_result['price']?></span></li>
                    </ul>
                    <div class="journey-info">
                        <h4>One Way Journey</h4>

                    </div>
                    <ul class="service-info ms-2">
                        <li><span>From: </span><?=$result['pickup_loc']?></li>
                        <li><span>To: </span><?=$result['drop_loc']?></li>
                        <li><span>Pickup Date: </span><?=$result['pickup_date']?></li>
                        <li><span>Pickup Time: </span><?=$result['pickup_time']?></li>
                        <li><span>Fare Details: </span>Basic Amount: Euro <span id="amount">450.00</span></li>
                    </ul>
                    <div class="fare-box ms-2">
                        <strong>Total Fare: <span>Euro <span id="total_amount">450.00</span></span></strong>
                        <span>( inclusive of All Taxes )</span>
                    </div>
                </div>
                <script>
                    function get_amount() {
		console.log("ok function")
		var kilo_meter = document.getElementById("kilo_meter").innerHTML
		console.log(kilo_meter)
		var price = document.getElementById("price").innerHTML
		console.log(price)
		var total_amount =kilo_meter * price
		console.log(total_amount)
		document.getElementById("total_amount").innerHTML = total_amount;
	}

    
	// Declaring Event listener when window load
	window.addEventListener("load", (event) => {


// Get total amount function
get_amount()

})
    // End Event listener
                </script>
<?php
            }
        }
    }
} else {
    echo 1;
}


?>
