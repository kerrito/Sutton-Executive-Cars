<?php
include_once "../php/config.php";
if ($_SESSION['login'] == "true") {
    if ($_SESSION['user_role'] == 1) {
    } else {

        // redirecting to home page
        echo "<script>
    location.href='../index.html'
    </script>";
    }
} else {
    // redirecting to home page
    echo "<script>
    location.href='login.php'
    </script>";
}

$car_id=$_POST['car-id'];


$sql="DELETE FROM car_details WHERE id=$car_id";
if(mysqli_query($con,$sql)){
$_SESSION['msg']="Car has been deleted successfully";

echo 1;

}



?>