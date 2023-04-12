<?php 
include_once "config.php";

$email=$_POST['email'];
$pass=md5($_POST['pass']);


$sql="SELECT * FROM signup WHERE `email`='$email' AND `pass`='$pass'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    $result=mysqli_fetch_assoc($res);

    $_SESSION['login']="true";
    $_SESSION['name']=$result['name'];
    $_SESSION['num']=$result['number'];
    $_SESSION['email']=$email;
    $_SESSION['pass']=$pass;


    // redirecting to home page
    echo "<script>
    sessionStorage.setItem('login','true')
location.href='../index.html'
</script>";
}else{

    // redirecting back to register page
    echo "<script>
location.href='../register.html?error=login'
</script>";
}







?>