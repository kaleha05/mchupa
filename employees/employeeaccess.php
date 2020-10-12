<?php
session_start();
include('../pages/connect.php');

if (isset($_POST['log-in'])) {
    $tel = $_POST['tel'];
    $password = $_POST['pwd'];
    
    $password = md5($password);
    $query = "SELECT * FROM employees WHERE TELEPHONE='$tel' AND PASS ='$password'";
    $results = mysqli_query($conn, $query);
    $res = mysqli_fetch_array($results);

    if (mysqli_num_rows($results) == 1) {
        $_SESSION['id'] = $res['EMP_ID'];
        $_SESSION['username'] = $res['FNAME'] . " " . $res['LNAME'];
        $_SESSION['loggedin'] = true;
        header('location: empdashboard.php');
    }else {
        echo "Wrong username/password combination";
    }
}
?>