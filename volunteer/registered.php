<?php /****************************************registered.php    Volunteer Registration Confirmation***********************************************************************************************************/
 require_once('connectDraft.php');
$db = connect();

/********************************************* Section for Tests before Inserting a new volunteer into the Directory***************************************************      **/
        if(isset($_GET['volunteerMobile']) && isset($_GET['volunteerFirstName']) && isset($_GET['volunteerLastName']) && isset($_GET['volunteerEmail'])){
            $volunteerMobile = $_GET['volunteerMobile'];
            $volunteerFirstName = $_GET['volunteerFirstName'];
            $volunteerLastName = $_GET['volunteerLastName'];
            $volunteerEmail = $_GET['volunteerEmail'];
            $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
            
            
            if(!preg_match($email_exp,$volunteerEmail)) {
    			$message = 'Please ensure all requested info is submitted!';
                header("Location: index.php?message=$message");
  		}
/***************************************determine if there is an volunteer stored with same volunteerEmail*******************************************/
        $query = $db->prepare("SELECT * FROM volunteers WHERE volunteerEmail = 'volunteerEmail' ") or die("could not search volunteers");
            $query->execute();
            $row = $query->fetchAll(PDO::FETCH_ASSOC);
            $count = count($row);
        
        if($count < 0){
                //email submitted is not unique, Return to volunteerCreation w/ message  
            $message = 'A registered volunteer is already using the email U submitted.';
            header("Location: index.php?message=$message");
        }else{

        
        //add new volunteer to directory and send email confirmation
         $query = $db->prepare("INSERT INTO volunteers (volunteerFirstName, volunteerLastName, volunteerEmail, volunteerMobile) VALUES( ?, ?, ?, ?)") or die("could not search");
             $query->execute(array( $volunteerFirstName, $volunteerLastName, $volunteerEmail, $volunteerMobile));

                $db = null;?>            
            
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
                           <center>Volunteer Registered!</center>                            
                </div>
                <center><?php
/***************************************Message for registration confirmation*******************************************/
                echo"Volunteer registration for ". $volunteerFirstName ." was successful<br/>
                 We thank you for your time and efforts in advance!<br/><br/>
                 We'd like our volunteers to gather at 8:00AM on the day of the event.<br/>
                 We will gather in the Knowlton School of Architecture<br/>
                 275 Woodruff Ave., 43210<br/>
                 We will be serving pizza at lunchtime for all of our registered guests and volunteers.\n
      	         If you have any general questions or concerns, please give us a call at<br/> 
      	         614-256-9488 or email us a FreeRidetoCollege@gmail.com.
                <br/><br/>"; ?></center>
                
                <br/>
                <br/>
                <?php include '../footer.php'; ?>
            </div>
        </div>
    </body>
</html>
  
                <center><a href="/index.php"><button type="button">Back to Home</button></a></center>
<?php


/***************************************Email confirmation with volunteerMobile*******************************************/        
            $email_from = "FreeRidetoCollege@gmail.com";
    		$email_subject = "Plan Your Life: Youth Career Expo registration confirmation";
 		    $email_to=$volunteerEmail .",". $email_from;
 
    		$comments = "Congratulations ". $volunteerFirstName ."!\n
You have successfully registered to volunteer for the Plan Your Life: Youth Career Expo.\n
We thank you for your time and efforts in advance! <br/><br/>
We'd like our volunteers to gather at 8:00AM on the day of the event. <br/>
We will gather in the Knowlton School of Architecture <br/>
275 Woodruff Ave., 43210 <br/>
We will be serving pizza at lunchtime for all of our registered guests and volunteers.\n
If you have any general questions or concerns, please give us a call at <br/> 
614-256-9488 or email us a FreeRidetoCollege@gmail.com.";
    
    		$error_message = "";
 
    		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  		if(!preg_match($email_exp,$volunteerEmail)) {
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
    /******************************************************* If all information not submitted properly*******/
            $message = 'Please ensure all requested info is submitted!';
            header("Location: index.php?message=$message");
}



/**include('groupList.php');**/
?>