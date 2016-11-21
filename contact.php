
<?php
session_start();
$title = 'Contact';
?>
<?php include("header.php") ?>
<?php
	include('connect.php');
	// if(!$user->is_loggedin()){
	// 	header("Location: home.html");
	// }
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$from = $_POST["aidFrom"];
		$to = $_POST["aidTo"];
		$startYear = $_POST["startYear"];
		$numYear = $_POST["numYear"];
		$country = $_POST["country"];
		$opinion = $_POST["opinion"];
		$name = $_SESSION['user_session'];
		if($user->contact($name,$from,$to,$startYear,$numYear,$country,$opinion)){
			header('Location: contactsuccess.php');
		}
		else{
			  header('Location: index.php');
		}
	}
?>
	<section id="main-content">
		<div class="top-title">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				</ol>
			</div>
		</div>
		<div class="container">
			<div class="top-main-content">
				<span class="col-lg-10" style="font-size:30px;">New And Innovative market opportunities</span>
				<span class="" style="font-size:20px">Published on 2016/10/17</span>
			</div>
			<div class="clearfix"></div>
			<div class="main-content container">
				<form id="contactForm" method="post" class="form-horizontal" action="">
				<div class="form-group">
					<label class="col-lg-2" for="aid">Tuition aid expectation:</label>
					<div class="col-lg-5">
						<!-- <input type="text" id="aid" class="form-control" name="aid" placeholder="aid" /><br/> -->
						<label for="aidFrom" class="aidFrom col-lg-2">From: </label>
						<input type="text" id="aidFrom" class="col-lg-2" name="aidFrom" placeholder="/year" />
						<label for="usd" class="usd col-lg-2">USD</label>
						<label for="aidTo" class="aidTo col-lg-2">To: </label>
						<input type="text" id="aidTo" class=" col-lg-2" name="aidTo" placeholder="/year" />
						<label for="usd" class="usd col-lg-2">USD</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2" for="date">StartDate</label>
					<div class="col-sm-5">
						<input type="text" class="date form-control" name="startYear" placeholder="start date" /><br/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2" for="date">Number Of Year</label>
					<div class="col-sm-5">
						<input type="text" class="date form-control" name="numYear" placeholder="Number of year" /><br/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2" for="country">Country</label>
					<div class="col-sm-5">
						<input type="text"  class="form-control" id="country" name="country" placeholder="country" /><br/>
					</div>
				</div>
					<div class="form-group">
					<label class="col-lg-2" for="country">Your Opinions</label>
					<div class="col-sm-5">
						<textarea class="form-control" name="opinion"  cols="30" rows="10" placeholder="What you want to suggest or have question for us"></textarea>
					</div>
				</div>
				<div class="checkbox">
					<label><input type="checkbox"> Comfirm</label>
					<br/>
					<br/>
				</div>
				<input type="submit" name="submit" value="OK"> <br/> <br/>
			</form>
			</div>
		</div>
	</section>
	<footer class="footer">
        <div class=" footer-link container">
            <div class="col-lg-3 col-md-3">

                <h2>Contact</h2>

                <div class="content">
                    <p>Administration Building, Room 401
                        <br/> The University of Arizona
                        <br/> Tucson, AZ USA 85721-0066
                        <br/> Phone: 520-621-3772
                        <br/> Fax: 520-621-3776</p>
                </div>
            </div>
            <div  class="col-lg-3 col-md-3">
                <h2>Areas</h2>
                <div class="content">
                    <ul class="menu">
                        <li class="first leaf"><a href="senior-vice-president-senior-vice-provost/message-senior-vice-president-and-senior-vice-provost.html">Senior Vice President &amp; Senior Vice Provost</a>
                        </li>
                        <li class="leaf"><a href="student-affairs.html">Student Affairs</a>
                        </li>
                        <li class="leaf"><a href="enrollment-management.html">Enrollment Management</a>
                        </li>
                        <li class="leaf"><a href="academic-initiatives.html">Academic Initiatives</a>
                        </li>
                        <li class="last leaf"><a href="student-success.html">Student Success</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <h2>Quick Links</h2>
                <div class="content">
                    <ul class="menu">
                        <li class="first leaf"><a href="uafinalssurvival.html">Finals Survival</a>
                        </li>
                        <li class="leaf"><a href="senior-vice-president-senior-vice-provost/policy-interactions-non-enrolled-minors.html">Minor Policy</a>
                        </li>
                        <li class="leaf"><a href="student-affairs/student-fees.html">Student Fees</a>
                        </li>
                        <li class="leaf"><a href="http://www.arizona.edu/apply">Apply</a>
                        </li>
                        <li class="last leaf"><a href="https://webauth.arizona.edu/webauth/login?service=http%3A%2F%2Fsaem-aiss.arizona.edu%2Fcas%3Fdestination%3Dnode%2F690" class="restricted">UA Online Co-Branding Resources</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3" id = "social-icon">

                <h2>Follow Us</h2>

                <div class="content" >
                    <ul >
                        <li>
                            <a href="http://www.facebook.com/uasaem" style="padding: 8px 14px 8px 14px;">
                            	<i class="fa fa-facebook"  style="height:31px; " ></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://twitter.com/UA_SAEM_AISS" style="padding: 8px 9px 8px 11px;">
                             	<i class="fa fa-twitter"  style="height:31px; " ></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://instagram.com/ua_saem_aiss" style="padding: 8px 10px 8px 11px;">
                            	<i class="fa fa-instagram"  style="height:31px; 	" ></i>
                            </a>
                        </li>
                    </ul>
                    <p><a class="blue-button" href="https://www.uafoundation.org/NetCommunity/donations/student-affairs-and-enrollment-management">Donate Now</a>
                    </p>
                </div>
            </div>
        </div>
        
      
        <div class="footertext container">
            <div class="region region-footer-text">
                <div id="block-block-1" class="block block-block">
                    <div class="content">
                        <p>Copyright 2016 | Arizona Board of Regents</p>
                    </div>
                </div>
            </div>
        </div>
<!--         
        <div class="footer-logo">
        	<img src="img/uamenu.png" alt="">
        </div> -->
    </footer>
</div>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/form_validation.js"></script>
	<script type="text/javascript" src="js/intlTelInput.min.js"></script>
	<script>
		$('.date').datepicker({dateFormat: 'dd-mm-yy'});
	</script>		
</body>
</html>