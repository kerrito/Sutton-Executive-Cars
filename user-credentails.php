<?php 
include_once "config.php";

if(isset($_SESSION['location_credentail_id'])){
$name=$_POST['fname'];
$last_name=$_POST['lname'];
$email=$_POST['email_id'];
$number=$_POST['phone_num'];
$location_credentail_id = $_SESSION['location_credentail_id'];


$sql="INSERT INTO users SET name='$name',last_name='$last_name',email='$email' ,number='$number',loc_cren_id=$location_credentail_id";
if(mysqli_query($con,$sql)){


// Redirecting to car selecting page
echo "<script>
location.href='payment.html'
</script>";
}
}else{
    echo 1;
}


?>