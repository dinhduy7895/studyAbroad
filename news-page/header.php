
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>
    <?php echo $title; ?>
  </title>
  <link rel="stylesheet" href="../css/plugins/bootstrap.min.css">

  <link href="../css/plugins/font-awesome.min.css" type="text/css" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link  href="../lib/browser/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  
  <script src="../lib/js/plugins/jquery-1.11.3.min.js"></script>
  
  <script src="../lib/browser/js/fileinput.js" type="text/javascript"></script>
  <script src="../lib/browser/js/fileinput_locale_fr.js" type="text/javascript"></script>
  <script src="../lib/browser/js/fileinput_locale_es.js" type="text/javascript"></script>

  <script src="../lib/js/plugins/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="css/news.css">
  <link rel="stylesheet" href="css/modal.css">

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
                  <a target="_blank" href="http://twitter.com/PremiumCoding" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a><a target="_blank" href="https://www.facebook.com/PremiumCoding" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a
                  target="_blank" href="https://dribbble.com/gljivec" title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a><a target="_blank" href="https://www.flickr.com/" title="Flickr"><i class="fa fa-flickr" aria-hidden="true"></i></a>
                    <a target="_blank" href="http://www.pinterest.com/gljivec/" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
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
            <a href="" class=" ">
              <img class="img-responsive logo-png" src="../img/logo.png" alt="" />
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
                <li><a href="../index.php">Home</a>
                </li>
                <li><a href="#">About</a>
                </li>
                <li class="active"><a href="../news-page.php">News</a>
                </li>
                <li><a href="../search.php">Search</a>
                </li>
                <li><a href="../contact.php">Contact</a>
                </li>
                <?php if (!isset($_SESSION[ 'user_session']) ) { ?>
                  <li><a href="../login_form.php">Login</a>
                  </li>
                  <li><a href="../register_form.php">Register</a>
                  </li>
                  <?php } else { ?>
                    <li>
                      <a href="../logout.php?logout=true">
                        <?php echo '('.$_SESSION[ 'user_session']. ')'; ?> <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Logout</a>
                    </li>
                    <?php } ?>
              </ol>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <?php

?>