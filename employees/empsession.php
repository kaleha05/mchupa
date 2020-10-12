<?php
include('employeeaccess.php');
 //not working
$id = $_SESSION['id'];
$name = $_SESSION['username'];
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: employeelogin.html");
    exit;
}
?>