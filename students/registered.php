<?php /****************************************registered.php    Student Registration Confirmation***********************************************************************************************************/
 require_once('connectDraft.php');
$db = connect();

/********************************************* Section for Tests before Inserting a new Group into the Directory***************************************************      **/
        if(isset($_GET['passCode']) && isset($_GET['studentFirstName']) && isset($_GET['studentLastName']) && isset($_GET['studentEmail'])&& isset($_GET['contactEmail']) && isset($_GET['gradeLevel'])){
            $passCode = $_GET['passCode'];
            $studentFirstName = $_GET['studentFirstName'];
            $studentLastName = $_GET['studentLastName'];
            $studentEmail = $_GET['studentEmail'];
            $contactEmail = $_GET['contactEmail'];
            $gradeLevel = $_GET['gradeLevel'];
            $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
            
            if(!preg_match($email_exp,$contactEmail)) {
    			$message = 'You were redirected due to submission of an invalid email <br/> 
                                    Retrieve passCode from your email to continue registering your child';
                header("Location: index.php?message=$message");
  		}

/***************************************determine if there is an group stored with same passCode and contactEmail*******************************************/
/*************************          Extract group id from groups table and use it to store in student table *********************************/      
        $query = $db->prepare("SELECT * FROM groups WHERE contactEmail = '$contactEmail' AND passCode = '$passCode'") or die("could not search groups");
            $query->execute();
            $row = $query->fetchAll(PDO::FETCH_ASSOC);
            $count = count($row);
            //read each returned item's info
             foreach($row as $info){
	        //put items into a basket for use today    
	            $groupID=$info['groupID'];;
             } 
        
        if($count == 0){
                //group is not authenticated, Return to studentCreation w/ message  
            $message = 'Submitted Parent email:'.$contactEmail.' and password: '.$passCode.' do not match!';
            header("Location: index.php?message=$message");
        }else{

        
        //add new student to group and send email confirmations
         $query = $db->prepare("INSERT INTO students (groupID, studentFirstName, studentLastName, studentEmail, gradeLevel) VALUES( ?, ?, ?, ?, ?)") or die("could not search");
             $query->execute(array($groupID, $studentFirstName, $studentLastName, $studentEmail, $gradeLevel));

                $db = null;?>            
            
            <!DOCTYPE HTML>
<html>
    <!--*******************************************gc.php(registration index)***********************************************************-->
    <?php include '../head.php';?>

    <body>
    
        <div class="page">
            <?php include'../topBar.php';?>
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
                                    
<center><a href="/students/index.php?passCode=<?php echo $passCode ?>&contactEmail=<?php echo $contactEmail ?>"><button type="button">Register another Child</button></a></center>
<br/>
<br/>
                <br/>
                <br/>
                <?php include '../footer.php'; ?>
            </div>
        </div>
    </body>
</html>
  
                

<?php

/***************************************Email confirmation with passCode**************************************/  
            $email_from = "FreeRidetoCollege@gmail.com";
    		$email_subject = "Plan Your Life: Youth Career Expo registration confirmation";
 		    $email_to=$contactEmail .",". $email_from;
 
    		$comments = "Congratulations!\n
 You have successfully registered your student: ". $studentFirstName ." ". $studentLastName ."
 for the Plan Your Life: Youth Career Expo.\n";
    
    		$error_message = "";
 
    		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  		if(!preg_match($email_exp,$contactEmail)) {
    			$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  		}
 
    		
  		if(strlen($error_message) > 0) {die($error_message);}
 
 
    		function clean_string($string) {
      			$bad = array("content-type","bcc:","to:","cc:","href");
      			return str_replace($bad,"",$string);
    		}
 
    		$email_message = clean_string($comments)."\n";
 
		// create email headers
 
		$headers = 'From: '. $email_from ."\r\n".
 
		'Reply-To: '. $email_from ."\r\n" .
 
		'X-Mailer: PHP/' . phpversion();
 
		mail($email_to, $email_subject, $email_message, $headers);
            
            
        }
}else{
   /****************************************************** If all information not submitted properly*******/
            $message = 'Please ensure all requested info is submitted!';
            header("Location: index.php?message=$message");
}


/**include('groupList.php');**/
?>