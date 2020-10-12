<?php
include('../pages/connect.php');
include('companylogin.php');

$amount = $_POST['amt'];
$custid = $_POST['custid'];
$id = $_SESSION['id'];

date_default_timezone_set('Africa/Nairobi');
$time = date('H:i:s');
$date = date("Y-m-d");

$insert_query = "INSERT INTO payments (COMP_ID,CUST_ID,AMOUNT,PAYMENTDATE,PAYTIME) VALUES ('$id','$custid','$amount','$date','$time')";
if (mysqli_query($conn, $insert_query))
{
	echo '<script>alert("Payment has been recorded")</script>'; 
	header( "refresh:1; url=companydashboard.php" );
}
else 
{
    echo "Error: " . mysqli_error($conn);
}

?>