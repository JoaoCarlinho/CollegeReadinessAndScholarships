<?php  /****   newGroup.php *****************************************************************************************/
//If all these are set, enter them into the database and go to registered.php

if(isset($_POST['groupCount'])){
    $groupCount = $_POST['groupCount'];
}else{
    $groupCount = 'field left blank';
}


if(isset($_POST['contactFirstName'])){
    $contactFirstName = $_POST['contactFirstName'];
}else{
    $contactFirstName = 'field left blank';
}

if(isset($_POST['contactLastName'])){
    $contactLastName = $_POST['contactLastName'];
}else{
    $contactLastName = 'field left blank';
}

if(isset($_POST['contactEmail'])){
    $contactEmail = $_POST['contactEmail'];
}else{
    $contactEmail = 'invalidEmail';
}

if(isset($_POST['contactMobile'])){
    $contactMobile = $_POST['contactMobile'];
}else{
    $contactMobile = '3';
}

if(isset($_POST['affiliateType'])){
    $affiliateType = $_POST['affiliateType'];
}else{
    $affiliateType = 'field left blank';
}

if(isset($_POST['affiliateName'])){
    $affiliateName = $_POST['affiliateName'];
}else{
    $affiliateName = 'field left blank';
}

if(isset($_POST['affiliateCity'])){
    $affiliateCity = $_POST['affiliateCity'];
}else{
    $affiliateCity = 'field left blank';
}

if(isset($_POST['affiliateState'])){
    $affiliateState = $_POST['affiliateState'];
}else{
    $affiliateState = 'Ohio';
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
                           <center>Parent Registration confirmation</center>                            
                </div>
                <center>
                <div>
                                        <?php
                    echo( 'Creating group for '.$contactFirstName.' '.$contactLastName.'<br/>
                    Number of Students:'.$groupCount.'<br/>
                    Email:'.$contactEmail.'<br/>
                    Mobile: '.$contactMobile.'<br/>
                    Representing: '.$affiliateName.' '.$affiliateType.'<br/>
                    From: '.$affiliateCity.' '.$affiliateState.'<br/><br/>');
                    
                    echo('Confirm new group info before submission<br/>
                          If you are redirected to the previous page<br/>
                          You have entered an invalid email address<br/>');
?>
                            <a href="registered.php?groupCount=<?php echo $groupCount ?>&contactFirstName=<?php echo $contactFirstName ?>&contactLastName=<?php echo $contactLastName ?>&contactEmail=<?php echo $contactEmail ?>&contactMobile=<?php echo $contactMobile ?>&affiliateType=<?php echo $affiliateType ?>&affiliateName=<?php echo $affiliateName ?>
                            &affiliateCity=<?php echo $affiliateCity ?>&affiliateState=<?php echo $affiliateState ?>"><button type="button ">Submit Registration</button></a>
                </div>
                        <div>
                            <a href="/" ><button type="button ">Cancel</button></a>
                        </div>
                </center>
                
                <br/>
                <br/>
                <?php include '../footer.php'; ?>
        </div>
    </body>
</html>