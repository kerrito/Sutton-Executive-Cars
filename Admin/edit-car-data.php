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

if (isset($_POST['btn'])) {
    if ($_FILES['image']['name'] != null) {
        $car_id = $_POST['car_id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $price = $_POST['price'];
        $class = mysqli_real_escape_string($con, $_POST['class']);
        $passenger = mysqli_real_escape_string($con, $_POST['passenger']);
        $luggage = mysqli_real_escape_string($con, $_POST['luggage']);
        $image = $_FILES['image']['name'];
        $format = array("jpg", "png", "JPG", "PNG");
        $path = pathinfo($image, PATHINFO_EXTENSION);
        if (in_array($path, $format)) {
            $tmp = $_FILES['image']['tmp_name'];
            $newpath = time() . "PNG";
            if (move_uploaded_file($tmp, "../images/" . $newpath)) {
                $sql = "UPDATE `car_details` SET `name`='$name',`price`=$price,`class`='$class',`luggage`='$luggage',`passengers`='$passenger',`img`='$newpath' WHERE `id`=$car_id";
                if (mysqli_query($con, $sql)) {
                    $_SESSION['msg'] = "New Car Data has been added successfully";

                    // redirecting to home page
                    echo "<script>
            location.href='car.php'
            </script>";
                }
            }
        } else {
            $_SESSION['error'] = "Image only allowed in .JPG(.jpg) and .PNG(.png) format";
        }
    } else {
        $car_id = $_POST['car_id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $price = $_POST['price'];
        $class = mysqli_real_escape_string($con, $_POST['class']);
        $passenger = mysqli_real_escape_string($con, $_POST['passenger']);
        $luggage = mysqli_real_escape_string($con, $_POST['luggage']);
        $sql = "UPDATE `car_details` SET `name`='$name',`price`=$price,`class`='$class',`luggage`='$luggage',`passengers`='$passenger' WHERE `id`=$car_id";
        if (mysqli_query($con, $sql)) {
            $_SESSION['msg'] = "New Car Data has been added successfully";

            // redirecting to home page
            echo "<script>
            location.href='car.php'
            </script>";
        }
    }
}

include_once "slicing/herader-links.php";

?>


<body>
    <!--Wrapper Content Start-->
    <div class="tj-wrapper">
        <?php
        include_once "slicing/navbar.php";
        ?>

        <!--Inner Banner Section Start-->
        <div class="tj-inner-banner">
            <div class="container">
                <h2>Admin/Add Car</h2>
            </div>
        </div>
        <!--Inner Banner Section End-->

        <!-- form start -->
        <div class="cotainer py-5">
            <div class="row justify-content-center pt-5">
                <div class="col-md-4 fs-4">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <h1>Edit Car Data</h1>
                            <?php
                            if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
                            ?>
                                <h3 id="register_error" class="text-danger text-center fs-4 mt-3"><?= $_SESSION['error'] ?></h3>
                            <?php
                                $_SESSION['error'] = '';
                            }

                            $car_fetched_id = $_GET['car-id'];
                            $car_fetch_query = "SELECT * FROM car_details WHERE `id`=$car_fetched_id";
                            $car_fetch_query_res = mysqli_query($con, $car_fetch_query);
                            if (mysqli_num_rows($car_fetch_query_res) > 0) {
                                $value = mysqli_fetch_assoc($car_fetch_query_res);
                            ?>

                                <div class="col-md-12 mt-3">
                                    <label for="car_name">Car Name</label>
                                    <input type="text" name="name" class="form-control fs-4" value="<?= $value['name'] ?>" placeholder="Enter Car Name Here" required>
                                </div>
                                <input type="hidden" name="car_id" value="<?= $value['id'] ?>">
                                <div class="col-md-6 mt-3">
                                    <label for="car_name">Passenger Capacity</label>
                                    <input type="text" name="passenger" class="form-control fs-4" value="<?= $value['passengers'] ?>" placeholder="Enter Car Passenger Capacity Here" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="car_name">Car Price</label>
                                    <input type="number" name="price" class="form-control fs-4" value="<?= $value['price'] ?>" placeholder="Enter Car Price Here" required>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="car_name">Car Class</label>
                                    <input type="text" name="class" class="form-control fs-4" value="<?= $value['class'] ?>" placeholder="Enter Car Class Here" required>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="car_name">Luggage Capacity</label>
                                    <input type="text" name="luggage" class="form-control fs-4" value="<?= $value['luggage'] ?>" placeholder="Enter Luggage Capacity Here" required>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="car_name">Car Image</label>
                                    <input type="file" name="image" class="form-control fs-4" placeholder="Enter Car Image Here" >
                                </div>
                            <?php
                            }
                            ?>
                            <div class="col-md-12 mt-3">
                                <input type="submit" name="btn" class="form-control btn btn-outline-primary fs-4 an_btn rounded" placeholder="Submit" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- form end -->

        <!--Call To Action Content Start-->
        <section class="tj-cal-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="cta-box">
                            <img src="images/cta-icon1.png" alt="" />
                            <div class="cta-text">
                                <strong>Best Price Guaranteed</strong>
                                <!-- <p>A more recently with desktop softy  like aldus page maker.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="cta-box">
                            <img src="images/cta-icon2.png" alt="" />
                            <div class="cta-text">
                                <strong>24/7 Customer Care</strong>
                                <!-- <p>A more recently with desktop softy  like aldus page maker.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="cta-box">
                            <img src="images/cta-icon3.png" alt="" />
                            <div class="cta-text">
                                <strong>Easy Bookings</strong>
                                <!-- <p>A more recently with desktop softy  like aldus page maker.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Call To Action Content End-->

        <?php
        include_once "slicing/footer.php";

        ?>

    </div>
</body>

</html>
<script>
    //---------------------------------------------------------------------------
    // to ckeck login is true or not 
    function check_login() {
        var login = sessionStorage.getItem("login");
        if (login == "true") {
            // removing class display none 
            document.getElementById("logout_link").classList.remove("d-none");

            // adding class display none
            document.getElementById("register_link").classList.add("d-none");
            document.getElementById("login_link").classList.add("d-none");

        }
    }
    //--------------------------------------------------------------------------

    // setting function to ba call upon window load
    window.addEventListener("load", (event) => {

        // calling function 
        check_login()

    })
</script>