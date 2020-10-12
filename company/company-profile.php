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
                <h4>Company profile</h4>
                <table>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $name; ?></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><?php echo $city; ?></td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td><?php echo $country; ?></td>
                    </tr>
                    <tr>
                        <th>Email address</th>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <th>Telephone</th>
                        <td>+254 <?php echo $tel; ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><a href="comp-password.php">Change password</a></td>
                    </tr>
                </table>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>