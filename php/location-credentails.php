<?php
include_once "config.php";

//Fetching data from post method  
$pickup_loc=mysqli_real_escape_string($con,$_POST['trip_pick_loc']) ;
$pickup_time=mysqli_real_escape_string($con,$_POST['trip_time']);
$pickup_date=mysqli_real_escape_string($con,$_POST['trip_pick_date']);
$drop_location=mysqli_real_escape_string($con,$_POST['trip_drop_loc']) ;
$drop_time=mysqli_real_escape_string($con,$_POST['drop_time']);
$drop_date=mysqli_real_escape_string($con,$_POST['trip_drop_date']);
$pickup_latitude="No latitude";
$pickup_longitude="No latitude";
$drop_latitude="No latitude";
$drop_longitude="No latitude";
$via_latitude="No latitude";
$via_longitude="No latitude";
if(isset($_POST['via_location'])){

    $via_loc=$_POST['via_location'];
    $via_location=mysqli_real_escape_string($con,implode("%%",$via_loc));
}else{
    $via_location="No via location";
}

// Generating id
define ('loc_id',time());
$id=loc_id;

// Query to insert data into DATABASE
$sql="INSERT INTO location_credential SET `id`=$id,`pickup_loc`='$pickup_loc',`pickup_latitude`='$pickup_latitude',`pickup_longitude`='$pickup_longitude',`pickup_time`='$pickup_time',`pickup_date`='$pickup_date',`drop_loc`='$drop_location',`drop_latitude`='$drop_latitude',`drop_longitude`='$drop_longitude',`drop_time`='$drop_time',`drop_date`='$drop_date',`via_loc`='$via_location',`via_latitude`='$via_latitude',`via_longitude`='$via_longitude'";

// Putting Condition on Inserting data into Database
if(mysqli_query($con,$sql)){

// Saving Generated id into session for furthur use
$_SESSION['location_credentail_id']=$id;
$_SESSION['pickup_date']=$pickup_date;
$_SESSION['drop_date']=$drop_date;
// Redirecting to car selecting page
echo "<script>
location.href='../fleet-grid.html'
</script>";
}





?>

