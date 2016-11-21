<?php require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/header.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/leftbar.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/menu.php"; ?>

<?php
	if (isset($_POST['submit'])){
		$tenhinh ="";
		$tenhinh = $mysqli -> real_escape_string($_FILES['hinhanh_bv']['name']);
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
			$tenfilemoi = 'Cafe'.'_'.$time.'.'.$duoifile;
			echo $tenfilemoi;
			$tmp_name = $_FILES['hinhanh_bv']['tmp_name'];

			$path_upload = $_SERVER['DOCUMENT_ROOT'].'/files/'.$tenfilemoi;
			$result = move_uploaded_file($tmp_name, $path_upload);
			
			$hinhanh = $tenfilemoi;
		} else {
			$hinhanh = "";
		}
		
		$ten_bv = $mysqli -> real_escape_string($_POST['ten_bv']);
		$id_cm = $mysqli -> real_escape_string($_POST['id_cm']);
		$mota_bv = $mysqli -> real_escape_string($_POST['mota_bv']);
		$chitiet_bv = $mysqli -> real_escape_string($_POST['cktext']);
		$ngaydang_bv = date("Y-m-d");
		
		$sql = "INSERT INTO baiviet(ten_bv, id_cm, mota_bv, chitiet_bv, ngaydang_bv, id_qt, hinhanh_bv) VALUES ('{$ten_bv}', '{$id_cm}', '{$mota_bv}', '{$chitiet_bv}', '{$ngaydang_bv}', '{$_SESSION['arLogin']['id_qt']}', '{$hinhanh}')";
		$result = $mysqli -> query($sql);
		if($result){
			header("location:baiviet.php?msg=Đã thêm");exit();
		} else{
			header("location:baiviet.php?msg=Có lỗi");exit();	
		}
	}
?>

<div class="templatemo-content-widget white-bg">
	<h2 class="margin-bottom-10">Thêm bài viết</h2>
	<p>(*): Không được để trống</p>
	<form action="" class="templatemo-login-form" id="add_bv" method="post" enctype="multipart/form-data" novalidate="novalidate">		
		<div class="row form-group">
			<div class="col-lg-6">
				<label>Tên bài viết (*)</label>
					<input type="text" name="ten_bv" class="form-control" id="inputFirstName" placeholder="Nhập tên bài viết">
			</div>
			<div class="col-lg-6 form-group">
				<label class="control-label templatemo-block">Chuyên mục (*)</label>
				<select name="id_cm" class=" form-control" style="overflow-y: scroll;">
					<?php 
						$sql = "SELECT * FROM chuyenmuc";
						$result = $mysqli -> query($sql);
						while($arCat = mysqli_fetch_assoc($result)){
							$id_cm = $arCat['id_cm'];
							$ten_cm = $arCat['ten_cm'];
							?>	
								<option value="<?php echo $id_cm; ?>">
									<?php echo $ten_cm ?>
								</option>
							<?php
						}
					?>
				</select>
			</div>
		</div>
		
		<div class="row form-group">
			<div class="col-lg-12">
				<label class="control-label templatemo-block">Hình ảnh</label> 
				<!-- <input type="file" name="fileToUpload" id="fileToUpload" class="margin-bottom-10"> -->
				<input type="file" name="hinhanh_bv" id="fileToUpload" value="" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" onchange="viewImg(this)">
				
				<img id="avartar-img-show" src="/files/noimage.jpg" alt="avatar" width="auto" height="200" >
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
			<div class="col-lg-12 form-group">									 
				<label class="control-label">Mô tả (*)</label>
				<textarea name="mota_bv" class="form-control" id="inputNote" rows="3"></textarea>
			</div>
		</div>
		
		<div class="row form-group">
			<div class="col-lg-12 form-group">									 
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

<script type="text/javascript">
	$(document).ready(function () {
		$('#add_bv').validate({
			rules: {
				"ten_bv": {
					required: true,
				},
				"id_cm": {
					required: true,
				},
				"mota_bv": {
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
				"id_cm": {
					required: "Vui lòng chọn chuyên mục",
				},
				"mota_bv": {
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
<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/footer.php";
?>	