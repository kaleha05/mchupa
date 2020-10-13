<?php
include('../pages/connect.php');
session_start();

if (isset($_POST['log-in'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    $password = md5($password);
    $companyQuery = mysqli_query($conn, "SELECT * FROM company_details WHERE COMPANY_EMAIL='$email' AND PASS ='$password'");
    $results = mysqli_fetch_array($companyQuery);

    if (mysqli_num_rows($companyQuery) == 1) {
        $_SESSION['id'] = $results['COMPANYID'];
        $_SESSION['loggedin'] = true;
        header('location: companydashboard.php');
    }else {
        echo "Wrong username/password combination";
    }
}
?>