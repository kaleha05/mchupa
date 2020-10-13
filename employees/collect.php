<?php
include('../pages/connect.php');
include('empsession.php');

$cust_name = $_POST['cname'];
$cust_email = $_POST['email'];
$mass = $_POST['mass'];
$emp_id = $_SESSION['id'];

$compquery = "SELECT COMPANYID FROM employees WHERE EMP_ID='$emp_id' LIMIT 1";
$compresult = mysqli_query($conn, $compquery);
$comprow = mysqli_fetch_array($compresult);
$comp_id = $comprow['COMPANYID'];

$custquery = "SELECT CUSTOMERID FROM customer_details WHERE CUSTOMER_EMAIL='$cust_email' LIMIT 1";
$custresult = mysqli_query($conn, $custquery);
$custrow = mysqli_fetch_array($custresult);
$cust_id = $custrow['CUSTOMERID'];

$reqQuery = "SELECT REQUESTID FROM collection_requests WHERE CUSTID='$cust_id' AND STATUS='NOT COLLECTED'";
$reqresult = mysqli_query($conn, $reqQuery);
$req = mysqli_fetch_array($reqresult);
$req_id = $req['REQUESTID'];

date_default_timezone_set('Africa/Nairobi');
$time = date('H:i:s');
$date = date("Y-m-d");
$sql = "INSERT INTO collection_details (COMPANY_ID,CUSTOMER_ID,MASS_IN_KG,COLLECTIONDATE,COLLECTIONTIME) VALUES ('$comp_id','$cust_id','$mass','$date','$time')";
if (mysqli_query($conn, $sql)) 
{
	$updatetask = "UPDATE employee_tasks SET TASK_STATUS='COMPLETED' where REQUESTNO='$req_id'";
	mysqli_query($conn, $updatetask);
	$updatequery = "UPDATE task_view SET TASK_STATUS='COMPLETED' where REQUESTNO='$req_id'";
	mysqli_query($conn, $updatequery);
	$updateqry = "UPDATE collection_requests SET STATUS='COLLECTED' where CUSTID='$cust_id'";
	mysqli_query($conn, $updateqry);

	echo '<script>alert("Collection has been recorded")</script>'; 
	header( "refresh:1; url=empdashboard.php" );
} else 
{
	$message = "Could not connect to database";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>