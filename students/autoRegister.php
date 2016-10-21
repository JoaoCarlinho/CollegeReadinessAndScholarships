<?php
/***********************************Check database to ensure the passCode and email match what is stored.  
 * If not, don't display anything and suggest trying again or calling us for help***************************/
 if(isset($_GET['passCode'])){
     $passCode = $_GET['passCode'];
 } 
 if(isset($_GET['contactEmail'])){
     $contactEmail = $_GET['contactEmail'];
 }
 if(isset($_POST['passCode'])){
     $passCode = $_POST['passCode'];
 }
 if(isset($_POST['contactEmail'])){
     $userName = $_POST['contactEmail'];
 }

        include('connect.php');
        $db = connect();

        
        //Authenticate client for current session
        $query = $db->prepare("SELECT groupID, verified FROM groups WHERE email = '$userName' AND activationDigest = '$passCode' LIMIT 1") or die("could not check member");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $count = count($result);
        
        //verify user
        if($count == 1){
            foreach($result as $info){
                    $verified = $info['activated'];
            }
                if($verified == 0){
    /******************update activated for this group****************************************************/
                }
     /******************show student registration form****************************************************/
                 include 'studentRegistrationView.php';
                
        }else{
               $message = 'verification code and email combination do not match, Try to use the link in your email again, or contact us for help with this issue';
                echo "<script type='text/javascript'>alert('$message');</script>";
        }
?>