<?php 
	include '../connect.php';
	include 'header.php';
?>
<?php 
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		try {
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "DELETE FROM admin WHERE id={$id}";
		    $conn->exec($sql);
		   	header("location:news.php?deleted");exit();
		    }
		catch(PDOException $e)
		{
		    header("location:news.php?error");exit();
	    }
	}
	include 'footer.php';
?>