<!DOCTYPE HTML>
<html>

    <?php include '../head.php';?>

    <body>
    
        <div class="page">
        <div id="exhibitor">
            <article> 
               <center><br/><br/>Register your students<br/>
            </article>
            <center><form action="newGroup.php" method="post">                       
                <p>Registration type</p>
                <!-- need to create sourced selector for registration type -->
                <div class="styledSelect">
                    <select id="registrationType" name="registrationType">
                          <option value="family">Family</option>
                          <option value="club_organization">Student Organization</option>
                    </select>
                </div><br/>
                <input  type="text" name="groupCount" placeholder="number of guests" autocomplete="off" required/><br/>
                <input  type="text" name="firstname" placeholder="Contact First name" autocomplete="off" required/><br/> 
                <input  type="text" name="lastname" placeholder="Contact Last name" autocomplete="off" required/><br/> 
                <input  type="text" name="groupEmail" placeholder="Contact Email" autocomplete="off" required/><br/>
                <input  type="text" name="groupMobile" placeholder="Contact Mobile Phone" required/><br/>  
                <p>Select type of affiliation type for group </p>
                <div class="styledSelect">
                    <select id="affiliationType" name="affiliationType">
                        <option value="1">Middle School</option>
                        <option value="2">High School</option>
                        <option value="3">Other</option>
                    </select>
                </div><br/>
                <input  type="text" name="affiliateName" placeholder="Affiliate Organization Name" autocomplete="off"/><br/>
                <input  type="text" name="affiliateCity" placeholder="Affiliate Organization City" autocomplete="off"/><br/>
                <input  type="text" name="affiliateState" placeholder="Affiliate Organization State" autocomplete="off"/><br/>
                <input type="button" nane="submit" value="Submit" />
            </form></center>        
        </div>
               
            <?php include('../draftBar.php'); ?>
            
            
        </div>
    </body>
</html>