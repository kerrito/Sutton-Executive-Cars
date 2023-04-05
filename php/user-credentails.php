<?php
include_once "config.php";

// Checking if session created
if (isset($_SESSION['location_credentail_id'])) {

    // fetching details
    $name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email_id'];
    $number = $_POST['phone_num'];
    $location_credentail_id = $_SESSION['location_credentail_id'];

    // inserting user credentials
    $sql = "INSERT INTO users SET name='$name',last_name='$last_name',email='$email' ,number='$number',loc_cren_id=$location_credentail_id";


    // Checking if query excuted successfully
    if (mysqli_query($con, $sql)) {

        // Fetching data from ride table by id
        $q = "SELECT * FROM ride WHERE `loc_cren_id`=$location_credentail_id";

        // Storing data into variable
        $ride_res = mysqli_query($con, $q);

        // checking if there is data
        if (mysqli_num_rows($ride_res) > 0) {

            // converting fetched data into associated array form
            $ride_result = mysqli_fetch_assoc($ride_res);

            // checking payment method selectd by user
            if ($ride_result['payment_method'] == "Pay offline") {
                $_SESSION['email']=$email;
                // Redirecting to payment confirmation page
                // echo "<script>
                //      location.href='../payment-confirmation.html'
                //      </script>";
                
                // Redirecting to mailer page
                echo "<script>
                     location.href='mailer.php'
                     </script>";
            } else {
                $_SESSION['email']=$email;
                // Redirecting to payment page
                echo "<script>
                     location.href='../payment.html'
                     </script>";
            }
        }
    }
} else {
    echo 1;
}
