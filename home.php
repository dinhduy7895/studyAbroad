<?php
require_once 'connect.php';
if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM user WHERE Id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php $title = 'Welcome '; ?>
<?php include 'header.php'; ?>

<div class="header">
 <div class="left">
     <label><a href="http://www.codingcage.com/">Coding Cage - Programming Blog</a></label>
    </div>
    <div class="right">
     <label><a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
    </div>
</div>
<div class="content">
welcome : <?php print($userRow['user_name']); ?>
</div>
<?php include 'footer.php'; ?>