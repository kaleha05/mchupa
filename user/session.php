<?php
include('login.php');
 
$name = $_SESSION['username'];
$mail = $_SESSION['email'];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}
?>