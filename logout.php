<?php 
session_start();
session_unset();
session_destroy();
$past = time() - 3600;
foreach ( $_COOKIE as $key => $value )
{
    setcookie( $key, $value, $past, '/' );
}
clearstatcache();
 header("location:index.php");
exit();
?>