<?php
include_once "config.php";



if(isset($_SESSION['location_credentail_id'])){
    $location_credentail_id = $_SESSION['location_credentail_id'];
    $payment_method=$_POST['payment'];
$sql="UPDATE ride SET `payment_method`='$payment_method' WHERE `loc_cren_id`=$location_credentail_id";
if(mysqli_query($con,$sql)){
    // Redirecting to mailer page
    echo "<script>
         location.href='mailer.php'
         </script>";
}
} else {
    // Redirecting to payment page
    echo "<script>
         location.href='../index.html'
         </script>";
}



?>