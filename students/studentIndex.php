<?php
if(isset($_GET['mesage'])){
            $message = $_GET['message'];
            echo "<script type='text/javascript'>alert('$message');</script>";
}
elseif((isset($_GET['passCode']) && isset($_GET['contactEmail'])) || (isset($_POST['passCode']) && isset($_POST['contactEmail']))){
/****************************************Form for registering student  with passCode and email passed in url***********************/
    
    include 'autoRegister.php';
    
}else{
            $message = 'verification code or email not received, Try to use the link in your email again, or contact us for help with this issue';
            echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
