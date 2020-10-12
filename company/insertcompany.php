<?php
include('../pages/connect.php');

$cmpname = $_POST['cname'];
$license = $_POST['license'];
$country = $_POST['country'];
$city = $_POST['city'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$rate = $_POST['rate'];
$pwd = md5($_POST['pwd']);

$sql = "SELECT * FROM company_details WHERE COMPANY_EMAIL='$email' LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "Error: Email already exists!";
	mysqli_close($conn);
}
else{
	$sql = "INSERT INTO company_details (COMPNAME,LICENSENO,COUNTRY,CITY,COMPANY_EMAIL,TELEPHONE,PASS) VALUES ('$cmpname','$license','$country','$city','$email','$telephone','$pwd')";
	if (mysqli_query($conn, $sql)) 
	{
		$sqlqry = mysqli_query($conn, "SELECT * FROM company_details WHERE COMPANY_EMAIL='$email'");
		$res = mysqli_fetch_array($sqlqry);
		$id = $res['COMPANYID'];
		$query= "INSERT INTO payment_rate(COMPID, RATE_PER_KG) VALUES ('$id', '$rate')";
		if (mysqli_query($conn, $query)){
			echo '<script>alert("Your company has been registered successfully")</script>'; 
			header( "refresh:1; url=companylogin.html" );
		}
	} else 
	{
		echo "Error: " . $sql . "" . mysqli_error($conn);
	}
}
mysqli_close($conn);
?>