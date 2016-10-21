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

if(isset($_POST['affiliateName'])){
    $affiliateName = $_POST['affiliateName'];
}else{
    $affiliateName = 'field left blank';
}

if(isset($_POST['zipCode'])){
    $zipCode = $_POST['zipCode'];
}else{
    $zipCode = 'field left blank';
}

?>

<!DOCTYPE HTML>
<html>
    <!--*******************************************gc.php(registration index)***********************************************************-->
    <?php include '../head.php';?>

    <body>
    
        <div class="page">
            <?php include'../appBar.php';?>
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
                    Representing: '.$affiliateName.'<br/>
                    From: '.$zipCode.'<br/><br/>');
                    
                    echo('Confirm new group info before submission<br/>
                          If you are redirected to the previous page<br/>
                          You have entered an invalid email address<br/>');
?>
                            <form action="registered.php" method="post">                       
                                <input  type="hidden" name="groupCount" value="<?php echo $groupCount; ?>" />
                                <input  type="hidden" name="contactFirstName" value="<?php echo $ContactFirstName; ?>" /> 
                                <input  type="hidden" name="contactLastName" value="<?php echo $ContactLastName; ?>" /> 
                                <input  type="hidden" name="contactEmail" value="<?php echo $contactEmail; ?>"/>
                                <input  type="hidden" size"10" name="contactMobile" value="<?php echo $contactMobile; ?>"/>  
                                <input  type="hidden" name="affiliateName" value="<?php echo $affiliateName; ?>"/>
                                <input  type="hidden"  name="zipCode" value="<?php echo $zipCode; ?>"/>
                                
                                <input type="submit" value="Submit Registration">
                            </form>
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