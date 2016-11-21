<?php
session_start();
require_once 'connect.php';
if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
$user_name = $_SESSION['user_session'];
?>
<?php $title = 'Home'; ?>
<?php include 'header.php'; ?>

<div class="content">
welcome : <?php print $user_name; ?>
</div>
<?php include 'footer.php'; ?>