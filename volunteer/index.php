<!DOCTYPE HTML>
<html>
<!--*******************************************volCreation.php(volunteer registration index)***********************************************************-->
    <?php include '../head.php';?>

    <body>
    
        <div class="page">
            <?php include'../appBar.php';?>
            <div id="exhibitor">
                <div class="formBox">
                 <br/>
                           <center>Volunteer Registration</center>
                                
                </div>
                <center><form action="newVol.php" method="post">
                    <br/>
                    <input  type="text" name="volunteerFirstName" placeholder="First Name" required/>                       
                    <input  type="text" name="volunteerLastName" placeholder="Last Name" required/>
                    <input  type="email" name="volunteerEmail" placeholder="Email"  required/>
                    <input  type="number" name="volunteerMobile" placeholder="Mobile Number"  required/>

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