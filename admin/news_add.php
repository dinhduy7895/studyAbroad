<?php include('../connect.php');
include 'header.php'; ?>
<?php
	if (isset($_POST['submit'])){
		$tenhinh ="";
		$tenhinh = ($_FILES['image_news']['name']);
		if ($tenhinh != ""){
			$arr_tachfile = explode('.',$tenhinh);
			$dem = count ($arr_tachfile);
			$duoifile = $arr_tachfile[$dem-1];
			unset ($arr_tachfile[$dem-1]);
			$str_noifile = '';
			foreach ($arr_tachfile as $key => $value) {
				if ($key == 0) {
					$str_noifile = $str_noifile.$value;
				} else {
					$str_noifile = $str_noifile.'_'.$value;
				}					
			}
			$time = time();
			$tenfilemoi = 'Img'.'_'.$time.'.'.$duoifile;
			echo $tenfilemoi;
			$tmp_name = $_FILES['image_news']['tmp_name'];
			$path_upload = 'files/'.$tenfilemoi;
			$result = move_uploaded_file($tmp_name, $path_upload);
			
			$hinhanh = $tenfilemoi;
		} else {
			$hinhanh = "";
		}
		
		$IdUniversity = $_POST['IdUniversity'];
		$Title = ($_POST['title']);
		$Context = ($_POST['cktext']);
		$Datenews = date("Y-m-d");
		$sql = "INSERT INTO news(IdUniversity,Title,Context, Datenews, Image) VALUES ('{$IdUniversity}',{$Title}','{$Context}', '{$Datenews}', '{$hinhanh}')";
		// $result = $mysqli -> query($sql);
		$stmt = $conn->prepare($sql);
		$stmt->execute(); 
		if($stmt){
			header("location:index.php?msg=addnews");exit();
		} else{
			header("location:index.php?msg=error");exit();	
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
			<h2 class="margin-bottom-10">Thêm bài viết</h2>
					<p>(*): Không được để trống</p>
					<form action="" class="templatemo-login-form" id="add_news" method="post" enctype="multipart/form-data" novalidate="novalidate">
						<div class="row form-group">
							<div class="col-lg-6">
								<label>ID University</label>
								<input type="text" name="IdUniversity" class="form-control" id="IdUniversity" placeholder="Nhập ID university">
							</div>
						</div>		
						<div class="row form-group">
							<div class="col-lg-6">
								<label>Tên bài viết (*)</label>
								<input type="text" name="title" class="form-control" id="inputFirstName" placeholder="Nhập tên bài viết">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-lg-12">
								<label class="control-label templatemo-block">Hình ảnh</label> 
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
								<p>Dung lượng tối đa hình ảnh là 5 MB.</p>									
							</div>
						</div>
						<div class="row form-group">
							<div class="col-lg-12 form-group" id="editor"> 
								<label class="control-label">Chi tiết</label>
								<textarea name="cktext" rows="7" cols="90" class="input-long ckeditor" style="visibility: hidden; display: none;"></textarea>
							</div>
						</div>
						<div class="form-group text-right">
						<input type="submit"  name="submit"  class="templatemo-blue-button" value="Đăng"/>
						<input type="reset" class="templatemo-white-button" value="Nhập lại" />
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
				"ten_bv": {
					required: "Vui lòng nhập vào đây",
				},
				cktext:{ 
					required:"Vui lòng nhập vào khung Giới thiệu thành viên", 
					minlength:"Bạn không được để trống khung này" 
				} 
			}
		});
	});	
</script>