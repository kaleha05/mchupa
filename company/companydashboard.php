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
            <div class="containers">
                <div class="stats-container">
                    <a href="customers.php"><img id="stats-icon" src="../images/emp.png"></a>
                    <h3>Customers</h3>
                    <p>Click to view customers and payments </p>
                    <a href="customers.php"><button class="rounded"><b>Customers</b></button></a>
                </div>
                <div class="account-container">
                    <a href="company-profile.php"><img id="account-icon" src="../images/comp1.png"></a>
                    <h3>Company</h3>
                    <p>Click to view company profile and manage employees</p>
                    <a href="company-profile.php"><button class="rounded"><b>Company</b></button></a>
                </div>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>