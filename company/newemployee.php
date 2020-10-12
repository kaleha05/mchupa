<?php
include('../pages/connect.php');
include('compsession.php');

$id =$_SESSION['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$telephone = $_POST['telephone'];
$password = md5($_POST['pwd']); 

$sql = "SELECT * FROM employees WHERE TELEPHONE='$telephone' AND COMPANYID='$id' LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "Error: Employee already exists!";
	mysqli_close($conn);
}
else{
	$sql = "INSERT INTO employees (FNAME,LNAME,TELEPHONE,COMPANYID,PASS) VALUES ('$fname','$lname','$telephone','$id','$password')";
	if (mysqli_query($conn, $sql)) 
	{
		echo '<script>alert("New employee account created")</script>'; 
		header( "refresh:1; url=company-profile.php" );
	} else 
	{
		echo "Error: " . $sql . "" . mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>