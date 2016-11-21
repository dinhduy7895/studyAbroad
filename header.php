<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/news.css">
	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="css/news.css">
</head>
<body>
<div id="wrapper">
	<header id="header" class="header">
		<nav class="navbar">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<div class="logo">
						<a href="" class="navbar-brand">
							<img class="img-responsive" src="img/logo.png" alt="" />
						</a>
					</div>
				</div>
				<div id="navbar" class=" nav navbar-nav navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="<?php if ($title=='Home') echo "active";?> "><a href="index.php">Home</a></li>
						<li class="<?php if ($title=='About') echo "active";?> "><a href="#">About</a></li>
						<li class="<?php if ($title=='News') echo "active";?> "><a href="news-page.php">News</a></li>
						<li class="<?php if ($title=='Blog') echo "active";?> "><a href="#">Blog</a></li>
						<li class="<?php if ($title=='Contact') echo "active";?> "><a href="contact.php">Contact</a></li>
						<?php if (!$_SESSION['user_session']) { ?>
							<li class="<?php if ($title=='Login') echo "active";?> "><a href="login_form.php">Login</a></li>
							<li class="<?php if ($title=='Register') echo "active";?> "><a href="register_form.php">Register</a></li>
						<?php } else { ?>
							<li><a href="logout.php?logout=true"><?php echo '('.$_SESSION['user_session'].')'; ?> <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Logout</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>