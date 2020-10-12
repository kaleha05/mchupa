<?php
include('../pages/connect.php');
include('session.php');

$oldpass = md5($_POST['oldpass']);
$newpass = md5($_POST['pwd']); 

$sql = "SELECT PASS FROM customer_details WHERE CUSTOMER_EMAIL='$mail' LIMIT 1";
$result = mysqli_query($conn, $sql);
$db_pass = mysqli_fetch_array($result);

if($oldpass == $db_pass['PASS']){
    $query = "UPDATE customer_details SET PASS='$newpass' where CUSTOMER_EMAIL='$mail'";
    mysqli_query($conn, $query);
    echo '<script>alert("Password changed successfully")</script>'; 
    header( "refresh:1; url=user-dashboard.php" );
}else{
    echo '<script>alert("Wrong password")</script>'; 
    header( "refresh:1; url=password.php" );
}
mysqli_close($conn);
?>