
<?php
$title = 'Contact';
  session_start(); 
 

?>


<?php
	include('connect.php');
	// if(!$user->is_loggedin()){
	// 	header("Location: home.html");
	// }
	
	if (count($_POST) > 0){ 
		$_SESSION['nameContact'] = $_POST["nameContact"];
		$_SESSION['emailContact'] = $_POST["emailContact"];
		$_SESSION['addressContact'] = $_POST["addressContact"];
		$_SESSION['phoneContact'] = $_POST["phoneContact"];
		$_SESSION['opinionContact'] = $_POST['opinionContact'];
		$_SESSION['contact'] = true;
		header("HTTP/1.1 303 See Other");
        header("Location: contact.php");
        die();
	} else if (isset($_SESSION['opinionContact'])) {
		$nameContact = $_SESSION['nameContact'];
		$emailContact = $_SESSION['emailContact'];
		$addressContact = $_SESSION['addressContact'];
		$phoneContact = $_SESSION['phoneContact'];
		$opinionContact = $_SESSION['opinionContact'];
		
		

				/** Include PHPExcel */
		require_once 'lib/excel/Classes/PHPExcel.php';
		require_once 'lib/excel/Classes/PHPExcel/IOFactory.php';

		$objPHPExcel = PHPExcel_IOFactory::load("admin/files/contact/contact.xlsx");
		$objPHPExcel->setActiveSheetIndex(0);
		$row = $objPHPExcel->getActiveSheet()->getHighestRow()+1;
		//echo $row;
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $nameContact);
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $emailContact);
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $addressContact);
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $phoneContact);
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $opinionContact);
		
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save('admin/files/contact/contact.xlsx');
	}
	include "header.php" ;
	
?>
	<section id="main-content">
		<div class="container">
			<div class="top-title ">
				<h1>Contact information</h1>
			</div>
		</div>
		<div class="container">
			
			<div class="main-content ">
				<form id="contactForm" method="post" class="form-horizontal" action="">
					<div class="col-lg-6">
						<div class="form-group">
							<!--<label class="col-lg-2" for="date">Your Name</label>-->
							<div class="col-sm-12">
								<input type="text" class=" form-control" name="nameContact" placeholder="Your Name" /><br/>
							</div>
						</div>
						<div class="form-group">
							<!--<label class="col-lg-2" for="date">Email</label>-->
							<div class="col-sm-12">
								<input type="text" class=" form-control" name="emailContact" placeholder="Email" /><br/>
							</div>
						</div>
						<div class="form-group">
							<!--<label class="col-lg-2" for="date">Address</label>-->
							<div class="col-sm-12">
								<input type="text" class=" form-control" name="addressContact" placeholder="Address" /><br/>
							</div>
						</div>
						<div class="form-group">
							<!--<label class="col-lg-2" for="country">Phone Number</label>-->
							<div class="col-sm-12">
								<input type="text"  class="form-control" id="country" name="phoneContact" placeholder="Phone Number" /><br/>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						
						<div class="form-group">
							<!--<label class="col-lg-2" for="country">Your Opinions</label>-->
							<div class="col-sm-12">
								<textarea class="form-control" name="opinionContact"  cols="30" rows="11" placeholder="What you want to suggest or have question for us"></textarea>
							</div>
						</div>
					</div>
				<div class="submit col-lg-12">
					<input type="submit" class="fleft btn-primary btn-lg col-lg-12" name="contact" value="OK"> <br/> <br/>
				</div>
				
			</form>
			</div>
		</div>

	</section>
			 <!-- Modal -->
<div id="contact" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="modal-title center" style="font-size: 30px;">Thank you !</h4>
      </div>
      <div class="modal-body center">
          <p>We have been received your opinions .</p>
		  <p>If you have more question , please do not hesistant to contact us follow information below </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	<?php 
	if(isset($_SESSION['contact'])){
		if ($_SESSION['contact']==true){
			echo "<script>
			$(window).load(function(){
				$('#contact').modal('show');
			});
		</script>";
		}
		unset($_SESSION['contact'] );
	}
	?>
	<?php include 'footer.php';?>
