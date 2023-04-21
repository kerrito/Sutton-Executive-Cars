<?php 
include_once "config.php";

// fetching user credentials
$name=mysqli_real_escape_string($con,$_POST['name']) ;
$email=mysqli_real_escape_string($con,$_POST['email']);
$pass=mysqli_real_escape_string($con,md5($_POST['pass']));
$num=$_POST['numb'];


$query="SELECT * FROM signup WHERE `email`='$email'";
$res=mysqli_query($con,$query);
if (mysqli_num_rows($res)==0){    
// Query ti insert data
$sql="INSERT INTO `signup` SET `name`='$name',`email`='$email',`number`=$num,`pass`='$pass'";


    if(mysqli_query($con,$sql)){
        // Setting session for user crendentials
    $_SESSION['login'] = "true";
    $_SESSION['name'] =$name;
    $_SESSION['email'] = $email;
    $_SESSION['pass'] = $pass;
    $_SESSION['num'] = $num;
    $_SESSION['user_role'] = $result['user_role'];

    // redirecting to home page
    echo "<script>
    sessionStorage.setItem('login','true')
    location.href='../index.html'
    </script>";


// throwing new exception
}


// catching exception 
}else{

        // redirecting back to register page
        echo "<script>
location.href='../register.html?error=register'
</script>";

    }









?>
<script>
   
</script>