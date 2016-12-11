<?php  
    ob_start();  
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/vendor/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/news.css">
    
    <link href="css/jquery.bdt.css" type="text/css" rel="stylesheet">
    <script src="js/jquery-1.11.3.min.js"></script>
    
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div id="wrapper">
        <header id="header" class="header">
            <div class="top-wrapper ">
                <div class="top-wrapper-content container">
                    <div class="top-left col-lg-6 ">
                        <div class=" top-socials">

                            <div class="social_icons fleft ">
                                <div>
                                    <a target="_blank" href="http://twitter.com/PremiumCoding" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a><a target="_blank" href="https://www.facebook.com/PremiumCoding" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a><a target="_blank" href="https://dribbble.com/gljivec" title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a><a target="_blank" href="https://www.flickr.com/" title="Flickr"><i class="fa fa-flickr" aria-hidden="true"></i></a><a target="_blank" href="http://www.pinterest.com/gljivec/" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="top-right col-lg-6">
                        <div class="top-search fright ">
                            <form method="get" id="searchform" class="searchform" action="http://amory.premiumcoding.com/">
                                <input type="text" value="Search and hit enter..." name="s" id="s">
                                <i class="fa fa-search search-desktop" aria-hidden="true"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end top -->
            <div class="header-wrapper">
                <div class="logo-inner">
                    <div class="logo ">
                        <a href="index.php" class="">
                            <img class="img-responsive logo-png" src="img/logo.png" alt="" />
                        </a>
                    </div>
                </div>
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
         
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ol class="nav navbar-nav ">
                                <li class="<?php if ($title=='Home') echo " active ";?> "><a href="index.php">Home</a>
                                </li>
                                <li class="<?php if ($title=='About') echo " active ";?> "><a href="#">About</a>
                                </li>
                                <li class="<?php if ($title=='News') echo " active ";?> "><a href="news-page.php">News</a>
                                </li>
                                <li class="<?php if ($title=='Search') echo " active ";?> "><a href="search.php">Search</a>
                                </li>
                                <li class="<?php if ($title=='Contact') echo " active ";?> "><a href="contact.php">Contact</a>
                                </li>
                                <?php if (!isset($_SESSION['user_session']) ) { ?>
                                <li class="<?php if ($title=='Login') echo " active ";?> "><a href="login_form.php">Login</a>
                                </li>
                                <li class="<?php if ($title=='Register') echo " active ";?> "><a href="register_form.php">Register</a>
                                </li>
                                <?php } else { ?>
                                <li>
                                    <a href="logout.php?logout=true">
                                        <?php echo '('.$_SESSION[ 'user_session']. ')'; ?> <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Logout</a>
                                </li>
                                <?php } ?>
                            </ol>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
