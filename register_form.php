<?php $title = 'Register'; 
?>
<?php
  session_start();
  include('functions/connect.php');
  require_once 'lib/sendmail/lib/swift_required.php';
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
                // goi email kich hoat
                $maKichHoat = md5($name);
                $stmt1 = $conn->prepare("INSERT INTO kichhoat(Name, MaKichHoat) VALUES (:name,:maKichHoat)");
                $stmt1->bindparam(":name",$name);
                $stmt1->bindparam(":maKichHoat",$maKichHoat);
                $stmt1->execute();
                $stmt->execute();
                $to = $email;
                $subject = "Kich hoat tai khoan User";
                $message = "
                <html>
                <head>
                <title>Kich hoat tai khoan</title>
                </head>
                <body>
                <a href='http://localhost/studyAbroad/verify.php?name={$name}&maKichHoat={$maKichHoat}'><p>Kich vao link nay kich hoat tai khoan </p></a>
                <p> Username: ". $name."<br> Password: ". $pass ."
                </body>
                </html>
                ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <thanhbinh0995@gmail.com>' . "\r\n";
                $headers .= 'Cc: myboss@example.com' . "\r\n";

                mail($to,$subject,$message,$headers);



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
    <?php include 'inc/header.php'; ?>
      <section id="main-content">
        <div class="top-title">
          <div class="container">

          </div>
        </div>
        <div class="container wrapper">
          <div class="main-content ">
            <form id="signupForm" method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div class="col-lg-12">
                <div class="top-main-content center ">
                  <span class=" title " style="font-size:30px;">REGISTRATION</span>
              </div>
              </div>
              
              <div class="col-lg-6">
                <div class="form-group">
               
                  <div class="col-lg-12">
                    <input value="<?php echo $fname ?>" type="text" id="firstname" class="form-control" name="firstname" placeholder="First name" />
                    <br/>
                  </div>
                </div>
                <div class="form-group">

                  <div class="col-lg-12">
                    <input value="<?php echo $lname ?>" type="text" id="lastname" class="form-control" name="lastname" placeholder="last name" />
                    <br/>
                  </div>
                </div>
                <div class="form-group">

                  <div class="col-lg-12">
                    <input type="text" id="name" class="form-control" name="name" placeholder="Username" />
                    <br/>
                    <?php echo $nameErr; ?>
                  </div>
                </div>
                <div class="form-group">

                  <div class="col-lg-12">
                    <input value="<?php echo $email ?>" type="email" id="email" class="form-control" name="email" placeholder="Email" />
                    <br/>
                  </div>
            
                </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">

              <div class="col-lg-12">
                <input value="<?php echo $pass ?>" type="password" id="pass" class="form-control" name="pass" placeholder="your password" />
                <br/>
              </div>
            </div>
            <div class="form-group">

              <div class="col-lg-12">
                <input value="<?php echo $year ?>" type="text" id="year" class="form-control" name="year" placeholder="year name" />          
                <br/>
              </div>
            </div>
            <div class="form-group">

              <div class="col-lg-12">
                <input value="<?php echo $phone ?>" type="tel" class="form-control" name="phoneNumber" placeholder="+841234567" />
                <br/>
              </div>
            </div>
            <div class="checkboxx form-group col-lg-12">
              <label>
                <input type="checkbox" name="check"> <span style="font-weight:bold;"> Comfirm </span>
                <br>
              </label>
              <br/>
              <br/>
            </div>
          </div>
          <div class="register col-lg-12">
            <input type="submit" class="  btn btn-lg btn-primary btn-block btn-signin" name="submit" value="Register">
          </div>
          <br/>
          <br/>
          </form>
        </div>
        </div>
      </section>
      <?php include 'inc/footer.php' ?>