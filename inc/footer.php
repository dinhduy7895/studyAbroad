
    <footer class="footer">
       
        <div class=" footer-link container">
            <div class="col-lg-4 col-md-4">
                <h2>Contact</h2>
                <div class="content">
                    <ul class="menu">
                        <li class="first leaf"><a href="http://www.dut.udn.vn/">DAI HOC BACH KHOA DA NANG</a>
                        </li>
                        <li class="leaf"><a href="http://www.dut.udn.vn/index.php?option=com_content&view=article&id=978:khoa-cong-ngh-thong-tin&catid=30:thong-tin">KHOA CONG NGHE THONG TIN</a>
                        </li>
                        <li class="leaf"><a href="#"><Pre>   Tel: (84-511) 3736 949</Pre></a>
                        </li>
                        <li class="leaf"><a href="#"><Pre>   Fax: (84-511) 3842 771</Pre>   </a>
                        </li>
                        <li class="last leaf"><a href="#"><Pre>   Email: cntt@dut.udn.vn</Pre></a>
                        </li>
                    </ul>
                </div>       
            </div>
            <div  class="col-lg-5 col-md-5">
                <h2>Information</h2>
                <div class="content">
                    <ul class="menu">
                        <li class="first leaf"><a href="#">Website Tuyen Sinh Du Hoc</a>
                        </li>
                        <li class="leaf"><a href="#"><Pre>  Made by: Nam Than Team </Pre> </a>
                        </li>
                        <li class="leaf"><a href="#"><Pre>   Tel: (84-511) 3789 946</Pre></a>
                        </li>
                        <li class="last leaf"><a href="#"><Pre>Email: namthanteam@gmail.com</Pre></a>
                        
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
                                <i class="fa fa-instagram"  style="height:31px;     " ></i>
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
                    <p>Copyright 2016 | Thuc Tap Cong Nhan</p>
                </div>
            </div>
        </div>
        
    </footer>
</div>  

   
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