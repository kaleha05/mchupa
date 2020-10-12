<?php
include('../pages/connect.php');
include('collectionrequests.php');

$reqnumber = $_POST['req_num'];
$employeeid = $_POST['empid'];

$check = "SELECT * FROM employee_tasks WHERE REQUESTNO='$reqnumber'";
$result = mysqli_query($conn, $check);
$default = "NOT COMPLETED";
if (mysqli_num_rows($result) > 0) {
	$message = "Error!Task already assigned";
	echo "<script type='text/javascript'>alert('$message');</script>";
	mysqli_close($conn);
}
else{
$sql = "INSERT INTO employee_tasks (EMPLOYEEID, REQUESTNO, TASK_STATUS) VALUES ('$employeeid','$reqnumber','$default')";
if (mysqli_query($conn, $sql)) 
{
	$update_query = "UPDATE collection_requests SET ASSIGNMENT='ASSIGNED' WHERE REQUESTID='$reqnumber'";
	mysqli_query($conn, $update_query);
    header('location: companydashboard.php');
}
else 
{
	echo "Error: " . $sql . "" . mysqli_error($conn);
	echo "me" . $employeeid;
}
}
?>