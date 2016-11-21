<?php $title = 'Login'; ?>
<?php include 'header.php'; ?>
<?php
  require_once 'connect.php';
  if($user->is_loggedin()!="")
  {
    $user->redirect('home.php');
  }

  if(isset($_POST['submit']))
  {
    $uname = $_POST['Name'];
    $umail = $_POST['Name'];
    $upass = $_POST['pass'];
    $upass = md5($upass);

    if($user->login($uname,$umail,$upass))
    {
      $_SESSION['user_session'] = $uname;
      $user->redirect('index.php');
    }
    else
    {
      $error = "Wrong Details !fa";
    } 
  }
?>

  <section id="main-content">
    <div class="top-title">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Login</li>
        </ol>
      </div>
    </div>
    <div class="container">
      <div class="clearfix"><br/></div>
      <div class="main-content container">
        <form method="post" class="form-horizontal">
            <?php
            if(isset($error))
            {
            ?>
                <div class="alert alert-danger">
                    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
            <?php } ?>
            <div class="form-group">
              <label class="col-lg-2" for="Name">Username</label>
              <div class="col-sm-5">
                <input type="text" id="Name" class="form-control" name="Name" placeholder="Name or Email" required />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2" for="pass">Password</label>
              <div class="col-sm-5">
                <input type="password" id="pass" class="form-control" name="pass" placeholder="your password" required />
              </div>
            </div>
            <input type="submit" name="submit" value="LOGIN"> <br/> <br/>
          </form>
      </div>
    </div>
  </section>
<?php include 'footer.php'; ?>

