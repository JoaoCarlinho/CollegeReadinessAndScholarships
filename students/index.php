<?php
if(isset($_GET['passCode']) && isset($_GET['contactEmail'])){
/****************************************Form for registering student  with passCode and email passed in url***********************/
    
    include 'autoRegister.php';
    
}else{

/****************************************Form for entering student when returning to site with passCode and email entered manually***********************/
    include 'manualRegister.php';

} ?>
