<?php /****************************************registered.php    Student Registration Confirmation***********************************************************************************************************/
 require('connect.php');
$db = connect();

/********************************************* Section for Tests before Inserting a new Student into the Directory***************************************************      **/
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

/***************************************Make sure email submitted for student isn't already in use*****************/        
            $query = $db->prepare("SELECT studentID FROM studetns WHERE studentEmail = '$studentEmail'") or die("could not search groups");
            $query->execute();
            $row = $query->fetchAll(PDO::FETCH_ASSOC);
            $count = count($row);
            //read each returned item's info
             foreach($row as $info){
	        //put items into a basket for use today    
	            $repeat=$info['studentEmail'];;
             } 
             
             if($count > 0){
                //a student already registered with this email address  
                $message = 'A student has already registered with the email you submitted!';
                header("Location: index.php?message=$message");
                }else{
       
       
                    //add new student to group and send email confirmations
                     $query = $db->prepare("INSERT INTO students (groupID, studentFirstName, studentLastName, studentEmail, gradeLevel) VALUES( ?, ?, ?, ?, ?)") or die("could not search");
                         $query->execute(array($groupID, $studentFirstName, $studentLastName, $studentEmail, $gradeLevel));
                }
                            $db = null;
                            
                include('studentRegisteredView.php');

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