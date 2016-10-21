<?php  /****   groupCreation.php *****************************************************************************************/
//If all these are set, enter them into the database and go to newGroup.php

if(isset($_GET['message'])){
    $message = $_GET['message'];
    $color = 'red';
}else{
    $message = 'Parent Registration';
    $color = 'black';
} ?>

<!DOCTYPE HTML>
<html>
<!--*******************************************gc.php(registration index)***********************************************************-->
    <?php include '../head.php';?>

    <body>
    
        <div class="page">
            <?php include'../appBar.php';?>
            <div id="exhibitor">
                <div class="formBox">
                 <br/>
                           <center><font color="<?php echo($color); ?>"><?php echo($message); ?></font></center>                            
                </div>
                <center><form action="newGroup.php" method="post">                       
                    <input  type="number" name="groupCount" placeholder="Number of Students" autocomplete="off" required/>
                    <input  type="text" name="contactFirstName" placeholder="First name" autocomplete="off" required/> 
                    <input  type="text" name="contactLastName" placeholder="Last name" autocomplete="off" required/> 
                    <input  type="email" name="contactEmail" placeholder="Email" autocomplete="off" required/>
                    <p>10 digit number without dashes(xxxxxxxxxx)</p>
                    <input  type="number" size"10" name="contactMobile" placeholder="Contact Mobile Phone" required/>  
                    <p>Schools Represented</p>
                    <input  type="text" name="affiliateName" placeholder="School Name" autocomplete="off"/>
                    <input  type="number" size"10"  name="zipCode" placeholder="Home City" autocomplete="off"/>
                    <input type="submit" value="Submit" />
                </form></center>
                <br/>
                <br/>
                <?php include '../footer.php'; ?>
            </div>
        </div>
    </body>
</html>