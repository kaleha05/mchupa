<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "mchupa";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
        die('Could not Connect to MySql:' .mysql_error());
    }


/*

    $servername='localhost';
    $username='princes3_princes3';
    $password= 'Myprincess12';
    $dbname = "princes3_princess";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
        die('Could not Connect to MySql:' .mysql_error());
    }
*/
?>
