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
                        $mailto = array($_SESSION['email'], "Suttonexecutivecars@gmail.com");

                        // Initailizing variable to check condations if email sent or not
                        $check_result = 1101;
                        // loops for email
                        foreach ($mailto as $value) {
                            // setting new mail
                            $mail = new PHPMailer(true);

                            // setting smtp server
                            $mail->isSMTP();

                            // Setting Auth true
                            $mail->SMTPAuth   = true;

                            // setting host
                            $mail->Host = "mail.suttonexecutivecars.co.uk";

                            // setting port
                            $mail->Port = 587;

                            // setting host username
                            $mail->Username = "admin@suttonexecutivecars.co.uk";

                            // setting host password
                            $mail->Password = "Sutton123!@#";

                            // setting sender eamil
                            $mail->setFrom("admin@suttonexecutivecars.co.uk");

                            // setting reciver email
                            $mail->addAddress($value, $user_result['name']);

                            // setting html 
                            $mail->isHTML(true);

                            // setting subject
                            $mail->Subject = "Sutton - Booking Confirmed ($location_credentail_id)";


                            $body = '<!DOCTYPE html>
                                         <html>
                    
                                         <head>
                                        <title>Book a Cab</title>
                    
                                        </head>
                    
                                    <body style="font-family: Poppins, sans-serif;font-size: 16px;line-height: 1.5;color: #333;background-color: #f5f5f5;padding-top:10px">
                                        <div style="max-width: 600px;margin: 0 auto;background-color: #fff;padding: 30px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);border-radius: 10px;border-color: #3b5998;font-size:15px;">
                                        <div style="text-align:center">
                                            <img src="https://i.pinimg.com/564x/91/f0/33/91f0330d711d29a3e8645f27afb3d286.jpg" alt="Company Logo" height="50px" style="margin:auto">
                                            <h1 style="font-size: 1.2rem; margin-bottom: 20px; color: #3b5998;">Sutton Executive Cars Birmingham</h1>
                                        </div>
                                            <p style="margin-bottom: 20px;font-size:15px;">Dear customer, you have requested a car booking, Thanks for a ride with Sutton Cars. Take Care, Have a safe ride.
                                                Your ride details are as follows:</p>
                                            <ul style="margin-left:18px;padding:0;">
                                                <li style="margin-bottom:10px"><strong>Pickup Location:</strong><a href="' . $result['pickup_latitude'] . '" style="color: #333;">' . $result['pickup_loc'] . '</a></li>
                                                <li style="margin-bottom:10px"><strong>Drop Location:</strong><a href="' . $result['drop_latitude'] . '" style="color: #333;">' . $result['drop_loc'] . '</a> </li>
                                                <li style="margin-bottom:10px"><strong>Customer Name:</strong> ' . $user_result['name'] . ' </li>
                                                <li style="margin-bottom:10px"><strong>Customer Number:</strong> ' . $user_result['number'] . ' </li>
                                                <li style="margin-bottom:10px"><strong>Date:</strong> ' . $result['pickup_date'] .  ' </li>
                                                <li style="margin-bottom:10px"><strong>Time:</strong> ' . $result['pickup_time'] .  '</li>
                                                <li><strong>Vechile:</strong> ' . $car_result['name'] . '</li>
                                            </ul>
                                            <p style="margin: 20px 0;">Any query contact Admin</p>
                                            <p>email at : <a href="mailto:suttonexecutivecars@gmail.com">suttonexecutivecars@gmail.com</a></p>
                                            <p style="font-size: 14px;margin-top:30px;">© 2023 All rights resvered.</p>
                                        </div>
                                    </body>
                                    </html>';


                            // setting body
                            $mail->Body = $body;

                            // checking if email is sent or not
                            if ($mail->send()) {

                                $check_result++;
                            }

                            // closing smtp server
                            $mail->smtpClose();
                        }

                        if ($check_result != 1101) {
                            $pay = $result['payment'];

                            // Redirecting to payment confirmation page
                            echo "<script>location.href='../payment-confirmation.html?id=$location_credentail_id&pay=$pay'</script>";
                        }
                    } else {

                        // Redirecting to confirm-booking page to fill user credential form
                        echo "<script>location.href='../confirm-booking.html'</script>";
                    }
                } else {

                    // Redirecting to Car selection page to Select The car 
                    echo "<script>location.href='../fleet-grid.html'</script>";
                }
            } else {

                // Redirecting to Booking form page to Select The car and check the location credential from form
                echo "<script>location.href='../booking-form.html'</script>";
            }
        } else {

            // Redirecting to index page to fill the location credential form
            echo "<script>location.href='../index.html'</script>";
        }
    } else {

        // Redirecting to confirm-booking page to fill user credential form
        echo "<script>location.href='../confirm-booking.html'</script>";
    }
}else{
    
        // Redirecting to Home page to location credential form
        echo "<script>location.href='../index.html'</script>";
}
