
	<footer class="footer">
       
        <div class=" footer-link container">
            <div class="col-lg-5 col-md-5">

                <h2>Contact</h2>

                <div class="content">
                    <p>	DAI HOC BACH KHOA DA NANG
                    <br/> KHOA CONG NGHE THONG TIN
                    <br/> Tel: (84-511) 3736 949
                    <br/> Fax: (84-511) 3842 771
					<br/> Email: cntt@dut.udn.vn</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-3 col-lg-offset-4" id ="social-icon">

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