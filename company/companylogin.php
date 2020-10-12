<?php
include('../pages/connect.php');
session_start();

if (isset($_POST['log-in'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    $password = md5($password);
    $query = "SELECT * FROM company_details WHERE COMPANY_EMAIL='$email' AND PASS ='$password'";
    $results = mysqli_query($conn, $query);
    $res = mysqli_fetch_array($results);

    if (mysqli_num_rows($results) == 1) {
        $_SESSION['id'] = $res['COMPANYID'];
        $_SESSION['loggedin'] = true;
        header('location: companydashboard.php');
    }else {
        echo "Wrong username/password combination";
    }
}
?>