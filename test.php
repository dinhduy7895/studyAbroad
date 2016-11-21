<?php 
  require_once 'connect.php';
  $uname = 'thanhbinh';
  $umail = 'thanhbinh0995@gmail.com';
  $upass = md5('thanhbinh')
  try
  {
    $stmt = $this->db->prepare("SELECT * FROM user WHERE Name=:uname OR Email=:umail LIMIT 1");
    $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0)
    {
       if($upass == $userRow['Pass'])
       {
          $_SESSION['user_session'] = $userRow['Id'];
          echo $userRow['Id'];
       }
    }
  }
  catch(PDOException $e)
  {
     echo $e->getMessage();
  }
 ?>