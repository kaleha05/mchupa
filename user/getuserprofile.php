<?php
include('../pages/connect.php');
include('login.php');

$name = $_SESSION['username'];
$sql = "SELECT CUSTNAME, ORGTYPE, CITY, COUNTRY, CUSTOMER_EMAIL, TELEPHONE FROM customer_details WHERE CUSTNAME='$name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result); 
    $name = $row["CUSTNAME"];
    $org = $row["ORGTYPE"];
    $city = $row["CITY"];
    $country = $row["COUNTRY"];
    $email = $row["CUSTOMER_EMAIL"];
    $tel = $row["TELEPHONE"];
} else {
    echo "0 results";
}

mysqli_close($conn);
?>