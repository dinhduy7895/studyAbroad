<?php include '../functions/connect.php'; ?>
<?php include 'inc/header.php'; 
   if (isset($_SESSION['university'])) {
      header('Location: university.php');
   }
?>
<div class="wrapper">
   <?php include 'inc/sidebar.php'; ?>
   <div class="container-fluid">
   <?php include 'inc/navbar.php'; ?>
      <div class="row">
         <div class="col-xs-12">
         <h3 style="display: inline-block;">Admin</h3>
         <h3 style="display: inline-block; float: right;"><a href="admin_add.php">Create new admin account</a></h3>
         <?php
            $sql = "SELECT Id, Name, Level,Email FROM admin";
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
         ?> 
         <table class="table table-bordered table-condensed">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Level</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
               </tr>
            </thead>
            <tbody>
            <?php while ($row = $q->fetch()): ?>
            <tr>
               <td><?php echo htmlspecialchars($row['Id']); ?></td>
               <td><?php echo htmlspecialchars($row['Name']); ?></td>
               <td><?php echo htmlspecialchars($row['Level']); ?></td>
               <td><?php echo htmlspecialchars($row['Email']); ?></td>
               <?php 
                  if ($_SESSION['admin_level'] <= $row['Level']) {
               ?>
               <td><a href="admin_edit.php?id=<?php echo $row['Id']?>">Edit</a></td>
               <td><a href="admin_del.php?id=<?php echo $row['Id']?>" onclick="return confirmAction()">Delete</a></td>

               <?php } ?>
            </tr>
            <?php endwhile; ?>
            </tbody>
         </table>  
         </div>
      </div> <!-- / .row -->
   <script type="text/javascript">
   function confirmAction() {
   return confirm("Are you sure to delete ?")
   }
   </script> 
<?php include 'inc/footer.php'; ?>