<?php
    include('empsession.php');
?>
<html>
    <head>
        <title></title>
        <link href="../styles/pages.css?v=<?php echo time();?>" type="text/css" rel="stylesheet">
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
                            <a href="empdashboard.php">Home</a>
                          <a href="../pages/log-out.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-container">
            <h4>Make a collection</h4>
                <form action="collect.php" method="post">
                    <p>Customer Name</p>
                    <select class="rounded" name="cname" required>
                    <option disabled selected value> -- select a company -- </option>
                    <?php
                    include('../pages/connect.php');
                    $query = mysqli_query($conn,"SELECT * FROM task_view WHERE EMPLOYEEID='$id' AND TASK_STATUS='NOT COMPLETED'");
                    while($row = mysqli_fetch_array($query)) {
                    ?> 
                    <option><?php echo $row['CUSTNAME']?></option>
                    <?php } ?>
                    </select>
                    <p>Customer email address</p>
                    <input type="text" name="email" class="rounded" required>
                    <p>Mass (kg)</p>
                    <input type="number" step="any" name="mass" class="rounded" required>
                    <input type="checkbox" required><label>please check that you have entered the details correctly</label></input>
                    <input type="submit" value="Submit" class="rounded">
                </form>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>