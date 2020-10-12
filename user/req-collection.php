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
                            <a href="getcompanies.php">Recycling company</a>
                            <a href="../pages/log-out.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-container">
            <?php
                include('../pages/connect.php');
                $query = mysqli_query($conn,"SELECT * FROM customer_details_view WHERE CUSTOMER_EMAIL='$mail'");
                if(mysqli_num_rows($query) == 0){
            ?>
                <h4>Please choose a recycling company first</h4>
                <p> Options > Recycling company</p>
            <?php 
                }else{
            ?>
            <h4>Request collection</h4>
            <form action="request.php" method="post">
                <p>Set collection date</p>
                    <input class="rounded" type="date" name="date" required>
                <p>Set collection time</p>
                    <input class="rounded" type="time" name="time" required>
                <input type="submit" value="Submit" class="rounded">
            </form>
                <?php }?>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>