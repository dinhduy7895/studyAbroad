<?php include('../connect.php');
	include 'header.php'; 
	if (isset($_SESSION['university'])) {
		header('Location: university.php');
	}
?>

<?php
	if (isset($_POST['submit'])){
		$name = $_POST['name'];
		$pass = md5($_POST['pass']);
		$level = $_POST['level'];
		$email = $_POST['email'];
      $stmt = $conn->prepare("INSERT INTO admin(Name,Pass,Level,Email)
      VALUES (:name, :pass,:level,:email)");
      $stmt->bindparam(":name", $name);
      $stmt->bindparam(":pass", $pass);
      $stmt->bindparam(":level", $level);
      $stmt->bindparam(":email", $email);
      $stmt->execute();
      if($stmt){
			header("location:news.php?msg=addAdmin");exit();
		} else {
			header("location:news.php?msg=error");exit();	
		}
	}
?>
<div class="wrapper">
  <?php include 'sidebar.php'; ?>
  <div class="container-fluid">
   <?php include 'navbar.php'; ?>
   <div class="row">
      <div class="col-xs-12">
         <h3 class="page-header">
            Dashboard <small>Dashboard and statistics</small>
         </h3>
        <section id="main-content">
          	<div class="container">
					<h2 class="margin-bottom-10">Add Admin account</h2>
					<form id="admin_add" method="post" class="form-horizontal" action="">
		            <div class="form-group">
		               <br/>
		               <label class="col-lg-2" for="name">Name</label>
		               <div class="col-lg-5">
		                  <input value="" type="text" id="name" class="form-control" name="name" placeholder="name" /><br/>
		               </div>
		            </div>
		            <div class="form-group">
		               <label class="col-lg-2" for="pass">Pass</label>
		               <div class="col-lg-5">
		                  <input value="" type="password" id="pass" class="form-control" name="pass" placeholder="pass" /><br/>
		               </div>
		            </div>
		            <div class="form-group">
		               <label class="col-lg-2" for="level">Level</label>
		               <div class="col-lg-5">
		                  <input type="text" id="level" class="form-control" name="level" placeholder="level" /><br/>
		               </div>
		            </div>
		            <div class="form-group">
		               <label class="col-lg-2" for="email">Email</label>
		               <div class="col-lg-5">
		                  <input type="email" id="email" class="form-control" name="email" placeholder="email" /><br/>
		               </div>
		            </div>
			         <input type="submit" name="submit" value="OK">
			         <br/><br/>
			      </form>
          	</div>
        </section>
      </div>

    </div>
   </div> <!-- / .row -->
    <?php include 'footer.php'; ?>
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