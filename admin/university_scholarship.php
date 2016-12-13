<?php include('../functions/connect.php');
	include 'inc/header.php'; 
	if (isset($_SESSION['admin'])) {
      	header('Location: news.php');
   }
?>

<?php
	 $sql = "SELECT * FROM university where NameUniversity = '".$_SESSION['university']."'";
     $q = $conn->query($sql);
	 $q->setFetchMode(PDO::FETCH_ASSOC);
	 $row = $q->fetch();
	 $_SESSION['idUniversity'] = $row['IdUniversity'];
	if (isset($_POST['submit'])){
		
			$idUniversity = $_SESSION['idUniversity'];
			$idMajor = ($_POST['idMajor']);		
			$fee = ($_POST['fee']);
			$scholarship = ($_POST['scholarship']);
			$startDay = ($_POST['startDay']);
			$endDay = ($_POST['endDay']);
			$numberOfYear = ($_POST['numberOfYear']);

	
			$stmt = $conn->prepare("INSERT INTO scholarshipinfor (IdUniversity, IdMajor, Fee, Scholarship, StartDay,EndDay, NumberOfYear) VALUES (:idUniversity ,:idMajor, :fee, :scholarship, :startDay, :endDay,:numberOfYear)");

			$stmt->bindparam(":idUniversity", $idUniversity);
	        $stmt->bindparam(":idMajor", $idMajor);
	        $stmt->bindparam(":fee", $fee);
	        $stmt->bindparam(":scholarship", $scholarship);
	        $stmt->bindparam(":startDay", $startDay);
	        $stmt->bindparam(":endDay", $endDay);
			$stmt->bindparam(":numberOfYear", $numberOfYear);
			$stmt->execute(); 
			if($stmt){
				header("location:news.php?msg=addnews");exit();
			} else {
				header("location:news.php?msg=error");exit();	
			}
		} else {
			$image = "";
			echo '<span class="error">cannot update. please enter exactly information </span>';
		}
	
	//tới đây
?>
<div class="wrapper">
  <?php include 'inc/sidebar.php'; ?>
  <div class="container-fluid">
   <?php include 'inc/navbar.php'; ?>
   <div class="row">
      <div class="col-xs-12">
         <h3 class="page-header">
            Dashboard <small>Dashboard and statistics</small>
         </h3>
        <section id="main-content">
          <div class="container">
			<h2 class="margin-bottom-10">Add Scholarship</h2>
					<p>(*): Not be empty</p>
					<form action="" class="templatemo-login-form" id="add_news" method="post" enctype="multipart/form-data" novalidate="novalidate">
				

						<div class="row form-group">
							<div class="col-lg-6">
								<label>Major</label>
								<select name="idMajor" class="form-control" id="idMajor">
								<option selected="selected" value = "0">None</option>

								<?php
								$sql = $conn->prepare('Select distinct m.NameMajor, m.IdMajor from  scholarshipinfor s, major m where m.IdMajor = s.IdMajor  and s.IdUniversity='.$_SESSION['idUniversity']);
								$sql->execute();
								while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
								
									$idMajor = $row['IdMajor'];
									$nameMajor = $row['NameMajor'];

									echo '<option  value="' . $idMajor . '"  >' ."NameMajor: ". $nameMajor. '</option>';
								}
								?>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-6">
								<label>Fee</label>
								<input type="number" name="fee" class="form-control" id="fee" placeholder="Fee">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-6">
								<label>Scholarship</label>
								<input type="number" name="scholarship" class="form-control" id="scholarship" placeholder=" Schorlarship">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-6">
								<label>StartDay</label>
								<input type="date" name="startDay" class="form-control" id="startDay" placeholder="StartDay">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-6">
								<label>EndDate</label>
								<input type="date" name="endDay" class="form-control" id="endDay" placeholder="EndDay">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-6">
								<label>Number of years</label>
								<input type="number" name="numberOfYear" class="form-control" id="numberOfYear" placeholder="numberOfYear">
							</div>
						</div>
						
						<div class="form-group text-right">
						<input type="submit" name="submit" class="templatemo-blue-button" value="Submit"/>
						<input type="reset" class="templatemo-white-button" value="Reset" />
						</div>													 
					</form>
          </div>
        </section>
      </div>

    </div>
   </div> <!-- / .row -->
    <?php include 'inc/footer.php'; ?>
    <script type="text/javascript">
		$(document).ready(function () {
		$('#add_news').validate({
			rules: {
				"name": {
					required: true,
				},
				cktext:{ 
					required: function() 
					{
						CKEDITOR.instances.cktext.updateElement(); 
					}, 
					minlength:1,
				} 
			},
			messages: {
				cktext:{ 
					required:"Please enter here",
					minlength:"Please enter here",
				} 
			}
		});
	});	
</script>