<?php
include_once "../php/config.php";
if ($_SESSION['login'] == "true") {
    if ($_SESSION['user_role'] == 1) {
		// redirecting to home page
        echo "<script>
    location.href='car.php'
    </script>";
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

if (isset($_POST['email']) && isset($_POST['pass'])) {
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);


	$sql = "SELECT * FROM signup WHERE `email`='$email' AND `pass`='$pass'";
	$res = mysqli_query($con, $sql);
	if (mysqli_num_rows($res) > 0) {
		$result = mysqli_fetch_assoc($res);

		$_SESSION['login'] = "true";
		$_SESSION['name'] = $result['name'];
		$_SESSION['num'] = $result['number'];
		$_SESSION['email'] = $email;
		$_SESSION['pass'] = $pass;
		$_SESSION['user_role'] = $result['user_role'];


		// redirecting to car page
		echo "<script>
    sessionStorage.setItem('login','true')
location.href='car.php'
</script>";
	} else {

		$_SESSION['error'] = "Incorrect Email/Password";
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
				<h2>Admin/Login</h2>
			</div>
		</div>
		<!--Inner Banner Section End-->



		<!--Register Section Start-->
		<section class="tj-register">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="tj-tabs">
							<h1 class="text-center mb-3 fw-bold">Login Here</h1>
						</div>
						<div class="tab-content">
							<div class="tab-pane active" id="register">
								<div class="col-md-6 col-sm-6">
									<div class="reg-cta">
										<ul class="cta-list">
											<li>
												<span class="icon-mail-envelope icomoon"></span>
												<div class="cta-info">
													<strong>30 Days Money Back Guarantee</strong>
													<!-- <p>A more recently with desktop softy like aldus pages maker still versions have evolved.</p> -->
												</div>
											</li>
											<li class="mt-5">
												<span class="icon icon-Headset"></span>
												<div class="cta-info">
													<strong>24/7 Customer Support</strong>
													<!-- <p>A more recently with desktop softy like aldus pages maker still versions have evolved.</p> -->
												</div>
											</li>
											<li class="mt-5">
												<span class="icon-lock icomoon"></span>
												<div class="cta-info">
													<strong>100% Secure Payment</strong>
													<!-- <p>A more recently with desktop softy like aldus pages maker still versions have evolved.</p> -->
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<form class="reg-frm" method="POST">
										<?php 
										if(isset($_SESSION['error']) && $_SESSION['error']!=''){
										?>
										<h3 id="register_error" class="text-danger text-center mb-3"><?=$_SESSION['error']?></h3>
										<?php	
										$_SESSION['error']='';
										}
										?>
										<div class="field-holder">
											<span class="far fa-envelope"></span>
											<input type="email" name="email" placeholder="Enter your Email Address" pattern="[a-zA-z]+[a-zA-z]+[a-zA-z]+[a-zA-Z0-9-_.]+@[a-zA-Z]+\.[a-zA-Z]{2,5}$" title="Your email must contain least 3 character at starting and @" required>
										</div>
										<div class="field-holder">
											<span class="fas fa-lock"></span>
											<input type="password" name="pass" placeholder="Password" pattern="[A-Za-z0-9,.+@%&$]{6,16}" title="Password must contain 6 to 16 numbers no special character allowed other than ,.+@%&$" required>
										</div>
										<button type="submit" class="reg-btn" style="border-radius: 25px;">Login Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
										<!-- <button type="submit" class="facebook-btn" style="border-radius: 25px;">Login
											with Facebook <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
										<button type="submit" class="google-btn" style="border-radius: 25px;">Login with
											Google <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button> -->
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Register Section End-->

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
	<!--Wrapper Content End-->

	<!-- back to top tooltip  -->
	<button type="button" class="btn-dark btn-floating btn-lg" id="btn-back-to-top">
		<i class="fas fa-arrow-up"></i>
	</button>
	<!-- !back to top tooltip  -->
	</div>
	<!--Wrapper Content End-->
</body>

</html>
<script>
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