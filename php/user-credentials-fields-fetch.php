<?php
// including database connection 
include_once "config.php";

// checking if user is login or not
if (isset($_SESSION['login']) && $_SESSION['login'] = "true") {

    // Fetching data from sessions
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $num = $_SESSION['num'];

?>
    <form class="cb-frm" method="POST" action="php/user-credentails.php" id="rider-info">
        <div class="col-md-6 col-sm-6">
            <div class="info-field">
                <label>First Name</label>
                <span class="far fa-user"></span>
                <input type="text" name="fname" placeholder="Enter First Name" value="<?=$name?>" pattern="[A-za-z ]{3,16}" title="First Name must contain 3 to 16 character no special character allowed" required>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="info-field">
                <label>Last Name</label>
                <span class="far fa-user"></span>
                <input type="text" name="lname" placeholder="Enter Last Name" pattern="[A-za-z ]{3,16}" title="Last Name must contain 3 to 16 character no special character allowed" required>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="info-field">
                <label>Phone</label>
                <span class="icon-phone icomoon"></span>
                <input type="tel" name="phone_num" placeholder="Enter Phone Number" value="<?=$num?>" pattern="[0-9]{8,16}" title="Phone Number must contain 8 to 16 numbers" required>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="info-field">
                <label>Email</label>
                <span class="far fa-envelope"></span>
                <input type="email" name="email_id" placeholder="Enter Email id" value="<?=$email?>" pattern="[a-zA-z]+[a-zA-z]+[a-zA-z]+[a-zA-Z0-9-_.]+@[a-zA-Z]+\.[a-zA-Z]{2,5}$" title="Your email must contain least 3 character at starting and @" required>
            </div>
        </div>
        <div class="col-md-6 d-flex mt-3">
            <a href="booking-form.html" class="back-btn ms-3" style="border-radius: 25px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Go Back</a>
        </div>
        <div class="col-md-6 d-flex mt-3">

            <a><button type="submit" class="book-btn me-3" id="ride-bbtn" style="border-radius: 25px;">Book Now <i class="fa fa-arrow-circle-right"></i></button></a>
        </div>
    </form>
<?php

} else {
    ?>
    <form class="cb-frm" method="POST" action="php/user-credentails.php" id="rider-info">
        <div class="col-md-6 col-sm-6">
            <div class="info-field">
                <label>First Name</label>
                <span class="far fa-user"></span>
                <input type="text" name="fname" placeholder="Enter First Name" pattern="[A-za-z ]{3,16}" title="First Name must contain 3 to 16 character no special character allowed" required>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="info-field">
                <label>Last Name</label>
                <span class="far fa-user"></span>
                <input type="text" name="lname" placeholder="Enter Last Name" pattern="[A-za-z ]{3,16}" title="Last Name must contain 3 to 16 character no special character allowed" required>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="info-field">
                <label>Phone</label>
                <span class="icon-phone icomoon"></span>
                <input type="tel" name="phone_num" placeholder="Enter Phone Number"  pattern="[0-9]{8,16}" title="Phone Number must contain 8 to 16 numbers" required>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="info-field">
                <label>Email</label>
                <span class="far fa-envelope"></span>
                <input type="email" name="email_id" placeholder="Enter Email id" pattern="[a-zA-z]+[a-zA-z]+[a-zA-z]+[a-zA-Z0-9-_.]+@[a-zA-Z]+\.[a-zA-Z]{2,5}$" title="Your email must contain least 3 character at starting and @" required>
            </div>
        </div>
        <div class="col-md-6 d-flex mt-3">
            <a href="booking-form.html" class="back-btn ms-3" style="border-radius: 25px;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Go Back</a>
        </div>
        <div class="col-md-6 d-flex mt-3">

            <a><button type="submit" class="book-btn me-3" id="ride-bbtn" style="border-radius: 25px;">Book Now <i class="fa fa-arrow-circle-right"></i></button></a>
        </div>
    </form>
    <?php


}






?>