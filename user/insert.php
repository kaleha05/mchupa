<?php
include('../pages/connect.php');

$orgtype = $_POST['orgtype'];
$cname = $_POST['cname'];
$telephone = $_POST['telephone'];
$city = $_POST['city'];
$country = $_POST['country'];
$email = $_POST['email'];
$password = md5($_POST['pwd']); 

$sql = "SELECT * FROM customer_details WHERE CUSTOMER_EMAIL='$email' LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "Error: Email already exists!";
	mysqli_close($conn);
}
else{
	$sql = "INSERT INTO customer_details (ORGTYPE,CUSTNAME,TELEPHONE,CITY,COUNTRY,CUSTOMER_EMAIL,PASS) VALUES ('$orgtype','$cname','$telephone','$city','$country','$email','$password')";
	if (mysqli_query($conn, $sql)) 
	{
		echo '<script>alert("Registration successful")</script>'; 
		header( "refresh:1; url=login.html" );
	} else 
	{
		echo "Error: " . $sql . "" . mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>