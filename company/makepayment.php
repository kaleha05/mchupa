<?php
    include('getcompanyprofile.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="../styles/new.css" type="text/css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    </head>
    <body>
        <h3>Make a payment</h3>
        <div class="sign-up">
            <div class="leftsignup">
                <form action="pay.php" method="post">
                    <p>Enter the amount</p>
                    <input type="number" name="amt" class="rounded" required style="width:30%;"><br>
                    <p>Choose a company</p>
                    <select class="rounded" name="custid" required style="width:30%;">
                        <option disabled selected value> -- select a company -- </option>
                        <?php
                        include('../pages/connect.php');
                            $query = mysqli_query($conn,"SELECT * FROM to_be_paid WHERE COMPANY_ID='$id'");
                            $rows = array(); 
                            $n=0;
                            while($result = mysqli_fetch_array($query)){
                        ?> 
                            <option value="<?php echo $result['CUSTOMER_ID']?>"><?php echo $result['CUSTNAME']?></option>
                        <?php } ?>
                    </select><br>
                    <input class="rounded" type="submit" value="Submit" style="margin-left:20%;">
                </form>
            </div>
            <div class="rightsignup"></div>
        </div>
        <script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="checkForm.js"></script>
    </body>
</html>