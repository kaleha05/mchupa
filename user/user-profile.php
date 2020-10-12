<?php 
    include('getuserprofile.php');
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
                            <a href="user-dashboard.php">Home</a>
                            <a href="req-collection.php">Request Collection</a>
                            <a href="../pages/log-out.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-container">
                <h4>Your profile</h4>
                <table>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $name; ?></td>
                    </tr>
                    <tr>
                        <th>Organization type</th>
                        <td><?php echo $org; ?></td>
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
                        <td><a href="password.php">Change password</a></td>
                    </tr>
                    <tr>
                        <th>Recycling company</th>
                        <td><a href="getcompanies.php">Change recycling company</a></td>
                    </tr>
                </table>
            </div>
            <div id="space"></div>
        </div>
    </body>
</html>