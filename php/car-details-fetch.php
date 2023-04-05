<?php
include_once "config.php";

if (isset($_SESSION['pickup_date'])) {

    // Using Saved pickup date 
    $pickup_date = $_SESSION['pickup_date'];
}
if (isset($_SESSION['drop_date'])) {
    // Using Saved drop date 
    $drop_date = $_SESSION['drop_date'];
}



if (isset($_SESSION['pickup_date']) && isset($_SESSION['drop_date'])) {
    $sql = "SELECT * FROM car_details";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
        foreach ($res as $value) {
            $car_id = $value['id'];
            $q = "SELECT * FROM ride WHERE `car_id`= $car_id AND (( `pickup_date`<='$pickup_date' AND `drop_date`>='$pickup_date') OR (`pickup_date`<='$drop_date' AND `drop_date`>='$drop_date'))";
            $car_ckeck = mysqli_query($con, $q);
            if (mysqli_num_rows($car_ckeck) == 0) {

?>
                <div class="col-md-6 col-sm-6">
                    <div class="fleet-grid-box">
                        <!--Fleet Grid Thumb Start-->
                        <figure class="fleet-thumb">
                            <img src="images/<?= $value['img'] ?>" alt="">
                            <figcaption class="fleet-caption">
                                <div class="price-box">
                                    <strong>Euro <?= $value['price'] ?></strong>
                                </div>
                                <!-- <span class="rated">Top Rated</span> -->
                            </figcaption>
                        </figure>
                        <!--Fleet Grid Thumb End-->
                        <!--Fleet Grid Text Start-->
                        <div class="fleet-info-box">
                            <div class="fleet-info">
                                <h3><?= $value['name'] ?></h3>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>

                                <ul class="fleet-meta">
                                    <li><i class="fas fa-taxi"></i><?= $value['class'] ?></li>
                                    <li><i class="fas fa-user-circle"></i><?= $value['passengers'] ?> Passengers</li>
                                    <li><i class="fas fa-briefcase"></i><?= $value['luggage'] ?></li>
                                </ul>
                            </div>
                            <a href="php/check-form-fill.php?car-id=<?= $value['id'] ?>" class="tj-btn">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                        <!--Fleet Grid Text End-->
                    </div>
                </div>

            <?php
            }
        }
    }
} else {
    $sql = "SELECT * FROM car_details";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
        foreach ($res as $value) {
            ?>
            <div class="col-md-6 col-sm-6">
                <div class="fleet-grid-box">
                    <!--Fleet Grid Thumb Start-->
                    <figure class="fleet-thumb">
                        <img src="images/<?= $value['img'] ?>" alt="">
                        <figcaption class="fleet-caption">
                            <div class="price-box">
                                <strong>Euro <?= $value['price'] ?></strong>
                            </div>
                            <!-- <span class="rated">Top Rated</span> -->
                        </figcaption>
                    </figure>
                    <!--Fleet Grid Thumb End-->
                    <!--Fleet Grid Text Start-->
                    <div class="fleet-info-box">
                        <div class="fleet-info">
                            <h3><?= $value['name'] ?></h3>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>

                            <ul class="fleet-meta">
                                <li><i class="fas fa-taxi"></i><?= $value['class'] ?></li>
                                <li><i class="fas fa-user-circle"></i><?= $value['passengers'] ?> Passengers</li>
                                <li><i class="fas fa-briefcase"></i><?= $value['luggage'] ?></li>
                            </ul>
                        </div>
                        <a href="php/check-form-fill.php?car-id=<?= $value['id'] ?>" class="tj-btn">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                    <!--Fleet Grid Text End-->
                </div>
            </div>


<?php
        }
    }
}





?>