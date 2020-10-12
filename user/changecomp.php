<?php
include('../pages/connect.php');
include('session.php');

$compid = $_POST['num']; 

$sql = "SELECT * FROM customer_details WHERE CUSTOMER_EMAIL='$mail'";
$results = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($results);
$custid = $row['CUSTOMERID'];

$query = mysqli_query($conn, "SELECT * FROM company_customers WHERE CUST_ID='$custid'");
if (mysqli_num_rows($query) == 1) {
    $updateQuery = "UPDATE company_customers SET CMP_ID='$compid' where CUST_ID='$custid'";
	mysqli_query($conn, $updateQuery);
	echo '<script>alert("Operation successful")</script>'; 
    header( "refresh:1; url=user-dashboard.php" );
}
else
{
	$sql = "INSERT INTO company_customers (CMP_ID,CUST_ID) VALUES ('$compid','$custid')";
	if (mysqli_query($conn, $sql)) 
	{
		echo '<script>alert("Operation successful")</script>'; 
		header( "refresh:1; url=user-dashboard.php" );
	} 
	else 
	{
		echo "Error: " . $sql . "" . mysqli_error($conn);
	}
}
mysqli_close($conn);
?>