<!DOCTYPE HTML>
<html>
<!--*******************************************stuCreation.php(student registration index)***********************************************************-->
    <?php include '../head.php';?>

    <body>
    
        <div class="page">
            <?php include'../appBar.php';?>
            <div id="exhibitor">
/****************************************make sure to include table of students already registered to prevent redundancy*****************/
                <div class="formBox">
                 <br/>
                           <center><font color="<?php echo($color) ?>"><?php echo($message) ?></font></center>                            
                </div>
                <center><form action="newStu.php" method="post">
                    <input type='hidden' name='contactEmail' value="<?php echo $contactEmail; ?>"/>
                    <input  type='hidden' name='passCode' value = "<?php echo $passCode; ?>"/> 
                    <input  type="text" name="studentFirstName" placeholder="Student First Name" required/>
                    <input  type="text" name="studentLastName" placeholder="Student Last Name"  required/>
                    <p>Grade Level</p>
                     <div class="styledSelect">
                        <select id="gradeLevel" name="gradeLevel">    
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>     
                        </select>
                    </div><br/>
                    <input  type="email" name="studentEmail" placeholder="Student Email"  required/> 
                    <p>10 digit number without dashes(xxxxxxxxxx)</p>
                    <input  type="number" size"10" name="studentMobile" placeholder="Student Mobile" required/>  
                    <br/><br/>
                    <input type="submit" value="Submit" />
                </form></center>
                <br/>
                <br/>
                <?php include '../footer.php'; ?>
            </div>
        </div>
    </body>
</html>