<?php
$servername = "localhost";
$username = "root";
$password = "binh";
$dbname = "studyabroad";
try{
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
    {
    echo  $e->getMessage();
    }
include 'Class.user.php';
$user = new USER($conn);
// session_start();
?>
 