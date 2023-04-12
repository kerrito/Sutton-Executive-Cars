<?php
include_once "config.php";



if(isset($_SESSION['location_credentail_id'])){
    $location_credentail_id = $_SESSION['location_credentail_id'];
    
    if(isset($_POST['payment'])){
        $payment_method=$_POST['payment'];
        
        
        $sql="UPDATE ride SET `payment_method`='$payment_method' WHERE `loc_cren_id`=$location_credentail_id";
        if(mysqli_query($con,$sql)){
            $query="SELECT * FROM location_credential WHERE id=$location_credentail_id";
            $query_res=mysqli_query($con,$query);
            if(mysqli_num_rows($query_res)>0){
                $query_result=mysqli_fetch_assoc($query_res);
                $payment=$query_result['payment'];
            // Redirecting to Paypal page
            echo "<script>
                location.href='../paypal/paypalsec.php?id=$payment'
                </script>";

            }

        }
    }else{
        
    // Redirecting to payment page
    echo "<script>
    location.href='../payment.html?error=select'
    </script>";
    }
} else {
    // Redirecting to payment page
    echo "<script>
         location.href='../index.html'
         </script>";
}



?>