<?php $title = 'Login'; 
session_start(); 
?>
<?php

 
   require_once 'functions/connect.php';

  if(count($_POST)>0)
  {
    $_SESSION['Name'] = $_POST['Name'];
    $_SESSION['Pass'] = $_POST['pass'];
     header("HTTP/1.1 303 See Other");
    header("Location: login_form.php");
    die();
  } else if(isset($_SESSION['Name'])){
    $uname = $_SESSION['Name'];
    $umail = $_SESSION['Name'];
    $upass = $_SESSION['Pass'];
    unset($_SESSION['Name']);
     unset($_SESSION['Pass']);
    $upass = md5($upass);
    if($user->login($uname,$umail,$upass))
    {
      $_SESSION['user_session'] = $uname;
      if ($uname == 'admin') {
        $user->redirect('/admin/news.php');
      } else $user->redirect('index.php');
    }
    else
    {
      $error = "Wrong Details !fa";
    } 
  }
?>
  <?php include 'inc/header.php'; ?>
  <section id="main-content">
    <div class="top-title">
      <div class="container">
      </div>
    </div>
    <div class="container">
      <div class="clearfix"><br/></div>
      <div class="main-content container">
        <form method="post" class="form-horizontal form-login col-lg-offset-4">
            <div class=" center">
              <img src="img/avatar.png" alt="#" class="center avatar " >
            </div>
            <?php
            if(isset($error))
            {
            ?>
                <div class="alert alert-danger">
                    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
            <?php } ?>
            <div class="input-group login col-lg-offset-2">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="name" type="text" class="form-control " name="Name" value="" placeholder="Email or Username">                                        
            </div>

            <div class="input-group login col-lg-offset-2">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="pass" value="" placeholder="Password">                                        
            </div>

            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block btn-signin col-lg-offset-2">Login</button>
            
          </form>
      </div>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>

