<?php
    include('../pages/connect.php');
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
                    <div class="left"><img id="icon" src="../images/nu.png"></a></div>
                    <div class="right"><h4>Change your recycling company</h4></div>
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
                <h4>Choose a recycling company below</h4>
                <form action="changecomp.php" method="post">
                    <table>
                        <tr>
                        <th>Number</th>
                        <th>Company Name</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Telephone</th>
                        <th>Rate per kg(ksh)</th>
                        </tr>
                        <?php
                        include('../pages/connect.php');
                        $query = mysqli_query($conn,"SELECT * FROM company_details_view");
                        while($row = mysqli_fetch_array($query)) {
                        ?> 
                            <tr>
                                <td><?php echo $row['COMPANYID'] ?></td>
                                <td><?php echo $row['COMPNAME']?></td>
                                <td><?php echo $row['COUNTRY']?></td>
                                <td><?php echo $row['CITY']?></td>
                                <td><?php echo $row['TELEPHONE']?></td>
                                <td><?php echo $row['RATE_PER_KG']?></td>
                            </tr> 
                        <?php
                        }
                        ?>
                    </table>
                    <p style="padding-left:10%;">Enter the number of the company you chose</p>
                    <input type="number" name="num" class="rounded" required style="width:30%; margin-left:10%;"><br>
                    <input type="submit" value="Submit" class="rounded" required style="margin-left:20%;">
                </form>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>