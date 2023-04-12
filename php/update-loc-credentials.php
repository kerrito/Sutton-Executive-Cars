<?php
include_once "config.php";

$location_credentail_id = $_SESSION['location_credentail_id'];


//Fetching data from post method  
$pickup_loc = mysqli_real_escape_string($con, $_POST['pickup_loc']);
$pickup_time = mysqli_real_escape_string($con, $_POST['pickup_time']);
$pickup_date = mysqli_real_escape_string($con, $_POST['pickup_date']);
$drop_location = mysqli_real_escape_string($con, $_POST['dropoff_loc']);
$drop_time = mysqli_real_escape_string($con, $_POST['dropoff_time']);
$drop_date = mysqli_real_escape_string($con, $_POST['dropoff_date']);
$paument_type = mysqli_real_escape_string($con, $_POST['payment_type']);
$pickup_latitude = $_POST['pickup_lat'];
$drop_latitude = $_POST['drop_lat'];
$car_id = $_GET['car-id'];
$payment=$_POST['service_rate'];

// Checking if via location set or not set 
if (isset($_POST['via_location'])) {
    // fetching via location array
    $via_loc = $_POST['via_location'];

    // Converting via locations into string form from array
    $via_location = mysqli_real_escape_string($con, implode("%%", $via_loc));
} else {
    // inserting new value if via locatons not set
    $via_location = "No via location";
}

// checking if exist
if (isset($_POST['via_lat'])) {
    // storing into variable
    $via_lat = $_POST['via_lat'];
    // conerting into array
    $via_latitude = mysqli_real_escape_string($con, implode("%%", $via_lat));
} else {
    // Assigning value
    $via_latitude = "No via location";
}


// Query for updating location credentials from point to point form 
$sql = "UPDATE location_credential SET `pickup_loc`='$pickup_loc',`pickup_latitude`='$pickup_latitude',`pickup_time`='$pickup_time',`pickup_date`='$pickup_date',`drop_loc`='$drop_location',`drop_latitude`='$drop_latitude',`drop_time`='$drop_time',`drop_date`='$drop_date',`via_loc`='$via_location',`via_latitude`='$via_latitude',`payment`='$payment' WHERE id=$location_credentail_id";

// Ckecking if query successfully excuted
if (mysqli_query($con, $sql)) {

    // inserting into ride table 
    $q = "INSERT INTO ride SET `car_id`= $car_id, `pickup_date`='$pickup_date',drop_date='$drop_date',`loc_cren_id`=$location_credentail_id,`payment_method`='$paument_type'";

    // ckecking if query successfully excuted
    if (mysqli_query($con, $q)) {

        if(isset($_SESSION['login']) && $_SESSION['login']=="true"){
            if($paument_type=="Pay offline"){
              
                // Redirecting to mailer page
                echo "<script>
                     location.href='mailer.php'
                     </script>";  
            }
            if($paument_type=="Pay pal"){
                // Redirecting to payment page
                echo "<script>
                     location.href='../payment.html'
                     </script>";
            }
        }
        else{
            
        // redirecting to confirm booking page
        echo "<script>
        location.href='../confirm-booking.html'
        </script>";
        }
    }
}
