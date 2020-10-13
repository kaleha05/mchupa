<?php
include('../pages/connect.php');
include('companylogin.php');

$collId = $_POST['coll_id'];
$id = $_SESSION['id'];

$getCustomer = mysqli_query($conn, "SELECT * FROM amount_view WHERE COLLECTIONID='$collId'");
$queryResult = mysqli_fetch_array($getCustomer);
$custid = $queryResult['CUSTOMER_ID'];
$amount = $queryResult['AMT'];

date_default_timezone_set('Africa/Nairobi');
$time = date('H:i:s');
$date = date("Y-m-d");

$insert_query = "INSERT INTO payments (COMP_ID,CUST_ID,COLLECT_ID,AMOUNT,PAYMENTDATE,PAYTIME) VALUES ('$id','$custid','$collId','$amount','$date','$time')";
if (mysqli_query($conn, $insert_query))
{
	$deleteQuery = mysqli_query($conn, "UPDATE amount_view SET AMT=0 WHERE COLLECTIONID='$collId'");
	echo '<script>alert("Payment has been recorded")</script>'; 
	header( "refresh:1; url=companydashboard.php" );
}
else 
{
    echo "Error: " .$insert_query. mysqli_error($conn);
}

?>