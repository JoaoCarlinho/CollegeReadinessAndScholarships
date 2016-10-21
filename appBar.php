<!DOCTYPE HTML>
<html>
            <div class="appBar">
            <center>
                <ul class="appLink">
                    <li><a class="active" href="/">Home</a></li>
                <!--    <li><a class="hide" href="/about/">About</a></li>  -->
                    <li><a class="hide" href="/registration/">Registration</a></li>
                <!--<li><a class="hide" href="/checkIn/">Check In!</a></li> -->
                    <li><a class="hide" href="/volunteer/">Volunteers</a></li>
                    <li><a class="hide" href="/sponsor/">Sponsors</a></li>
                    <li><a class="hide" href="/exhibit.php">Exhibitors</a></li>
                    <li><a class="hide" href="/dayPlan.php">Itinerary</a></li>
                    <li class="icon">
                        <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
                    </li>
                </ul>
            </center>    
            </div>
</html>
<script type="text/javascript" src="global.js">
/* Toggle between adding and removing the "responsive" class to appLink when the user clicks on the icon */
function myFunction() {
    document.getElementsByClassName("appLink")[0].classList.toggle("responsive");
}

</script>