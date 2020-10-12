<?php
include('../pages/connect.php');
include('companylogin.php');

$id = $_SESSION['id'];
$details_query = "SELECT * FROM company_details WHERE COMPANYID='$id'";
$result = mysqli_query($conn, $details_query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result); 
    $name = $row["COMPNAME"];
    $city = $row["CITY"];
    $country = $row["COUNTRY"];
    $email = $row["COMPANY_EMAIL"];
    $tel = $row["TELEPHONE"];
} else {
    echo "0 results";
}

mysqli_close($conn);
?>