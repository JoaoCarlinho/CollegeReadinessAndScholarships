<?php /****************************************registered.php    Parent Registration Confirmation***********************************************************************************************************/
require_once('connectDraft.php');
$db = connect();

/********************************************* Section for Tests before Inserting a new group into the Directory***************************************************      **/
        if(isset($_GET['contactMobile']) && isset($_GET['contactFirstName']) && isset($_GET['contactLastName']) && isset($_GET['contactEmail']) && isset($_GET['groupCount']) && isset($_GET['affiliateType']) && isset($_GET['affiliateName']) && isset($_GET['affiliateCity']) && isset($_GET['affiliateState'])){
            $groupCount = $_GET['groupCount'];
            $contactFirstName = $_GET['contactFirstName'];
            $contactLastName = $_GET['contactLastName'];
            $contactMobile = $_GET['contactMobile'];
            $contactEmail = $_GET['contactEmail'];
            $affiliateType = $_GET['affiliateType'];
            $affiliateName = $_GET['affiliateName'];
            $affiliateCity = $_GET['affiliateCity'];
            $affiliateState = $_GET['affiliateState'];
            $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
            if(!preg_match($email_exp , $contactEmail)) {
    			$message = 'You were redirected because of an invalid email submission!';
                header("Location: index.php?message=$message");
            }else{
                    /***************************************determine if there is an group stored with same contactEmail*******************************************/
                            $query = $db->prepare("SELECT * FROM groups WHERE contactEmail = '$contactEmail' ") or die("could not search groups");
                                $query->execute();
                                $row = $query->fetchAll(PDO::FETCH_ASSOC);
                                $count = count($row);
                            
                            if($count != 0){
                                            //email submitted is not unique, Return to groupCreation w/ message  
                                            $message = 'A registered group is already using the email you submitted.';
                                            header("Location: index.php?message=$message");
                            }else{
                                        //create passCode
                                        $length = 10;
                                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                        $charactersLength = strlen($characters);
                                        $randomString = '';
                                        for ($i = 0; $i < $length; $i++) {
                                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                                        }
                            
                            //add new group to directory and send email confirmation
                             $query = $db->prepare("INSERT INTO groups (groupCount, contactFirstName, contactLastName, contactEmail, contactMobile, affiliateType, affiliateName, affiliateCity, affiliateState, passCode) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)") or die("could not search");
                                 $query->execute(array($groupCount, $contactFirstName, $contactLastName, $contactEmail, $contactMobile, $affiliateType, $affiliateName, $affiliateCity, $affiliateState, $randomString));
                    
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
                                               <center>Successful Parent Registration!</center>                            
                                    </div>
                                    <center><?php
                    /***************************************Message for registration confirmation*******************************************/
                                    echo"Congratulations " .$contactFirstName. "! <br/>
                                    
                                    Your registration code is " .$randomString. "<br/>
                                    
                                    Please keep this for student registration.<br/>
                                    
                                    You will receive a confirmation email with this passCode attached as well.<br/>
                                    
                                    Our students and young professionals are excited to meet and share with you!<br/>
                                    
                                    Check-in and breakfast will begin at 9:30 in the Knowlton School of Architecture.<br/>
                                    
                                    275 Woodruff Ave., 43210<br/>
                                    
                                    We will be serving pizza at lunchtime for all of our registered guests and volunteers.<br/>
                                    
                                    Parents must attend morning workshops.<br/>
                                    
                                    Parents may be excused at 11:30, and can return to pick up your child at 3:30.<br/>
                                    
                                    614-256-9488 or email us a FreeRidetoCollege@gmail.com.<br/>
                                    <br/><br/>"; ?></center>
                                    
                                    <br/>
                                    <br/>
                                    
<center><a href="/students/index.php?passCode=<?php echo $randomString ?>&contactEmail=<?php echo $contactEmail ?>"><button type="button">Register your Child</button></a></center>
<br/>
<br/>
                                    <?php include '../footer.php'; ?>
                                </div>
                            </div>
                        </body>
                    </html>
                    <?php
                    
                    
                    /***************************************Email confirmation with contactEmail*******************************************/        
                                $email_from = "FreeRidetoCollege@gmail.com";
                        		$email_subject = "Plan Your Life: Youth Career Expo registration confirmation";
                     		    $email_to = $contactEmail .",". $email_from;
                     
                        		$comments = "
Congratulations ".$contactFirstName."!

You have successfully registered forthe Plan Your Life: Youth Career Expo.
Your passcode is ".$randomString.".
Please use this passcode and visit www.planyourlifeexpo.com/students/ to register your students

Our students and young professionals are excited to meet and share with you!
The event will be held on the Ohio State University's main campus.
Check-in and breakfast will begin at 9:30 in the Knowlton School of Architecture.
275 Woodruff Ave. 43210

We will be serving pizza at lunchtime for all of our registered guests and volunteers.
Parents are expected to attend the morning workshop.
Parents may be excused at 11:30, and can return to pick up your child at 3:30.

Questions???  Call: 
Norma Richards at 614-256-3470 
or Vincent Johns at 614-554-9225
email: freeridetocollege@gmail.com
www.freeridetocollege.com";
                        
                        		$error_message = "";
                     
                        		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
                     
                      		if(!preg_match($email_exp,$contactEmail)) {
                        			$error_message .= 'The Email Address you entered does not appear to be valid.';
                      		}
                     
                        		
                      		if(strlen($error_message) > 0) {die($error_message);}
                     
                     
                        		function clean_string($string) {
                          			$bad = array("content-type","bcc:","to:","cc:","href");
                          			return str_replace($bad,"",$string);
                        		}
                     
                        		$email_message = clean_string($comments);
                     
                    		// create email headers
                     
                    		$headers = 'From: '. $email_from ."\r".
                     
                    		'Reply-To: '. $email_from ."\r" .
                     
                    		'X-Mailer: PHP/' . phpversion();
                     
                    		mail($email_to, $email_subject, $email_message, $headers);
                                
                            }
            }
}else{
    /******************************************************* If all information not submitted properly*******/
            $message = 'Please ensure all requested info is submitted!';
            header("Location: index.php?message=$message");
}



/**include('groupList.php');**/
?>