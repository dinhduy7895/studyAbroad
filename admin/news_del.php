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
			  $stmt_select = $conn->prepare('SELECT Image FROM news WHERE Id =:id');
			  $stmt_select->execute(array(':id'=>$id));
			  $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
			  unlink("files/".$imgRow['Image']);

			  $stmt_delete = $conn->prepare('DELETE FROM news WHERE Id =:id');
			  $stmt_delete->bindParam(':id',$id);
		      $stmt_delete->execute();

		    // $sql = "DELETE FROM news WHERE id={$id}";
		    // $conn->exec($sql);
		   	header("location:news.php?deleted");exit();
		    }
		catch(PDOException $e)
		{
		    header("location:news.php?error");exit();
	    }
	}
	include 'inc/footer.php';
?>