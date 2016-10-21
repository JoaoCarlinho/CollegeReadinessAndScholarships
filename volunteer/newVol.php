<?php  /****   newVolunteer.php *****************************************************************************************/
//If all these are set, enter them into the database and go to registered.php

if(isset($_POST['volunteerEmail'])){
    $volunteerEmail = $_POST['volunteerEmail'];
}else{
    $volunteerEmail = 'field left blank';
}

if(isset($_POST['volunteerMobile'])){
    $volunteerMobile = $_POST['volunteerMobile'];
}else{
    $volunteerMobile = 'field left blank';
}

if(isset($_POST['volunteerFirstName'])){
    $volunteerFirstName = $_POST['volunteerFirstName'];
}else{
    $volunteerFirstName = 'field left blank';
}


if(isset($_POST['volunteerLastName'])){
    $volunteerLastName = $_POST['volunteerLastName'];
}else{
    $volunteerLastName = 'field left blank';
}


?>
<!DOCTYPE HTML>
<html>
    <!--*******************************************gc.php(registration index)***********************************************************-->
    <?php include '../head.php';?>

    <body>
    
        <div class="page">
            <?php include'../topBar.php';?>
            <div style="margin: 80px auto 0 auto;">
             <br/>
                       <center>Volunteer Registration confirmation</center>                            
            </div>
            <center>
            <?php
            echo( 'Creating volunteer:<br>'
            .$volunteerFirstName.'<br>'
            .$volunteerLastName.'<br>'
            .$volunteerEmail.'<br>'
            .$volunteerMobile.'<br>'
            );
            
            echo('Confirm new group info before submission<br/>
                  If you are redirected to the previous page<br/>
                  You have entered an invalid email address<br/>');            
            ?>

            <div>
                <a href="registered.php?volunteerMobile=<?php echo $volunteerMobile ?>&volunteerEmail=<?php echo $volunteerEmail ?>&volunteerFirstName=<?php echo $volunteerFirstName ?>&volunteerLastName=<?php echo $volunteerLastName ?>&volunteerEmail=<?php echo $volunteerEmail ?>&gradeLevel=<?php echo $gradeLevel ?>">
                    <button type="button ">Submit Registration</button>
                </a>
            </div>
            <div>
                <a href="index.php" ><button type="button ">Cancel</button></a>
            </div>
            </center>
            
            <br/>
            <br/>
            <?php include '../footer.php'; ?>
            
        </div>
    </body>
</html>