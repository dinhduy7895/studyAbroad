<?php include('../connect.php');
include 'header.php'; ?>
<?php
	if (isset($_POST['submit'])){
		$uploadOk = 1;
		$imgName ="";
		$imgName = ($_FILES['image_news']['name']);
		if ($_FILES["image_news"]["size"] > 400000) {
			echo "<span class='error'>Sorry, your file is too large. </span></br>";
			$uploadOk = 0;
        }
		if ( $uploadOk != 0 && $imgName != ""){
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
			$tmp_name = $_FILES['image_news']['tmp_name'];
			$path_upload = 'files/'.$imgNewName;
			$result = move_uploaded_file($tmp_name, $path_upload);
			$image = $imgNewName;

			$idUniversity = $_POST['idUniversity'];
			$idScholarship = ($_POST['idScholarship']);
			$headContext = ($_POST['cktext1']);		
			$title = ($_POST['title']);
			$context = ($_POST['cktext']);
			$dateNews = date("Y-m-d");
			$_SESSION['idUniversity'] = $idUniversity;
			$_SESSION['idScholarship'] = $idScholarship;
			$_SESSION['cktext1'] = $headContext;
			$_SESSION['title'] = $title;
			$_SESSION['cktext'] = $context;
			$_SESSION['date'] = $dateNews;
			$url = $title;
			$url = str_replace(" ","-",$url);
			$file = "../new-page/". $url.".php";
			$fp = fopen($file,'w');
			$content = file_get_contents("../temp.php");
			$content = str_replace("_content",$context,$content);
			$content = str_replace("_headcontent",$headContext,$content);
			$content = str_replace("_title",$title,$content);
			$content = str_replace("_date",$dateNews,$content);
			$file_content = $content;
			fwrite($fp,$file_content);
			fclose($fp);
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
		} else {
			$image = "";
			echo '<span class="error">cannot update. please enter exactly information </span>';
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
								<label>University</label>
								<select name="idUniversity" id="idUniversity">
									<?php  
										$sql = "SELECT * FROM university";
										$stmt_uni = $conn->query($sql);
				                        $stmt_uni->setFetchMode(PDO::FETCH_ASSOC);
				                        while ($row_uni = $stmt_uni->fetch()) {
				                        ?>
										<option value="<?php echo $row_uni['IdUniversity']; ?>"><?php echo $row_uni['NameUniversity']." - ". $row_uni['Country']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>		
						<div class="row form-group">
							<div class="col-lg-6">
								<label>Scholarship</label>
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
								<p>Maximum Filesize is 400kB</p>									
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