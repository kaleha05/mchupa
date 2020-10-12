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
                            <a href="req-collection.php">Request Collection</a>
                            <a href="../pages/log-out.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-container">
            <h4>Your deposits</h4>
                <?php
                    include('../pages/connect.php');
                    $sql = "SELECT CUSTOMERID FROM customer_details WHERE CUSTOMER_EMAIL='$mail'";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($res);
                    $id = $row['CUSTOMERID'];
                    $results = mysqli_query($conn,"SELECT * FROM collection_details WHERE CUSTOMER_ID=$id");
                    if(mysqli_num_rows($results)==0){
                        ?><p>No records to display</p><?php
                    }else{
                    ?>
                        <table>
                            <tr>
                                <th>Mass(kg)</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                            <?php
                            while($rows = mysqli_fetch_array($results)) {
                            ?>
                            <tr>
                                <td><?php echo $rows['MASS_IN_KG'];?></td>
                                <td><?php echo $rows['COLLECTIONDATE'];?></td>
                                <td><?php echo $rows['COLLECTIONTIME'];?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    <?php
                        $total_query = mysqli_query($conn, "SELECT TOTAL_MASS FROM mass_per_customer WHERE CUSTOMER_ID=$id");
                        $result = mysqli_fetch_array($total_query);
                        $total = $result['TOTAL_MASS']; 
                    ?>
                <p>You have recycled <?php echo round($total,2);?> grams of plastic</p>
                <?php
                    }
                ?>
            <h4>Payments</h4>
            <?php
                $query= mysqli_query($conn, "SELECT * FROM payments WHERE CUST_ID=$id");
                if(mysqli_num_rows($query)==0){
                    ?><p>No records to display</p><?php
                }else{
                    $sum = 0;
                ?>
                    <table>
                        <tr>
                            <th>Amount Paid(ksh)</th>
                            <th>Payment Date</th>
                            <th>Payment Time</th>
                        </tr>
                        <?php
                        while($rows = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $rows['AMOUNT'];?></td>
                            <td><?php echo $rows['PAYMENTDATE'];?></td>
                            <td><?php echo $rows['PAYTIME'];?></td>
                        </tr>
                        <?php
                        $sum = $sum + $rows['AMOUNT'];
                        }
                        $balance = $amt - $sum
                        ?>
                    </table>
                    <p>Total paid = Ksh<?php echo $sum;?></p><!--generate 2dp automztically-->
                    <p>Balance = Ksh<?php echo $balance?>0</p>
                <?php
                }
            ?>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>