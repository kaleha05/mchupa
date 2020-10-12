<?php
    include('getcompanyprofile.php');
?>
<html>
    <head>
        <title></title>
        <link href="../styles/new.css?v=<?php echo time();?>" type="text/css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
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
                <h4>Pending requests</h4>
                <table>
                <?php
                    include('../pages/connect.php');
                    $results = mysqli_query($conn,"SELECT * FROM collection_requests_view WHERE COMPID='$id'AND ASSIGNMENT='NOT ASSIGNED'");
                    if(mysqli_num_rows($results) == 0){
                ?>
                <p>No records to display</p>
                <?php
                }else{
                ?>
                    <table>
                        <tr>
                            <th>Request number</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                        <?php
                        while($rows= mysqli_fetch_array($results)) {
                        ?>
                        <tr>
                            <td><?php echo $rows['REQUESTID'];?></td>
                            <td><?php echo $rows['CUSTNAME'];?></td>
                            <td><?php echo $rows['REQUIRED_DATE'];?></td>
                            <td><?php echo $rows['REQUIRED_TIME'];?></td>
                        </tr>
                        <?php
                        }
                ?>
                    </table>
                <form action="assigntask.php" method="post">
                    <p>Enter the request number</p>
                    <input type="number" name="req_num" class="rounded" required style="width:30%;"><br>
                    <p>Choose an employee</p>
                    <select class="rounded" name="empid" required style="width:30%;">
                        <option disabled selected value> -- select an employee -- </option>
                        <?php
                            $empquery = mysqli_query($conn,"SELECT * FROM employees WHERE COMPANYID='$id'");
                            $rows = array(); 
                            $n=0;
                            while($result = mysqli_fetch_array($empquery)){
                                $empid[$n] = $result['EMP_ID'];
                        ?> 
                            <option value="<?php echo $empid[$n];?>"><?php echo $result['FNAME']." ".$result['LNAME']?></option>
                        <?php $n++;} ?>
                    </select><br>
                    <input class="rounded" type="submit" value="Submit" style="margin-left:20%;">
                </form>
                <?php } ?>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>