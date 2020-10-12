<?php
include('companylogin.php');
 
$name = $_SESSION['username'];
$id = $_SESSION['id'];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: companylogin.html");
    exit;
}
?>