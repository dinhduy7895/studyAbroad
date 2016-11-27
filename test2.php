<?php
    session_start(); 
    include('connect.php');
    $name=$fname=$lname=$email=$pass=$year=$phone=$nameErr="";
$check = 0;
    if(count($_POST) > 0) {
        $_SESSION['name'] = $_POST["name"];
    $_POST['firstname'] = $_POST['firstname'];
    $_POST['lastname'] = $_POST['lastname'];
    $_POST['email'] = $_POST['email'];
    $_POST['pass']= $_POST['pass'];
    $_POST['year'] = $_POST['year'];
    $_POST['phoneNumber'] = $_POST['phoneNumber'];
        header("HTTP/1.1 303 See Other");
        header("Location: signupsuccess.php");
        die();
    }
    else if (isset($_SESSION)){
        $name = $_SESSION["name"];
    $fname = $_SESSION['firstname'];
    $lname = $_SESSION['lastname'];
    $email = $_SESSION['email'];
    $pass = $_SESSION['pass'];
    $year = $_SESSION['year'];
    $phone = $_SESSION['phoneNumber'];;
        session_unset();
        session_destroy();
    }
?>