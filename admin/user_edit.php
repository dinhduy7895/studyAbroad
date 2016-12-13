<?php include('../functions/connect.php');
  include 'inc/header.php'; 
  if (isset($_SESSION['university'])) {
    header('Location: university.php');
  }
?>
<div class="wrapper">
  <?php include 'inc/sidebar.php'; ?>
  <div class="container-fluid">
   <?php include 'inc/navbar.php'; ?>
   <div class="row">
      <div class="col-xs-12">
         <h3 class="page-header">
            Dashboard <small>Dashboard and statistics</small>
         </h3>
         <?php
         $id = $_GET['id'];
          if (isset($_POST['submit'])) {
              $name = $_POST["name"];
              $fname = $_POST['firstname'];
              $lname = $_POST['lastname'];
              $email = $_POST['email'];
              $pass = $_POST['pass'];
              $year = $_POST['year'];
              $phone = $_POST['phoneNumber'];
              $upd = "UPDATE user SET Name='{$name}', Email='{$email}', Pass='{$pass}', FirstName='{$fname}', LastName='{$lname}',YearOld='{$year}',PhoneNumber='{$phone}' WHERE Id = {$id}";
              $q = $conn->query($upd);
              if($q){
                header("location: index.php?msg=Updated");exit();
              }else {
                header("location: index.php?msg=Error");exit();
              }
              header('location: index2.php');
          }
          ?>
      
        
        <section id="main-content">
          <div class="container">
            <div class="main-content container">
              <form id="signupForm" method="post" class="form-horizontal" action="">

                <?php
                  
                  $sql = "SELECT * FROM user where Id = {$id}";
                  $q = $conn->query($sql);
                  $q->setFetchMode(PDO::FETCH_ASSOC);
                 while ($row = $q->fetch()) {
                   $name = $row['Name'];
                   $email= $row['Email'];
                   $pass = $row['Pass'];
                   $fname = $row['FirstName'];
                   $lname = $row['LastName'];
                   $year = $row['YearOld'];
                   $phone = $row['PhoneNumber'];
                  ?>

                <div class="form-group">
                  <label class="col-lg-2" for="name">Username</label>
                  <div class="col-lg-5">
                    <input type="text" id="name" class="form-control" name="name" placeholder="Username" value="<?php echo $name;?>" required/>
                    <br/>
                    <?php echo $nameErr; ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2" for="email">Email</label>
                  <div class="col-sm-5">
                     <input type="text" id="email" class="form-control" name="email" placeholder="email" value="<?php echo $email;?>" required/>
                   
                    <br/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2" for="pass">Password</label>
                  <div class="col-sm-5">
                    <input value="<?php echo $pass ?>" type="password" id="pass" class="form-control" name="pass" placeholder="your password" required />
                    <br/>
                  </div>
                </div>
                <div class="form-group">
                  <br/>
                  <label class="col-lg-2" for="firstname">First name</label>
                  <div class="col-lg-5">
                    <input value="<?php echo $fname ?>" type="text" id="firstname" class="form-control" name="firstname" placeholder="First name" required/>
                    <br/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2" for="lastname">Last name</label>
                  <div class="col-lg-5">
                    <input value="<?php echo $lname ?>" type="text" id="lastname" class="form-control" name="lastname" placeholder="last name" required/>
                    <br/>
                  </div>
                </div>
          
                <div class="form-group">
                  <label class="col-lg-2" for="year">Year old</label>
                  <div class="col-sm-5">
                    <input value="<?php echo $year ?>" type="text" id="year" class="form-control" name="year" placeholder="year name" required/>
                    <br/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label" style="text-align: left;">Phone number</label>
                  <div class="col-lg-5">
                    <input value="<?php echo $phone ?>" type="tel" class="form-control" name="phoneNumber" placeholder="+841234567" required/>
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
                <?php } ?>
              </form>
            </div>
          </div>
        </section>
      </div>
       </div>
        </div> <!-- / .row -->
      </div>
<?php include 'inc/footer.php'; ?>