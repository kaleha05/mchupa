<?php
    include('getcompanyprofile.php');
?>
<html>
    <head>
        <title></title>
        <link href="../styles/new.css?v=<?php echo time();?>" type="text/css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body> 
        <div class="big-container">
            <div class="top">
                <div class="top-left">
                    <div class="left"><img id="icon" src="../images/comp1.png"></div>
                    <div class="right"><h4><?php echo $name; ?></h4></div>
                </div>
                <div class="top-right">
                    <div class="dropdown">
                        <button class="dropbtn">Options</button>
                        <div class="dropdown-content">
                            <a href="companydashboard.php">Home</a>
                            <a href="newemployee.html">New employee account</a>
                            <a href="collectionrequests.php">Assign tasks</a>
                            <a href="tasks.php">Employee tasks</a>
                            <a href="customers.php">Existing Customers</a>
                            <a href="makepayment.php">Make a Payment</a>
                            <a href="payments.php">Payments to Customers</a>
                            <a href="../pages/log-out.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-container">
                <h4>Payments Table</h4>
                <table>
                <?php
                    include('../pages/connect.php');
                    $results = mysqli_query($conn,"SELECT * FROM amount_view WHERE COMPANY_ID='$id'");
                    if(mysqli_num_rows($results) == 0){
                ?>
                <p>No records to display</p>
                <?php
                }else{
                ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Mass(kg)</th>
                            <th>Collection date</th>
                            <th>Amount(ksh)</th>
                        </tr>
                        <?php
                        while($rows = mysqli_fetch_array($results)) {
                        ?>
                        <tr>
                            <td><?php echo $rows['COLLECTIONID'];?></td>
                            <td><?php echo $rows['CUSTNAME'];?></td>
                            <td><?php echo round($rows['MASS_IN_KG'], 2);?></td>
                            <td><?php echo $rows['COLLECTIONDATE'];?></td>
                            <td><?php echo round($rows['AMT'], 2);?></td>
                            <td><button onclick="payFunction($rows['COLLECTIONID'],$rows['CUSTOMER_ID'],$rows['AMT'])" ><b>pay now</b></button></td>
                        </tr>
                        <?php 
                        }
                        //TODO: FUNCTION DOESN'T EXECUTE FIND OUT WHY
                        function payFunction($custId, $collId, $amt){
                            date_default_timezone_set('Africa/Nairobi');
                            $pTime = date('H:i:s');
                            $pDate = date("Y-m-d");
                            $insertPayment = mysqli_query($conn, "INSERT INTO payments(COMP_ID,CUST_ID,COLLECT_ID,AMOUNT,PAYMENTDATE,PAYTIME) VALUES ('$id','$cust_id','$coll_id','$amt','$pDate','$pTime')"); 
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