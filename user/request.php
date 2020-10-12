<?php
include('../pages/connect.php');
include('session.php');

$req_date = $_POST['date'];
$req_time = $_POST['time']; 

$sql = "SELECT CMP_ID, CUST_ID FROM customer_details_view WHERE CUSTOMER_EMAIL='$mail'";
$result = mysqli_query($conn, $sql);
$details = mysqli_fetch_array($result);

$compid = $details['CMP_ID'];
$custid = $details['CUST_ID'];

$checkQuery= "SELECT * FROM collection_requests WHERE CUSTID='$custid' AND STATUS='NOT COLLECTED'";
$reslt = mysqli_query($conn, $checkQuery);
if (mysqli_num_rows($reslt) > 0) {
    echo '<script>alert("You already have a pending request. Please wait until the collection has been made then make another request")</script>'; 
    header( "refresh:1; url=user-dashboard.php" );
}
else{
$query = "INSERT INTO collection_requests(CUSTID, COMPID, REQUIRED_DATE, REQUIRED_TIME,STATUS) VALUES ('$custid', '$compid', '$req_date', '$req_time','NOT COLLECTED')";
if(mysqli_query($conn, $query)){
    echo '<script>alert("Your request has been recorded")</script>'; 
    header( "refresh:1; url=user-dashboard.php" );
}else{
    echo "Record not inserted";
}
}
?>