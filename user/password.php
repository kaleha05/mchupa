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
                          <a href="../pages/log-out.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-container">
                <!--js not working!!-->
                <form action="changepass.php" method="post" name="changepass" onSubmit = "return checkForm(this)">
                    <h4>Change password</h4>
                    <p>Enter your current password</p>
                    <input type="password" class="rounded" name="oldpass" required>
                    <p>Enter new password</p>
                    <input type="password" class="rounded" name="pwd" required minlength="8">
                    <p class="note">*Password should contain at least one number, one lowercase and one uppercase letter</p>                   
                    <p>Confirm new password</p>
                    <input type="password" class="rounded" name="pwd1" required>
                    <input type="submit" value="Submit" class="rounded">
                </form>
            </div>
            <div id="space"></div>
        </div>
        <script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="checkForm.js"></script>
    </body>
</html>