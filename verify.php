<?php 
	$name= $_GET['name'];
	$maKichHoat = $_GET['maKichHoat'];
	$stmt = $conn->prepare("Select count(*) from kichhoat where Name= '$name' and MaKichHoat ='$maKichHoat' ");
	if ($stmt->execute()) {
		$stmt = $conn->prepare("UPDATE user SET Active=1 WHERE Name = {$name}");
		$stmt->execute();
		echo "ban da kich hoat thanh cong";
		echo "<a href='login.php'>kich vao day de dang nhap </a>";
	} else {
		echo "ma kich hoat khong dung";
		echo "<a href='index.php'>kich vao day de vao trang chinh </a>";
	}


 ?>