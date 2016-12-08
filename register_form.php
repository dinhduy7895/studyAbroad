
<?php $title = 'Register'; ?>
<?php
    session_start(); 
    include('connect.php');
    $name=$fname=$lname=$email=$pass=$year=$phone=$nameErr="";
$check = 0;
    if(count($_POST) > 0) {
    $_SESSION['name'] = $_POST["name"];
    $_SESSION['firstname'] = $_POST['firstname'];
    $_SESSION['lastname'] = $_POST['lastname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['pass']= $_POST['pass'];
    $_SESSION['year'] = $_POST['year'];
    $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
        header("HTTP/1.1 303 See Other");
        header("Location: register_form.php");
        die();
    }
    else if (isset($_SESSION['email'])){
    $name = $_SESSION["name"];
    $fname = $_SESSION['firstname'];
    $lname = $_SESSION['lastname'];
    $email = $_SESSION['email'];
    $pass = $_SESSION['pass'];
    $year = $_SESSION['year'];
    $phone = $_SESSION['phoneNumber'];;
    if (empty($_SESSION["name"])) {
        $nameErr = "Name is required";
        $check = 1;
    } else {
        $name = $_SESSION["name"];
        if (!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
            $nameErr = "white space is not allowed";
            $check = 1;
        } else if ($name == 'admin') {
            $nameErr = "<span class='error'>Username is a reserved word</span>";
            $check = 1;
        }
        else{
            try{
                $stmt = $conn->prepare("Select count(*) from user where name= '$name' or email ='$email' ");
                $stmt->execute();
                $count = $stmt->fetchColumn(0);
            }
            catch(PDOException $e)
            {
                echo $stmt."<br>".$e->getMessage();
            }
            if($count >= 1){
                $nameErr = "Username or email has been exist ";
                $check = 1;
            }
        }
    }
    if($check==0){
        if($user->register($fname,$lname,$name,$email,$pass,$phone,$year))
        {
            $_SESSION['user_session'] = $name;
            header('Location: signupsuccess.php');
        }
        else {
            header('Location: index.php');
        }
    }
        session_unset();
        session_destroy();
    }
?>
<?php include 'header.php'; ?>
    <?php

    

?>
      
        
        <section id="main-content">
          <div class="top-title">
            <div class="container">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                 <li class="breadcrumb-item"><a href="#">Register</a></li>
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
              <form id="signupForm" method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">



                <div class="form-group">
                  <br/>
                  <label class="col-lg-2" for="firstname">First name</label>
                  <div class="col-lg-5">
                    <input value="<?php echo $fname ?>" type="text" id="firstname" class="form-control" name="firstname" placeholder="First name" />
                    <br/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2" for="lastname">Last name</label>
                  <div class="col-lg-5">
                    <input value="<?php echo $lname ?>" type="text" id="lastname" class="form-control" name="lastname" placeholder="last name" />
                    <br/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2" for="name">Username</label>
                  <div class="col-lg-5">
                    <input type="text" id="name" class="form-control" name="name" placeholder="Username" />
                    <br/>
                    <?php echo $nameErr; ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2" for="email">Email</label>
                  <div class="col-sm-5">
                    <input value="<?php echo $email ?>" type="email" id="email" class="form-control" name="email" placeholder="Email" />
                    <br/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2" for="pass">Password</label>
                  <div class="col-sm-5">
                    <input value="<?php echo $pass ?>" type="password" id="pass" class="form-control" name="pass" placeholder="your password" />
                    <br/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2" for="year">Year old</label>
                  <div class="col-sm-5">
                    <input value="<?php echo $year ?>" type="text" id="year" class="form-control" name="year" placeholder="year name" />
                    <br/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label" style="text-align: left;">Phone number</label>
                  <div class="col-lg-5">
                    <input value="<?php echo $phone ?>" type="tel" class="form-control" name="phoneNumber" placeholder="+841234567" />
                  </div>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="check"> <span style="font-weight:bold;"> Comfirm </span>
                    <br>
                  </label>
                  <br/>
                  <br/>
                </div>
                <input type="submit" name="submit" value="OK">
                <br/>
                <br/>
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
            <div class="col-lg-3 col-md-3">
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
            <div class="col-lg-3 col-md-3" id="social-icon">

              <h2>Follow Us</h2>

              <div class="content">
                <ul>
                  <li>
                    <a href="http://www.facebook.com/uasaem" style="padding: 8px 14px 8px 14px;">
                      <i class="fa fa-facebook" style="height:31px; "></i>
                    </a>
                  </li>
                  <li>
                    <a href="http://twitter.com/UA_SAEM_AISS" style="padding: 8px 9px 8px 11px;">
                      <i class="fa fa-twitter" style="height:31px; "></i>
                    </a>
                  </li>
                  <li>
                    <a href="http://instagram.com/ua_saem_aiss" style="padding: 8px 10px 8px 11px;">
                      <i class="fa fa-instagram" style="height:31px; 	"></i>
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

  </body>

  </html>