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
        $password=md5($_POST['password']);
        $sql = "SELECT * FROM admin WHERE Name=:Name AND Pass=:Pass";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':Name'=> $username, ':Pass'=>$password));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() == 0) {
          echo " <br><center><font color= 'red' size='3'>Please fill up the fields correctly</center></font>";
        } else if ($stmt->rowCount() > 0) {
          session_start();
          if ($row['Level'] == 10) {
            $_SESSION['university'] = $row['Name'];
            header('Location: university.php');
          } else {
            $_SESSION['admin'] = $row['Name'];
            $_SESSION['admin_level'] = $row['Level'];
            header("location: news.php");
          }
        
         }
      }
   ?>
   



</body>
</html>
