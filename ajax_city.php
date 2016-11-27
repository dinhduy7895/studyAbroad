<?php
include('connect.php');
if($_POST['id'])
{
    $id=$_POST['id'];
    if($id == 'None')
    $sql = $conn->prepare("Select m.IdMajor,m.Name from major m");
    else
    $sql = $conn->prepare("Select m.IdMajor,m.Name from major m ,scholarshipinfor s where m.IdMajor=s.IdMajor  and s.IdUniversity = '$id'");
    $sql->execute(); ?>
    <option selected="selected">None</option>
  <?php  while($row=$sql->fetch(PDO::FETCH_ASSOC))
    {
        $id=$row['IdMajor'];
        $data=$row['Name'];
        echo '<option value="'.$id.'">'.$data.'</option>';
    }
}
?>