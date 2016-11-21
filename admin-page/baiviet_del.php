<?php require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/header.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/leftbar.php"; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/menu.php"; ?>

<?php 
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		$query="DELETE FROM baiviet WHERE id_bv='{$id}'";
		$result=$mysqli->query($query);

		if ($result){
			header("location:/admin/baiviet.php?msg=Đã xóa");exit();
		} else{
			header("location:/admin/baiviet.php?msg=Có lỗi");exit();
		}
	}
?>

<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/template/admin/inc/footer.php";
?>	