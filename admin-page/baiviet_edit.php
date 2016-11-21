<?php require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/header.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/leftbar.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/menu.php"; ?>

<?php
	$id = $_GET['id'];
	$sqlSel = "SELECT * FROM baiviet WHERE id_bv = {$id} LIMIT 1";
	$resultSel = $mysqli -> query($sqlSel);
	$arr = mysqli_fetch_assoc($resultSel);
	$ten_bv = $arr['ten_bv'];
	$id_cm = $arr['id_cm'];
	$hinhanh_bv = $arr['hinhanh_bv'];
	$mota_bv = $arr['mota_bv'];
	$chitiet_bv = $arr['chitiet_bv'];
?>

<?php
	if(isset($_POST['sua'])){
		$ten_bv = $mysqli -> real_escape_string($_POST['ten_bv']);
		$id_cm = $mysqli -> real_escape_string($_POST['id_cm']);
		$mota_bv = $mysqli -> real_escape_string($_POST['mota_bv']);
		$chitiet_bv = $mysqli -> real_escape_string($_POST['chitiet_bv']);
		$id_qt = $mysqli -> real_escape_string($_POST['id_qt']);
		$hinhanh = $mysqli -> real_escape_string($_FILES['hinhanh_bv']['name']);
		
		if($hinhanh == ""){
			$sql = "UPDATE baiviet SET ten_bv='{$ten_bv}', id_cm='{$id_cm}', id_qt='1', mota_bv='{$mota_bv}', chitiet_bv='{$chitiet_bv}' WHERE id_bv = {$id}";
		}else{
			$tachfile = explode('.', $hinhanh);
			$duoifile = end($tachfile);
			$time = time();
			$hinhanhmoi = 'DLDaNang_bv'.'_'.$time.'.'.$duoifile;
			$duongdantam = $_FILES['hinhanh_bv']['tmp_name'];
			$duongdanmoi = $_SERVER['DOCUMENT_ROOT'].'/files/'.$hinhanhmoi;
			move_uploaded_file($duongdantam, $duongdanmoi);
			$sql = "UPDATE baiviet SET ten_bv='{$ten_bv}', id_cm='{$id_cm}', mota_bv='{$mota_bv}', chitiet_bv='{$chitiet_bv}', hinhanh_bv='{$hinhanhmoi}' WHERE id_bv = {$id}";
		}
		$qr = $mysqli->query($sql);
		if($qr){
			header("location:baiviet.php?msg=Đã sửa");exit();
		}else {
			header("location:baiviet.php?msg=Có lỗi");exit();
		}
	}
?>

<div class="templatemo-content-widget white-bg">
	<h2 class="margin-bottom-10">Sửa bài viết</h2>
	<p>(*): Không được để trống</p>
	<form action="" class="templatemo-login-form" id="add_bv" method="post" enctype="multipart/form-data" novalidate="novalidate">		
		<div class="row form-group">
			<div class="col-lg-6">
				<label>Tên bài viết (*)</label>
					<input type="text" name="ten_bv" value="<?php echo $ten_bv;?>" class="form-control" id="inputFirstName" placeholder="Nhập tên bài viết">
			</div>
			<div class="col-lg-6 form-group">
				<label class="control-label templatemo-block">Chuyên mục (*)</label>
				<select name="id_cm" class="form-control" style="overflow-y: scroll;">
					<?php 
						$sql = "SELECT * FROM chuyenmuc";
						$result = $mysqli -> query($sql);
						while($arCat = mysqli_fetch_assoc($result)){
							$id_cm = $arCat['id_cm'];
							$ten_cm = $arCat['ten_cm'];
							?>	
								<option value="<?php echo $id_cm; ?>" <?php if($arr['id_cm']==$id_cm){ echo "selected='selected'";}?>>
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
				
				<img id="avartar-img-show" src="/files/<?php echo $hinhanh_bv?>" alt ="<?php echo $ten_qc ?>" width="auto" height="200" >
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
				<textarea name="mota_bv" class="form-control" id="inputNote" rows="3"><?php echo $mota_bv;?></textarea>
			</div>
		</div>
		
		<div class="row form-group">
			<div class="col-lg-12 form-group">									 
				<label class="control-label">Chi tiết</label>
				<textarea name="cktext" rows="7" cols="90" class="input-long ckeditor" style="visibility: hidden; display: none;"><?php echo $chitiet_bv;?></textarea>
			</div>
		</div>

		<div class="form-group text-right">
		<input type="submit"  name="sua"  class="templatemo-blue-button" value="Sửa"/>
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