<?php 
    include('session.php');
?>
<html>
    <head>
        <title></title>
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
                            <a href="req-collection.php">Request Collection</a>
                            <a href="getcompanies.php">Recycling company</a>
                            <a href="../pages/log-out.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="containers">
                <div class="stats-container">
                    <a href="user-stats.php"><img id="stats-icon" src="../images/stats2.png"></a>
                    <h3>My Stats</h3>
                    <p>Click to view your recycle count, account balance and bonuses </p>
                    <a href="user-stats.php"><button class="rounded"><b>My Stats</b></button></a>
                </div>
                <div class="account-container">
                    <a href="user-profile.php"><img id="account-icon" src="../images/nu1.png"></a>
                    <h3>My Profile</h3>
                    <p>Click to change your account password, profile picture or review your profile</p>
                    <a href="user-profile.php"><button class="rounded"><b>My Profile</b></button></a>
                </div>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>