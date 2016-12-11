<?php include('../connect.php');
include 'header.php'; 
?>

<?php
	$id = $_GET['id'];
	if (isset($_POST['submit'])){
		$name = $_POST['name'];
		$pass = md5($_POST['pass']);
		$level = $_POST['level'];
		$email = $_POST['email'];
      $upd = "UPDATE admin SET Name='{$name}',Pass='{$pass}', Level='{$level}',Email='{$email}' WHERE Id = {$id}";
      $q = $conn->query($upd);
      if ($q) {
         header("location: news.php?msg=Updated");exit();
      } else {
         header("location: news.php?msg=Error");exit();
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
					<h2 class="margin-bottom-10">Add Admin acount</h2>
					<form id="admin_add" method="post" class="form-horizontal" action="">
						<?php
                     $sql = "SELECT Name,Pass,Level,Email FROM admin where Id = {$id}";
                     $q = $conn->query($sql);
                     $q->setFetchMode(PDO::FETCH_ASSOC);
                     while ($row = $q->fetch()) {
                        $name = $row['Name'];
                        $pass = $row['Pass'];
                        $level= $row['Level'];
                        $email = $row['Email'];
                     ?>
		            <div class="form-group">
		               <br/>
		               <label class="col-lg-2" for="name">Name</label>
		               <div class="col-lg-5">
		                  <input value="<?php echo $name; ?>" type="text" id="name" class="form-control" name="name" placeholder="name" /><br/>
		               </div>
		            </div>
		            <div class="form-group">
		               <label class="col-lg-2" for="pass">Pass</label>
		               <div class="col-lg-5">
		                  <input value="<?php echo $pass; ?>" type="password" id="pass" class="form-control" name="pass" placeholder="pass" /><br/>
		               </div>
		            </div>
		            <div class="form-group">
		               <label class="col-lg-2" for="level">Level</label>
		               <div class="col-lg-5">
		                  <input value="<?php echo $level; ?>" type="text" id="level" class="form-control" name="level" placeholder="level" /><br/>
		               </div>
		            </div>
		            <div class="form-group">
		               <label class="col-lg-2" for="email">Email</label>
		               <div class="col-lg-5">
		                  <input value="<?php echo $email; ?> " type="email" id="email" class="form-control" name="email" placeholder="email" /><br/>
		               </div>
		            </div>
			         <input type="submit" name="submit" value="OK">
			         <br/><br/>
			         <?php } ?>
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