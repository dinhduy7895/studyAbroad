<?php 
// session_name('s');
// session_set_cookie_params(0, '/');
// session_cache_limiter('private_no_expire');
session_start(); 
include('../connect.php');

$_SESSION['login']="";
$_SESSION['url'] = 'None-None-None-None-None-None-.php';
$title = "None None None None None None ";
?>
<?php
  
  if(isset($_SESSION['FirstName']) && isset( $_SESSION['LasttName'])){
	  $fname = $_SESSION['FirstName'];
	  $lname = $_SESSION['LastName'];
  }
  if($user->is_loggedin()!="" && $_SESSION['login'] == true )
  {
    $_SESSION['login'] = false;
	$user->redirect('None-None-None-None-None-None-.php');
	
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
	  
      if ($uname == 'admin') {
        $user->redirect('../admin/news.php');
      } else $user->redirect('None-None-None-None-None-None-.php');
    }
    else
    {
      $error = "Wrong Details !fa";
    } 
  }
?>
<?php  
	$sql = "SELECT u.NameUniversity, m.NameMajor, s.Fee, s.Scholarship, s.StartDay, s.EndDay, s.NumberOfYear FROM university u, major m, scholarshipinfor s where  s.IdScholarship = '0' and s.IdUniversity = u.IdUniversity and s.IdMajor = m.IdMajor";
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
		$textReg = "The <b>".$university."</b> with major <b>".$major." </b>having a scholarship for foreign student in <b>".$noy." </b>years. You will be support by <b>".$fee."%</b> and the course will be<b> ".$scholarship."/year </b>. <br> The time to register is from <b>".$start."</b> to <b>".$end." </b><br><br> Please fill in your information right here if you want to have a chance to get it. Thank you !!"; 
	}
	///////upload
		if(isset($_SESSION['user_session']))
		$uname=$_SESSION['user_session'] ;
		$idScholarship = 0;
		$_SESSION['idScholarship'] = 0;
		
		if(isset($_POST['upload']))
		include('upload.php');
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
									<img src="../admin/files/Img_1481637637.jpg"  class="image-responsive" alt="">
								</a>
							</div>
							<div class="new-single-header">
								<div class="new-single-header-category">
									<span><a href="#">News in Day</a></span>
								</div>
								<h2 class="main-title">
									<a href="#" class="">None None None None None None </a>
								</h2>
								<div class="time-new-single">
									<span>Published at 2016-12-13 <br></span>
									<span>Upload by dut </span>
								</div>
								<div class="new-single-content">
									<div class="head-context">
									<p>None None&nbsp;None None&nbsp;</p>
									</div>
									<br>
									<br>	
									<div class="context">
									<p>None None&nbsp;None None&nbsp;</p>
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
													<div class="modal-body clearfix">
														<div class="noti col-lg-12" style=" line-height: 20px;">
															<?php echo $textReg;?>
														</div>
														<div class="download col-lg-2 col-lg-offset-5 " style="padding : 10px;">
															<a href="../document/download.docx"><img src="../img/download.png" class="img-responsive" alt=""></a>
														</div>
														<span class ="col-lg-12" style="color: #804040; padding : 10px 0px;" >Download template CV</span>
														<div class="form-register center col-lg-12">
															<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
																
																<input type="file" name="fileCV" id="fileCV" accept=".docx, .pdf, .doc">
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
						  	$sql = "SELECT n.*, u.NameUniversity FROM news n, university u where u.IdUniversity = n.IdUniversity ORDER BY Id DESC limit 6";
				            $q = $conn->query($sql);
				            $q->setFetchMode(PDO::FETCH_ASSOC);
				            $count = 0;
				            while ($row = $q->fetch()):
				            	$count++;
				            	if ($count > 1) {
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
										<span>Published at <?php echo $row['Datenews']; ?><br></span>
										<span>Upload by  <?php echo $row['NameUniversity']; ?></span>
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
	<!-- Modal -->
<div id="uploadTrue" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SUCCESS!</h4>
      </div>
      <div class="modal-body center">
        <p>We have been received your CV, we will contact you soon</p>
				<h1 class="center">Thank you.</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
	
  </div>
</div>

 <!--false-->
 <!-- Modal -->
<div id="uploadFalse" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Something was wrong</h4>
      </div>
      <div class="modal-body center">
          <p>Your file was invalid.Ensure you has been uploaded valid file.</p>
		  <p>Please upload your CV again. Thank you</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 <!--ok-->
<?php 
	if(isset($_SESSION['upload'])){
		if ($_SESSION['upload']==true){
			echo "<script>
			$(window).load(function(){
				$('#uploadTrue').modal('show');
			});
		</script>";
		}
		else if ($_SESSION['upload']==false){
			echo "<script>
			$(window).load(function(){
				$('#uploadFalse').modal('show');
			});
		</script>";
		}
		 unset($_SESSION['upload']); 
	}
?>
<script>
$(document).on('ready', function() {
    $("#fileCV").fileinput({
        previewFileType: "text",
        allowedFileExtensions: ["doc", "docx", "pdf"],
        previewClass: "bg-warning"
    });
		$(".fileinput-upload").attr("name", "upload");
		$(".file-caption-name").text("Please upload your CV");
});
</script>
<?php include 'footer.php'; ?>