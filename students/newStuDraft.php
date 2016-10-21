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
            <?php include'../topBar.php';?>
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
                        <a href="registeredDraft.php?passCode=<?php echo $passCode ?>&contactEmail=<?php echo $contactEmail ?>&studentFirstName=<?php echo $studentFirstName ?>&studentLastName=<?php echo $studentLastName ?>&studentEmail=<?php echo $studentEmail ?>&gradeLevel=<?php echo $gradeLevel ?>">
                            <button type="button ">Submit Registration</button>
                        </a>
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