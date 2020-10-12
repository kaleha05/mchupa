<?php 
    include('empsession.php');
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
                            <a href="collectionform.php">Complete task</a>
                            <a href="../pages/log-out.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-container">
                <h4>Your tasks</h4>
                    <?php
                    include('../pages/connect.php');
                    $query = mysqli_query($conn,"SELECT * FROM task_view WHERE EMPLOYEEID='$id' AND TASK_STATUS='NOT COMPLETED'");
                    if(mysqli_num_rows($query) == 0){
                    ?>
                    <p>Woohoo! You have completed all your tasks</p>
                    <?php
                    }else{
                    ?> 
                    <table>
                        <tr>
                            <th>Request Number</th>
                            <th>Customer Name</th>
                        </tr>
                        <?php
                        while($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $row['REQUESTNO'] ?></td>
                            <td><?php echo $row['CUSTNAME']?></td>
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