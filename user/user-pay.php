<?php 
    include('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="../styles/pages.css" type="text/css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    </head>
    <body>
        <div class="big-container">
            <div class="top">
                <div class="top-left">
                    <div class="left"><img id="icon" src="../images/nu.png"></div>
                    <div class="right"><h4><?php echo $name; ?></h4></div>
                </div>
                <div class="top-right">
                    <div class="dropdown">
                        <button class="dropbtn">Options</button>
                        <div class="dropdown-content">
                            <a href="user-dashboard.php">Home</a>
                            <a href="user-stats.php">Your deposits</a>
                            <a href="req-collection.php">Request Collection</a>
                            <a href="../pages/log-out.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-container">
            <h4>Payments</h4>
            <?php
                include('../pages/connect.php');
                $sql = "SELECT CUSTOMERID FROM customer_details WHERE CUSTOMER_EMAIL='$mail'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $id = $row['CUSTOMERID'];
                $payQuery= mysqli_query($conn, "SELECT * FROM customer_pay_report WHERE CUST_ID='$id'");
                if(mysqli_num_rows($payQuery)==0){
                    ?><p>No records to display</p><?php
                }else{
                    $sum = 0;
                ?>
                    <table>
                        <tr>
                            <th>Company name</th>
                            <th>Amount(ksh)</th>
                            <th>Paid(ksh)</th>
                            <th>Balance</th>
                            <th>Payment Date</th>
                            <th>Payment Time</th>
                        </tr>
                        <?php
                        while($rows = mysqli_fetch_array($payQuery)) {
                        ?>
                        <tr>
                            <td><?php echo $rows['COMPNAME'];?></td>
                            <td><?php echo $rows['AMOUNT'];?></td>
                            <td><?php echo $rows['PAID'];?></td>
                            <td><?php echo $rows['BALANCE'];?></td>
                            <td><?php echo $rows['PAYMENTDATE'];?></td>
                            <td><?php echo $rows['PAYTIME'];?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                <?php
                }
            ?>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>