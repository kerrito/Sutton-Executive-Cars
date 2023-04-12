<?php 
include_once "config.php";

if(session_destroy()){
    echo "
    <script>
    sessionStorage.removeItem('login');
        location.href='../index.html';
    </script>";
}







?>
