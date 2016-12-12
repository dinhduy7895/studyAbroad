<?php 
// session_name('s');
// session_set_cookie_params(0, '/');
// session_cache_limiter('private_no_expire');
session_start(); 
include('../connect.php');
$_SESSION['login']="";
$title = "CNTT Schorlarship 1";
?>
<?php
  
  if($user->is_loggedin()!="" && $_SESSION['login'] == true )
  {
    $_SESSION['login'] = false;
	$user->redirect('CNTT-Schorlarship-1.php');
	
  }

  if(isset($_POST['submit']))
  {
    $uname = $_POST['Name'];
    $umail = $_POST['Name'];
    $upass = $_POST['pass'];
    $upass = md5($upass);
	
    if($user->login($uname,$umail,$upass))
    {
	  $_SESSION['login'] = true;
      
	  $fname = $_SESSION['FirstName'];
	  $lname = $_SESSION['LastName'];
	  
      if ($uname == 'admin') {
        $user->redirect('../admin/news.php');
      } else $user->redirect('CNTT-Schorlarship-1.php');
    }
    else
    {
      $error = "Wrong Details !fa";
    } 
  }
?>
<?php  
	$sql = "SELECT u.NameUniversity, m.NameMajor, s.Fee, s.Scholarship, S.StartDay, S.EndDay, s.NumberOfYear FROM university u, major m, scholarshipinfor s where  s.IdScholarship = '3' and s.IdUniversity = u.IdUniversity and s.IdMajor = m.IdMajor";
	$q = $conn->query($sql);
	$q->setFetchMode(PDO::FETCH_ASSOC);
	while ($row = $q->fetch())
	{
		$university = $row['NameUniversity'];
		$major = $row['NameMajor'];
		$fee = $row['Fee'];
		$scholarship = $row['Scholarship'];
		$start = $row['StartDay'];
		$end = $row['EndDay'];
		$noy = $row['NumberOfYear'];
		$textReg = "The ".$university." with major ".$major."having a scholarship for foreign student in ".$noy." years. You will be support by ".$fee." % and the course will be ".$scholarship." /year. <br> The time to register is from".$start." to".$end." <br> Please fill in your information right here if you want to have a chance to get it. Thank you !!"; 
	}
	$idScholarship = '3';
	$uname = "avd";	
 	$allowedExts = array("doc", "docx", "pdf");
	 
     if(isset($_POST['upload'])){
		$target_dir = "CV/";
		$target_file = $target_dir . basename($_FILES["fileCV"]["name"]);
        $extension = pathinfo($target_file,PATHINFO_EXTENSION);
        if ( in_array($extension, $allowedExts))
        {
            if ($_FILES["fileCV"]["error"] > 0)
            {
            echo "Return Code: " . $_FILES["fileCV"]["error"] . "<br>";
            }
            else
            {   
                $time = time();
                echo "Upload: " . $_FILES["fileCV"]["name"] . "<br>";
                echo "Type: " . $_FILES["fileCV"]["type"] . "<br>";
                echo "Size: " . ($_FILES["fileCV"]["size"] / 200000) . " kB<br>";
                echo "Temp file: " . $_FILES["fileCV"]["tmp_name"] . "<br>";
                $fileName = $idScholarship."_".$uname."_".$time.".".$extension;
    
                move_uploaded_file($_FILES["fileCV"]["tmp_name"],
                "CV/" .$fileName);
                echo "Stored in: " . "CV/" . $fileName;
                
            }
        }
        else
        {
            echo "Invalid file";
        }
		 header("HTTP/1.1 303 See Other");
        header("Location: CNTT-Schorlarship-1.php");
		die();
	 }
	
    
	  
?>

<?php include 'header.php'; ?>
	<section class="news">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 news-highlight">
					<div class="row center">
						<div class="new-single col-lg-12">
							<div class="new-single-image">
								<a href="#">
									<img src="../admin/files/Img_1481219962.jpg"  class="image-responsive" alt="">
								</a>
							</div>
							<div class="new-single-header">
								<div class="new-single-header-category">
									<span><a href="#">News in Day</a></span>
								</div>
								<h2 class="main-title">
									<a href="#" class="">CNTT Schorlarship 1</a>
								</h2>
								<div class="time-new-single">
									<span>Published at 2016-12-08</span>
								</div>
								<div class="new-single-content">
									<div class="head-context">
									<p>Day la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cungDay la bai viet cuoi cung</p>
									</div>
									<br>
									<br>	
									<div class="context">
									<p>test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;test tiep&nbsp;</p>
									</div> 	
										
									
								</div>
								<div class="register center">
									<a  data-toggle="modal" href="#myModal" class="register_link">Register Now</a>
									 <!-- Modal -->
									 <?php if(isset($_SESSION[ 'user_session'])){ ?>
									 	<div class="modal fade" id="myModal" role="dialog">
											<div class="modal-dialog">
											
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Please fill your information</h4>
													</div>
													<div class="modal-body">
														<?php echo $textReg;?>
														<div class="form-register center">
															<form action="" method="post" enctype="multipart/form-data">
																Please upload your CV : 
																<input type="file" name="fileCV" id="file">
																<input type="submit" value="upload" name="upload">
															</form>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											
											</div>
										</div>
									 <?php } 
									 else {?>
									 	<div class="modal fade" id="myModal" role="dialog">
											<div class="modal-dialog">
											
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">You must log in to register</h4>
													</div>
													<div class="modal-body">
														 <form method="post" class="form-horizontal">
															<?php
															if(isset($error))
															{
															?>
																<div class="alert alert-danger">
																	<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
																</div>
															<?php } ?>
															<div class="form-group">
															<label class="col-lg-2" for="Name">Username</label>
															<div class="col-sm-5">
																<input type="text" id="Name" class="form-control" name="Name" placeholder="Name or Email" required />
															</div>
															</div>
															<div class="form-group">
															<label class="col-lg-2" for="pass">Password</label>
															<div class="col-sm-5">
																<input type="password" id="pass" class="form-control" name="pass" placeholder="your password" required />
															</div>
															</div>
															<input type="submit" name="submit" value="LOGIN"> <br/> <br/>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											
											</div>
										</div>
									 <?php } ?>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 new-recent ">
					<h4 class="new-recent-title">
						<span>RECENT POST</span>
					</h4>
					<ul class="new-feed ">
						<li class="single-feed fearture-feed">
						<?php  
						  	$sql = "SELECT * FROM news ORDER BY Id DESC limit 6";
				            $q = $conn->query($sql);
				            $q->setFetchMode(PDO::FETCH_ASSOC);
				            $count = 0;
				            while ($row = $q->fetch()):
				            	$count++;
				            	if ($count > 3) {
						?>
							<div class="feed col-lg-12">
								<div class="feed-image">
									<a href="#">
										<img src="../admin/files/<?php echo $row['Image']; ?>" class="image-responsive" alt="">
									</a>
								</div>
								<div class="feed-header">
									<h2 class="feed-title">
										<a href="#" class=""><?php echo $row['Title']; ?></a>
									</h2>
									<div class="time-new-single">
										<span>Published at <?php echo $row['Datenews']; ?></span>
									</div>
								</div>
							</div>
						<?php }
							else {
								continue;
							}
							endwhile; ?>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'footer.php'; ?>