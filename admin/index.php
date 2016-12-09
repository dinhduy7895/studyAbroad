<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
      Admin
    </title>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css" />
</head>
<body>

<form method = "post" >
  <h1>Administrator Log in</h1>
  <div class="inset">
  <p>
    <label for="email">USERNAME</label>
    <input style = "color:white;"type="text" name="username" id="email">
  </p>
  <p>
    <label for="password">PASSWORD</label>
    <input style = "color:white;" type="password" name="password" id="password">
  </p>

  </div>
   <center><p class="p-container" >
  
    <input type="submit" name="go" id="go" value="Log in">
   
  </p>
  </center>
</form>
   <?php
      include('../connect.php');
      
      if(isset($_POST['go']))
      {
      
      $username=$_POST['username'];
      $password=$_POST['password'];
      
         $sql = "SELECT * FROM admin WHERE Name =  '{$username}' AND Pass = '${password}'";
         $q = $conn->query($sql);
         $q->setFetchMode(PDO::FETCH_ASSOC);
         $row = $q->fetch();
         if ($row == 0) {
            echo " <br><center><font color= 'red' size='3'>Please fill up the fields correctly</center></font>";
         } else if ($row > 0) {
            session_start();
            $_SESSION['admin'] = $row['Name'];
            header("location: news.php");
         }
      }
   ?>
   



</body>
</html>
