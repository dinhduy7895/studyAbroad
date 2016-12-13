
	<footer class="footer">
       
        <div class=" footer-link container">
            <div class="col-lg-3 col-md-3">

                <h2>Contact</h2>

                <div class="content">
                    <p> Administration Building, Room 401 </p>
                    <p> Da Nang University of Technology</p>
                    <p> Nguyen Luong Bang Street, Da Nang, Viet Nam</p>
                    <p> Phone: +84 05113 876331</p>
                </div>
            </div>
            <div  class="col-lg-3 col-md-3">
                <h2>Areas</h2>
                <div class="content">
                    <ul class="menu">
                        <li class="first leaf"><a href="#">Senior Vice President &amp; Senior Vice Provost</a>
                        </li>
                        <li class="leaf"><a href="#">Student Affairs</a>
                        </li>
                        <li class="leaf"><a href="#">Enrollment Management</a>
                        </li>
                        <li class="leaf"><a href="#">Academic Initiatives</a>
                        </li>
                        <li class="last leaf"><a href="#">Student Success</a>
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
            <div class="col-lg-3 col-md-3" id ="social-icon">

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
    <script src="lib/js/plugins/bootstrap.min.js"></script>
    <script type="text/javascript" src="lib/js/plugins/jquery-1.11.3.min.js"></script>
    <script src="lib/js/main.js"></script>
    <script type="text/javascript" src="lib/js/plugins/jquery.validate.min.js"></script>
    <script type="text/javascript" src="lib/js/plugins/jquery-ui.min.js"></script>
    <script type="text/javascript" src="lib/js/form_validation.js"></script>
    <script type="text/javascript" src="lib/js/plugins/intlTelInput.min.js"></script>
    <script>
    $.validator.addMethod('matches1', function(phoneNumber, element) {
        phoneNumber = phoneNumber.replace(/\s+/g, '');
        return this.optional(element) || phoneNumber.length == 10 || phoneNumber.length == 11 && phoneNumber.match(/^\d+$/);
        }, "nhap dung so dien thoai");
    </script>
    <script>
        $(document).ready( function () {
            $('#bootstrap-table').bdt();
        });
    </script>

    <script>
      function initMap() {
        var uluru = {lat: 16.075647, lng: 108.153662};
        var map = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 12,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCS-54UStijEqrHhffyq-LOC4cbOCCOrTg&callback=initMap">
    </script>

</body>
</html>
<?php ob_end_flush(); ?>