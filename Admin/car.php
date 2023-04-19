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
                <h2>Admin/Cars</h2>
            </div>
        </div>
        <!--Inner Banner Section End-->

        <!--Fleet Section Start-->
        <section class="car-fleet">
            <div class="container">
                <div class="row">
                    <!--Fleet Column Start-->
                    <div class="col-md-12 col-sm-12">
                        <!--Tab Content Start-->
                        <div class="tab-content">
                            <!--Fleet Grid Tab Content Start-->
                            <div class="tab-pane active" id="car-grid">
                                <!--Fleet Grid Box Wrapper Start-->
                                <div class="fleet-grid">
                                    <div class="mb-4 d-flex flex-row justify-content-between align-items-center">
                                        <div>
                                            <h1 class="">Cars Details</h1>
                                        </div>
                                        <div>
                                            <a href="add-car-data.php" class=""><button type="button" class="an_btn p-2 px-3 ps-4 fs-4 ">Add Car  <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button></a>
                                        </div>
                                    </div>
                                    
                                    <?php 
										if(isset($_SESSION['error']) && $_SESSION['error']!=''){
										?>
                                        <div class="my-3">
                                            <marquee class="text-danger fs-4" loop="1"><?=$_SESSION['error']?></marquee>
                                        </div>
                                        <?php	
										$_SESSION['error']='';
										}
                                         
                                        if(isset($_SESSION['msg']) && $_SESSION['msg']!=''){
                                            ?>
                                            <div class="my-3">
                                                <marquee class="text-success fs-4" loop="1"><?=$_SESSION['msg']?></marquee>
                                            </div>
                                            <?php	
                                            $_SESSION['msg']='';
                                            }
                                            ?>
                                    



                                    <?php
                                    include_once "slicing/navbar.php";

                                    $sql = "SELECT * FROM car_details";
                                    $res = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($res) > 0) {
                                        foreach ($res as $value) {
                                    ?>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="fleet-grid-box">
                                                    <!--Fleet Grid Thumb Start-->
                                                    <figure class="fleet-thumb">
                                                        <img src="../images/<?= $value['img'] ?>" alt="">
                                                        <figcaption class="fleet-caption">
                                                            <div class="price-box">
                                                                <strong>&pound; <?= $value['price'] ?></strong>
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
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="edit-car-data.php?car-id=<?= $value['id'] ?>" class="form-control btn btn-outline-primary an_btn_p mt-2 text-center">Edit Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <a onclick="car_delete(<?= $value['id'] ?>)" class="form-control btn btn-outline-primary an_btn_p mt-2 text-center ">Delete Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                                            </div>

                                                            <!-- <div class="col-md-12">
                                                                <a href="" class="form-control btn btn-outline-primary an_btn mt-2 text-center">Add Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <!--Fleet Grid Text End-->
                                                </div>
                                            </div>


                                    <?php
                                        }
                                    }





                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Fleet Section END-->


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

<script src="../js/jquery-1.12.5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script>
    function car_delete(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3b5998',
            cancelButtonColor: 'black',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                var car_id = id;
                $.ajax({
                    url: "delete-car.php",
                    type: "POST",
                    data: {
                        "car-id": car_id
                    },
                    success: function(load) {
                        console.log(load)
                        if (load == 1) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })

                        }
                    }
                })


            }
        })



    }
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