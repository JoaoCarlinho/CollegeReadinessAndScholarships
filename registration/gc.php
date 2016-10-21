<!DOCTYPE HTML>
<html>
<!--*******************************************gc.php(registration index)***********************************************************-->
    <?php include '../head.php';?>

    <body>
    
        <div class="page">
            <?php include'../topBar.php';?>
            <div id="exhibitor">
                <article>
                 <br/><br/>
                   <?php if(isset($_POST['message'])){
                           $message = $_POST['message'];?>
                           <center><?php echo ( $message );?></center><?php
                        }else{?>
                                <center> 
                                <?php      echo("Chaperone information entered here <br/>
                                            Student information entered in step 2<br/>
                                            If you are re-directed here, <br/>
                                            You may be entering a duplicate email<br/>
                                            or invalid info in each cell" );
                              }?>
                                </center>
                                
                </article>
                <center><form action="newGroup.php" method="post">                       
                    <input  type="number" name="groupCount" placeholder="number of students" autocomplete="off" required/><br/>
                    <input  type="text" name="contactFirstName" placeholder="Contact First name" autocomplete="off" required/><br/> 
                    <input  type="text" name="contactLastName" placeholder="Contact Last name" autocomplete="off" required/><br/> 
                    <input  type="email" name="contactEmail" placeholder="Contact Email" autocomplete="off" required/><br/>
                    <p>10 digit number without dashes(xxxxxxxxxx)</p>
                    <input  type="number" size"10" name="contactMobile" placeholder="Contact Mobile Phone" required/><br/>  
                    <p>Type of School</p>
                    <div class="styledSelect">
                        <select id="affiliateType" name="affiliateType">
                            <option value="Middle School">Middle School</option>
                            <option value="High School">High School</option>
                            <option value="Other">Other</option>
                        </select>
                    </div><br/>
                    <input  type="text" name="affiliateName" placeholder="School Name" autocomplete="off"/><br/>
                    <input  type="text" name="affiliateCity" placeholder="Home City" autocomplete="off"/><br/>
                    <p>Home State</p>
                    <div class="styledSelect">
                        <select id="affiliateState" name="affiliateState">
                        <option value="AL">Alabama</option>
                        	<option value="AK">Alaska</option>
                        	<option value="AZ">Arizona</option>
                        	<option value="AR">Arkansas</option>
                        	<option value="CA">California</option>
                        	<option value="CO">Colorado</option>
                        	<option value="CT">Connecticut</option>
                        	<option value="DE">Delaware</option>
                        	<option value="DC">District Of Columbia</option>
                        	<option value="FL">Florida</option>
                        	<option value="GA">Georgia</option>
                        	<option value="HI">Hawaii</option>
                        	<option value="ID">Idaho</option>
                        	<option value="IL">Illinois</option>
                        	<option value="IN">Indiana</option>
                        	<option value="IA">Iowa</option>
                        	<option value="KS">Kansas</option>
                        	<option value="KY">Kentucky</option>
                        	<option value="LA">Louisiana</option>
                        	<option value="ME">Maine</option>
                        	<option value="MD">Maryland</option>
                        	<option value="MA">Massachusetts</option>
                        	<option value="MI">Michigan</option>
                        	<option value="MN">Minnesota</option>
                        	<option value="MS">Mississippi</option>
                        	<option value="MO">Missouri</option>
                        	<option value="MT">Montana</option>
                        	<option value="NE">Nebraska</option>
                        	<option value="NV">Nevada</option>
                        	<option value="NH">New Hampshire</option>
                        	<option value="NJ">New Jersey</option>
                        	<option value="NM">New Mexico</option>
                        	<option value="NY">New York</option>
                        	<option value="NC">North Carolina</option>
                        	<option value="ND">North Dakota</option>
                        	<option value="OH">Ohio</option>
                        	<option value="OK">Oklahoma</option>
                        	<option value="OR">Oregon</option>
                        	<option value="PA">Pennsylvania</option>
                        	<option value="RI">Rhode Island</option>
                        	<option value="SC">South Carolina</option>
                        	<option value="SD">South Dakota</option>
                        	<option value="TN">Tennessee</option>
                        	<option value="TX">Texas</option>
                        	<option value="UT">Utah</option>
                        	<option value="VT">Vermont</option>
                        	<option value="VA">Virginia</option>
                        	<option value="WA">Washington</option>
                        	<option value="WV">West Virginia</option>
                        	<option value="WI">Wisconsin</option>
                        	<option value="WY">Wyoming</option>
                        </select>
                    </div><br/><br/>
                    <input type="submit" value="Submit" />
                </form></center>
                <br/>
                <br/>
                <?php include '../footer.php'; ?>
            </div>
        </div>
    </body>
</html>