<?php
session_start();
include('../pages/connect.php');


if (isset($_POST['log-in'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    $password = md5($password);
    $query = "SELECT * FROM customer_details WHERE CUSTOMER_EMAIL='$email' AND PASS ='$password'";
    $results = mysqli_query($conn, $query);
    $res = mysqli_fetch_array($results);

    if (mysqli_num_rows($results) == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $res['CUSTNAME'];
        $_SESSION['loggedin'] = true;
        header('location: user-dashboard.php');
    }else {
        echo "Wrong username/password combination";
    }
}
?>