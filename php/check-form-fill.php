<?php 
include_once "config.php";
$car_id=$_GET['car-id'];
if(!isset($_SESSION['location_credentail_id'])){
    echo "<script>
    location.href='../index.html?error=error'
    </script>";    
    }else{
        echo "<script>
    location.href='../booking-form.html?car-id=$car_id'
    </script>";
    }

?>