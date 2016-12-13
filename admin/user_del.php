<?php 
	include '../functions/connect.php';
	include 'inc/header.php';
	if (isset($_SESSION['university'])) {
		header('Location: university.php');
	}
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
		   	header("location:news.php?deleted");exit();
		    }
		catch(PDOException $e)
		{
		    header("location:news.php?error");exit();
	    }
	}
	include 'inc/footer.php';
?>