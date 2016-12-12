
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
                        <li class="first leaf"><a href="#">Finals Survival</a>
                        </li>
                        <li class="leaf"><a href="#">Minor Policy</a>
                        </li>
                        <li class="leaf"><a href="#">Student Fees</a>
                        </li>
                        <li class="leaf"><a href="#">Apply</a>
                        </li>
                        <li class="last leaf"><a href="#" class="restricted">UA Online Co-Branding Resources</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3" id = "social-icon">

                <h2>Follow Us</h2>

                <div class="content" >
                    <ul >
                        <li>
                            <a href="#" style="padding: 8px 14px 8px 14px;">
                            	<i class="fa fa-facebook"  style="height:31px; " ></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" style="padding: 8px 9px 8px 11px;">
                             	<i class="fa fa-twitter"  style="height:31px; " ></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" style="padding: 8px 10px 8px 11px;">
                            	<i class="fa fa-instagram"  style="height:31px; 	" ></i>
                            </a>
                        </li>
                    </ul>
                    <p><a class="blue-button" href="#">Donate Now</a>
                    </p>
                </div>
            </div>
        </div>
        
      
        <div class="footertext ">
            <div class="region region-footer-text container">
                <div class="content-copy">
                    <p>Copyright 2016 | Arizona Board of Regents</p>
                </div>
            </div>
        </div>
        
    </footer>
</div>  
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/form_validation.js"></script>
    <script type="text/javascript" src="js/intlTelInput.min.js"></script>
    <script>
    $.validator.addMethod('matches1', function(phoneNumber, element) {
        phoneNumber = phoneNumber.replace(/\s+/g, '');
        return this.optional(element) || phoneNumber.length == 10 || phoneNumber.length == 11 && phoneNumber.match(/^\d+$/);
        }, "nhap dung so dien thoai");
    </script>
    <script src="js/vendor/jquery.sortelements.js" type="text/javascript"></script>
    <script src="js/jquery.bdt.min.js" type="text/javascript"></script>
    <script>
        $(document).ready( function () {
            $('#bootstrap-table').bdt();
        });
    </script>

</body>
</html>
<?php ob_end_flush(); ?>