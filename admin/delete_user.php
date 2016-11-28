<?php 
	include '../connect.php';
	include 'header.php';
?>
<?php 
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		try {
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    // sql to delete a record
		    $sql = "DELETE FROM user WHERE id={$id}";
		    // use exec() because no results are returned
		    $conn->exec($sql);
		   	header("location:index.php?deleted");exit();
		    }
		catch(PDOException $e)
		{
		    header("location:index.php?error");exit();
	    }
	}
	include 'footer.php';
?>