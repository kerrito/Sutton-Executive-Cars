<?php
include_once "config.php";
require_once "../PHPMailer-master/PHPMailer.php";
require_once "../PHPMailer-master/SMTP.php";
require_once "../PHPMailer-master/Exception.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Checking if session exist or not
if (isset($_SESSION['location_credentail_id'])) {

    // checking if user credentials is submitted
    if (isset($_SESSION['email'])) {
        // fetching location credential id
        $location_credentail_id = $_SESSION['location_credentail_id'];

        // fecthing data from location_credential table
        $sql = "SELECT * FROM location_credential WHERE id=$location_credentail_id";

        // storing fetched data into variable
        $res = mysqli_query($con, $sql);

        // Checking if data exist or not
        if (mysqli_num_rows($res) > 0) {

            // Converting fetched data into associated array form
            $result = mysqli_fetch_assoc($res);

            // checking if via location exits or not
            if ($result['via_loc'] != "No via location" && !empty($result['via_loc'])) {

                // converting via locations from string to array
                $via_location = explode("%%", $result['via_loc']);
                $journey_type = "Two Way";
            } else {
                $journey_type = "One Way";
            }

            // fecthing data from ride table by location credentials id
            $q = "SELECT * FROM ride WHERE `loc_cren_id`=$location_credentail_id ";

            // storing fetched data into variable
            $ride_res = mysqli_query($con, $q);

            // Checking if data exist or not
            if (mysqli_num_rows($ride_res) > 0) {

                // Converting fetched data into associated array form
                $ride_result = mysqli_fetch_assoc($ride_res);

                // fetching car id
                $car_id = $ride_result['car_id'];

                // fecthing data from car details table by car id
                $sq = "SELECT * FROM car_details WHERE id=$car_id";

                // storing fetched data into variable
                $car_res = mysqli_query($con, $sq);

                // Checking if data exist or not
                if (mysqli_num_rows($car_res) > 0) {

                    // Converting fetched data into associated array form
                    $car_result = mysqli_fetch_assoc($car_res);

                    // fecthing data from users details table by car id
                    $Query = "SELECT * FROM users WHERE `loc_cren_id`=$location_credentail_id";

                    // storing fetched data into variable
                    $user_res = mysqli_query($con, $Query);

                    // Checking if data exist or not
                    if (mysqli_num_rows($user_res) > 0) {

                        // Converting fetched data into associated array form
                        $user_result = mysqli_fetch_assoc($user_res);

                        //"shoaibtechy.j75@gmail.com"
                        // Setting emails
                        $mailto = array($_SESSION['email'], "muhammadarshanirfan@gmail.com");

                        // loops for email
                        foreach ($mailto as $value) {
                            // setting new mail
                            $mail = new PHPMailer(true);

                            // setting smtp server
                            $mail->isSMTP();

                            // setting host
                            $mail->Host = "sandbox.smtp.mailtrap.io";

                            // setting authentication
                            $mail->SMTPAuth = true;

                            // setting smtp secure
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                            // setting port
                            $mail->Port = 2525;

                            // setting host username
                            $mail->Username = "9de498ea448d4f";

                            // setting host password
                            $mail->Password = "9a3a63d89589c7";

                            // setting sender eamil
                            $mail->setFrom("muhammadarshanirfan@gmail.com");

                            // setting reciver email
                            $mail->addAddress($value);

                            // setting html 
                            $mail->isHTML(true);

                            // setting subject
                            $mail->Subject = "Sutton Executive Car Confirmation";

                            // Creating Html Body
                            $body = "<div class='booking-summary'>
                        <h3>Booking Summary</h3>
                        <ul class='booking-info'>
                            <li><span>Booking Reference: </span>" . $location_credentail_id . "</li>
                            <li><span>Journey Type: </span>" . $journey_type . "</li>
                            <li><span>Booked Car: <span >" . $car_result['name'] . "</span></li>
                            <li><span>One Way Fare: </span>Euro <span class='price'>" . $car_result['price'] . "</span></li>
                            <li>
                                <span class='mb-0 '>Distance & Time:<span> <span id='kilo_meter'>2,522</span> km & 23 hours 7 mins
                            </li>
                        </ul>
                        <div class='journey-info'>
                            <h3>" . $journey_type . " Journey</h3>
    
                        </div>
                        <ul class='service-info ms-2'>
                        <h4>Customer Summary</h4>
                            <li><span>First Name: </span>" . $user_result['name'] . "</li>
                            <li><span>Last Name: </span>" . $user_result['last_name'] . "</li>
                            <li><span>Contact Number: </span>" . $user_result['number'] . "</li>
                        <h4>Pick Up Summary</h4>
                            <li><span>From: </span>" . $result['pickup_loc'] . "</li>
                            <li><span>Pickup Date: </span>" . $result['pickup_date'] . "</li>
                            <li><span>Pickup Time: </span>" . $result['pickup_time'] . "</li>
                        <h4>Drop Summary</h4>   
                            <li><span>To: </span>" . $result['drop_loc'] . "</li>
                            <li><span>Drop Date: </span>" . $result['drop_date'] . "</li>
                            <li><span>Drop Time: </span>" . $result['drop_time'] . "</li>
                        <h4>Via Locations Summary</h4>
                        ";
                            if ($result['via_loc'] != "No via location" && !empty($result['via_loc'])) {
                                foreach ($via_location as $value) {
                                    $body .= "<li><span>Via Location: </span>" . $value . "</li>";
                                }
                            } else {
                                $body .= "<li><span>Via Location: </span>No Via Location</li>";
                            }

                            $body .= "<h4>Payment Method Summary</h4>
                           <li><span>Payment Method: </span>" . $ride_result['payment_method'] . "</li>
                           <h4>Payable Amount Summary</h4>
                            <li><span>Fare Details: </span>Basic Amount: Euro <span id='amount'>450.00</span></li>
                        </ul>
                        <div class='fare-box ms-2'>
                            <strong>Total Fare: <span>Euro <span id='total_amount'>450.00</span></span></strong>
                            <span>( inclusive of All Taxes )</span>
                        </div>
                     </div>";


                            // setting body
                            $mail->Body = $body;

                            // checking if email is sent or not
                            if ($mail->send()) {
                            }
                        }
                        // closing smtp server
                        $mail->smtpClose();

                        // Redirecting to payment confirmation page
                        echo "<script>
                     location.href='../payment-confirmation.html'
                     </script>";
                    }
                }
            }
        }
    }
}
