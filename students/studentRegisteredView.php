<!DOCTYPE HTML>
<html>
    <!--*******************************************gc.php(registration index)***********************************************************-->
    <?php include '../head.php';?>

    <body>
    
        <div class="page">
            <?php include'../appBar.php';?>
            <div id="exhibitor">
                <div style="margin: 80px auto 0 auto;">
                 <br/>
                           <center>Successful Student Registration!</center>                            
                </div>
                <center><?php
/***************************************Message for registration confirmation*******************************************/
                echo"You have registered a student under your name!<br/>
                 ". $studentFirstName ." ". $studentLastName . " is on the list!<br/>
          	If you have any general questions or concerns, please give us a call at<br/> 
          	614-256-9488 or email us a FreeRidetoCollege@gmail.com.
                <br/><br/>"; ?></center>
                
                <br/>
                <br/>
                                    
    <center>
        <form action="registered.php" method="post">                       
            <input  type="hidden" name="contactEmail" value="<?php echo $groupCount; ?>" />
            <input  type="hidden" name="passCode" value="<?php echo $passCode; ?>" />
            <input  type="hidden" name="studentFirstName" value="<?php echo $studentFirstName; ?>" />
            <input  type="hidden" name="studentLastName" value="<?php echo $studentLastName; ?>" />
            <input  type="hidden" name="studentEmail" value="<?php echo $studentEmail; ?>" />
            <input  type="hidden" name="gradeLevel" value="<?php echo $gradeLevel; ?>" /> 
            
            <input type="submit" value="Submit Registration">
        </form>
    <a href="/students/index.php?passCode=<?php echo $passCode ?>&contactEmail=<?php echo $contactEmail ?>"><button type="button">Register another Child</button></a>
    </center>
<br/>
<br/>
                <br/>
                <br/>
                <?php include '../footer.php'; ?>
            </div>
        </div>
    </body>
</html>