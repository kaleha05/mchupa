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
                <h4>Pending collections</h4>
                <table>
                <?php
                    include('../pages/connect.php');
                    $results = mysqli_query($conn,"SELECT * FROM emp_tasks WHERE COMPANYID='$id'AND TASK_STATUS='NOT COMPLETED'");
                    if(mysqli_num_rows($results) == 0){
                ?>
                <p>No records to display</p>
                <?php
                }else{
                ?>
                    <table>
                        <tr>
                            <th>Request number</th>
                            <th>Employee</th>
                            <th></th>
                            <th>Customer</th>
                        </tr>
                        <?php
                        while($rows= mysqli_fetch_array($results)) {
                        ?>
                        <tr>
                            <td><?php echo $rows['REQUESTNO'];?></td>
                            <td><?php echo $rows['FNAME'];?></td>
                            <td><?php echo $rows['LNAME'];?></td>
                            <td><?php echo $rows['CUSTNAME'];?></td>
                        </tr>
                        <?php
                        }}
                ?>
                    </table>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>