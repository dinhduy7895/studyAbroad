<?php include('../connect.php');
include 'header.php'; ?>
<?php
	if (isset($_POST['submit'])){
		$imgName ="";
		$imgName = ($_FILES['image_news']['name']);
		if ($imgName != ""){
			$arr_splitfile = explode('.',$imgName);
			$count = count ($arr_splitfile);
			$extension = $arr_splitfile[$count-1];
			unset ($arr_splitfile[$count-1]);
			$join = '';
			foreach ($arr_splitfile as $key => $value) {
				if ($key == 0) {
					$join = $join.$value;
				} else {
					$join = $join.'_'.$value;
				}					
			}
			$time = time();
			$imgNewName = 'Img'.'_'.$time.'.'.$extension;
			// echo $imgNewName;
			$tmp_name = $_FILES['image_news']['tmp_name'];
			$path_upload = 'files/'.$imgNewName;
			$result = move_uploaded_file($tmp_name, $path_upload);
			$image = $imgNewName;
		} else {
			$image = "";
		}
		
		$idUniversity = $_POST['idUniversity'];

		$title = ($_POST['title']);
		$context = ($_POST['cktext']);
		$datenews = date("Y-m-d");

		$_SESSION['idUniversity'] = $idUniversity;
		$_SESSION['title'] = $title;
		$_SESSION['cktext'] = $context;
		$_SESSION['date'] = $datenews;

		$url = $title;
		$url = str_replace(" ","-",$url);
		$file = "../new-page/". $url.".php";
		$fp = fopen($file,'w');
		$content = file_get_contents("../temp.php");
		$content = str_replace("_content",$context,$content);
		$content = str_replace("_title",$title,$content);
		$content = str_replace("_date",$datenews,$content);

		$file_content = $content;
		fwrite($fp,$file_content);
		fclose($fp);
		$idScholarship = $idUniversity;
		
		$stmt = $conn->prepare("INSERT INTO news (IdUniversity,IdScholarship,Title,Context, Datenews, Image) VALUES (:IdUniversity,:IdScholarship,:Title,:Context,:Datenews, :Image)");
		$stmt->bindparam(":IdUniversity", $idUniversity);
		$stmt->bindparam(":IdScholarship", $idScholarship);
        $stmt->bindparam(":Title", $title);
        $stmt->bindparam(":Context", $context);
        $stmt->bindparam(":Datenews", $datenews);
        $stmt->bindparam(":Image", $hinhanh);

		$idScholarship = ($_POST['idScholarship']);
		$title = ($_POST['title']);
		$headContext = ($_POST['cktext1']);
		$context = ($_POST['cktext']);
		$dateNews = date("Y-m-d");
		$stmt = $conn->prepare("INSERT INTO news (IdUniversity, IdScholarship ,Title, HeadContext, Context, Datenews, Image) VALUES (:idUniversity,:idScholarship ,:title, :headContext, :context, :dateNews, :image)");
		$stmt->bindparam(":idUniversity", $idUniversity);
		$stmt->bindparam(":idScholarship", $idScholarship);
        $stmt->bindparam(":title", $title);
        $stmt->bindparam(":headContext", $headContext);
        $stmt->bindparam(":context", $context);
        $stmt->bindparam(":dateNews", $dateNews);
        $stmt->bindparam(":image", $image);

		$stmt->execute(); 
		if($stmt){
			header("location:news.php?msg=addnews");exit();
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
			<h2 class="margin-bottom-10">Add News</h2>
					<p>(*): Not be empty</p>
					<form action="" class="templatemo-login-form" id="add_news" method="post" enctype="multipart/form-data" novalidate="novalidate">
						<div class="row form-group">
							<div class="col-lg-6">
								<label>ID University</label>
								<input type="text" name="idUniversity" class="form-control" id="idUniversity" placeholder="Nhập ID university">
							</div>
						</div>		
						<div class="row form-group">
							<div class="col-lg-6">
								<label>ID Scholarship</label>
								<input type="text" name="idScholarship" class="form-control" id="idScholarship" placeholder="Nhập ID Scholarship">
							</div>
						</div>	
						<div class="row form-group">
							<div class="col-lg-6">
								<label>Title (*)</label>
								<input type="text" name="title" class="form-control" id="title" placeholder="Nhập tên bài viết">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-lg-12">
								<label class="control-label templatemo-block">Image</label> 
								<input type="file" name="image_news" id="fileToUpload" value="" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" onchange="viewImg(this)">
								<script>
								function viewImg(img) {
									var fileReader = new FileReader;
									fileReader.onload = function(img) {
										var avartarShow = document.getElementById("avartar-img-show");
										
										avartarShow.src = img.target.result
									}, fileReader.readAsDataURL(img.files[0])
								}
								</script>			
								<p>Maximum Filesize is 5 MB</p>									
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-12 form-group" id="editor"> 
								<label class="control-label">Head Context</label>
								<textarea name="cktext1" rows="7" cols="90" class="input-long ckeditor" style="visibility: hidden; display: none;"></textarea>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-12 form-group" id="editor"> 
								<label class="control-label">Detail Info</label>
								<textarea name="cktext" rows="7" cols="90" class="input-long ckeditor" style="visibility: hidden; display: none;"></textarea>
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
</div>
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