<?php 
session_start();
$con =mysqli_connect("localhost","root","","dbsultan");
if(!$con){
    echo "Failed to connect with Database";
}


?>