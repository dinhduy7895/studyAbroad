<?php include '../connect.php'; ?>
<?php include 'header.php'; ?>
<?php 
  session_start(); 
 $id = $_GET['id'];
$sql1 = "SELECT Id, Name, FirstName, LastName FROM user where Id = 1";
$q = $conn->query($sql1);
$q->setFetchMode(PDO::FETCH_ASSOC); 
echo $id;
echo $sql1;

echo "<br>ID: " . $row['Id'];
?>