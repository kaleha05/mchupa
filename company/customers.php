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
            <h4>Existing customers</h4>
                <?php
                include('../pages/connect.php');
                $query = mysqli_query($conn,"SELECT * FROM customer_details_view WHERE CMP_ID='$id'");
                if(mysqli_num_rows($query) == 0){
                ?>
                <p>No records to display</p>
                <?php
                }else{
                ?>
                <table>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Telephone</th>
                    </tr>
                    <?php
                    $i=1;
                    while($row = mysqli_fetch_array($query)) {
                    ?> 
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['CUSTNAME'] ?></td>
                            <td><?php echo $row['CITY']?></td>
                            <td><?php echo $row['CUSTOMER_EMAIL']?></td>
                            <td><?php echo $row['TELEPHONE']?></td>
                        </tr> 
                    <?php
                    $i++;
                    }
                }
                    ?>
                </table>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>