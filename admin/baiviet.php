<?php 
	// require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/header.php"; ?>
<?php 
	// require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/leftbar.php"; ?>
<?php 
	// require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/menu.php"; ?>
<?php include '../connect.php'; ?>
<?php
	//tính toán phân chia trang
	// $queryTSD = "SELECT count(id_bv) AS tongsodong FROM baiviet";
	// $resultTSD = $mysqli -> query ($queryTSD);
	// $arTSD = mysqli_fetch_assoc($resultTSD);
	// $tongsodong = $arTSD['tongsodong'];
	// //số dòng trên 1 trang
	// $row_count = TRANGADMIN;
	// //tổng số trang
	// $sotrang = ceil($tongsodong/$row_count);
	// //lấy trang hiện tại
	// if (isset ($_GET['page'])){
	// 	$current_page = $_GET['page'];
	// } else {
	// 	$current_page = 1;
	// }
	// $offset = ($current_page - 1) * $row_count;
	//kết thúc phân trang
?>
<div class="templatemo-flex-row flex-content-row">
	<div class="col-1">		
		<div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
			
			<div class="templatemo-content-widget white-bg col-2">
				<a href="/admin/baiviet_add.php" title="Add" class="templatemo-white-button">Add</a>
				<h2 class="text-uppercase" style="text-align: center; padding-bottom: 10px;">bài viết</h2>
				<?php
					if(isset($_GET["msg"])){
						echo '<div class="alert alert-success"><p><strong>'.$_GET["msg"].'</strong></p></div>';
					}
				?>
				<table class="table table-striped table-bordered templatemo-user-table">
					<thead>
						<tr>
							<td>ID</td>
							<td>Tiêu đề</td>
							<td>Chuyên mục</td>
							<td>Mô tả</td>
							<td>Hình ảnh</td>
							<td>Edit</td>
							<td>Delete</td>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT n.id_bv, n.ten_bv AS nname, n.mota_bv, n.hinhanh_bv,  c.ten_cm AS cname FROM baiviet AS n INNER JOIN chuyenmuc AS c ON n.id_cm=c.id_cm ORDER BY n.id_bv DESC LIMIT {$offset}, {$row_count}";
							$result = $mysqli -> query($sql);
							while ($arUser = mysqli_fetch_assoc($result)){
								$id_bv = $arUser['id_bv'];
								$ten_bv = $arUser['nname'];
								$mota_bv = $arUser['mota_bv'];
								$hinhanh_bv = $arUser['hinhanh_bv'];
								$ten_cat = $arUser['cname'];
								?>
									<tr>
										<td><?php echo $id_bv;?></td>
										<td><?php echo $ten_bv;?></td>
										<td><?php echo $ten_cat;?></td>
										<td><?php echo $mota_bv;?></td>
										<td class="text-center">
											<?php
												if ($hinhanh_bv != ""){
											?>
											<img src="/files/<?php echo $hinhanh_bv ?>" alt="<?php echo $ten_bv ?>" width="200px"/>
											<?php
												} else { echo "-No Image-"; }
											?>
										</td>
										<td><a href="/admin/baiviet_edit.php?id=<?php echo $id_bv?>" class="templatemo-edit-btn">Edit</a></td>
										<td><a href="/admin/baiviet_del.php?id=<?php echo $id_bv?>" class="templatemo-link" onclick="return confirmAction()">Delete</a></td>
									</tr>
								<?php 
							}
						?>
					</tbody>
				</table>
				<div class="pagination-wrap"> 
					<ul class="pagination">
						<?php
							for ($i = 1; $i <= $sotrang; $i++){
								if ($i != $current_page) {
									?>
										<li><a href="baiviet.php?page=<?php echo $i?>"><?php echo $i?></a></li>
									<?php 
								} else {
									?>
										<li class="active"><a href="baiviet.php?page=<?php echo $i?>"><?php echo $i?> <span class="sr-only">(current)</span></a></li>
									<?php 
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div> 
</div>	
<script type="text/javascript">
	function confirmAction() {
	return confirm("Bạn có chắc muốn xóa?")
	}
</script> 
<?php
	require_once "footer.php";
?>	