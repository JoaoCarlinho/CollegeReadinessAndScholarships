<!DOCTYPE HTML>
<html>
<!--*******************************************volCreation.php(volunteer registration index)***********************************************************-->
    <?php include '../head.php';?>

    <body>
    
        <div class="page">
            <?php include'../topBar.php';?>
            <div id="exhibitor">
                <div style="margin: 80px auto 0 auto;">
                 <br/>
                           <center>Volunteer Registration</center>
                                
                </div>
                <center><form action="newVol.php" method="post">
                    <br/>
                    <br/>
                    <input  type="text" name="volunteerFirstName" placeholder="Volunteer First Name" required/><br/>                       
                    <input  type="text" name="volunteerLastName" placeholder="Volunteer Last Name" required/><br/>
                    <input  type="email" name="volunteerEmail" placeholder="Parent Email"  required/><br/>
                    <input  type="number" name="volunteerMobile" placeholder="Mobile Number"  required/><br/>

                    <br/><br/>
                    <input type="submit" value="Submit" />
                </form></center>
                <br/>
                <br/>
                <?php include '../footer.php'; ?>
            </div>
        </div>
    </body>
</html>