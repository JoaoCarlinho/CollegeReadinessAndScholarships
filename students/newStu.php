<?php  /****   newStudent.php *****************************************************************************************/
//If all these are set, enter them into the database and go to registered.php

if(isset($_POST['contactEmail'])){
    $contactEmail = $_POST['contactEmail'];
}else{
    $contactEmail = 'field left blank';
}

if(isset($_POST['passCode'])){
    $passCode = $_POST['passCode'];
}else{
    $passCode = 'field left blank';
}

if(isset($_POST['studentFirstName'])){
    $studentFirstName = $_POST['studentFirstName'];
}else{
    $studentFirstName = 'field left blank';
}


if(isset($_POST['studentLastName'])){
    $studentLastName = $_POST['studentLastName'];
}else{
    $studentLastName = 'field left blank';
}

if(isset($_POST['studentEmail'])){
    $studentEmail = $_POST['studentEmail'];
}else{
    $studentEmail = 'field left blank';
}

if(isset($_POST['gradeLevel'])){
    $gradeLevel = $_POST['gradeLevel'];
}else{
    $gradeLevel = 'field left blank';
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
                           <center>Student Registration confirmation</center>                            
                </div>
                <center>
                    <?php
                    echo(   'Adding student '.$studentFirstName.' '.$studentLastName.'<br/>
                            To group:'.$contactEmail.'<br/>
                            Student Email:'.$studentEmail.'<br/>
                            Grade Level: '.$gradeLevel.'<br/>'
                    );
                    
                    echo('Confirm new student info before submission<br/>');
                    ?>
                    <div>
                        <form action="registered.php" method="post">                       
                            <input  type="hidden" name="contactEmail" value="<?php echo $groupCount; ?>" />
                            <input  type="hidden" name="passCode" value="<?php echo $passCode; ?>" />
                            <input  type="hidden" name="studentFirstName" value="<?php echo $studentFirstName; ?>" />
                            <input  type="hidden" name="studentLastName" value="<?php echo $studentLastName; ?>" />
                            <input  type="hidden" name="studentEmail" value="<?php echo $studentEmail; ?>" />
                            <input  type="hidden" name="gradeLevel" value="<?php echo $gradeLevel; ?>" /> 
                            
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