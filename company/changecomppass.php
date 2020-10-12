<?php
include('../pages/connect.php');
include('compsession.php');

$oldpass = md5($_POST['oldpass']);
$newpass = md5($_POST['pwd']); 

$sql = "SELECT PASS FROM company_details WHERE COMPANYID='$id' LIMIT 1";
$result = mysqli_query($conn, $sql);
$db_pass = mysqli_fetch_array($result);

if($oldpass == $db_pass['PASS']){
    $query = "UPDATE company_details SET PASS='$newpass' where COMPANYID='$id'";
    mysqli_query($conn, $query);
    header("location: company-profile.php");
}else{
    echo "wrong password";
}
mysqli_close($conn);
?>