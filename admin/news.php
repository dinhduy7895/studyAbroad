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
         <h3 style="display: inline-block;">News Table</h3>
         <h3 style="display: inline-block; float: right;"><a href="news_add.php">Add news</a></h3>
         <?php
            $sql = "SELECT * FROM news";
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            
         ?> 
         <table class="table table-bordered table-condensed">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>ID University</th>
                  <th>ID Scholarship</th>
                  <th>Title</th>
                  <th>HeadContext</th>
                  <th>Date</th>
                  <th>View</th>
                  <th>Edit</th>
                  <th>Delete</th>
               </tr>
            </thead>
            <tbody>
            <?php while ($row = $q->fetch()): ?>
            <tr>
               <td><?php echo htmlspecialchars($row['Id']); ?></td>
               <td><?php echo htmlspecialchars($row['IdUniversity']); ?></td>
               <td><?php echo htmlspecialchars($row['Title']); ?></td>
               <td><?php echo htmlspecialchars($row['HeadContext']); ?></td>
               <td><?php echo htmlspecialchars($row['Datenews']); ?></td>
               <td><a href="news_view.php?id=<?php echo $row['Id']?>">View</a></td>
               <td><a href="news_edit.php?id=<?php echo $row['Id']?>">Edit</a></td>
               <td><a href="news_del.php?id=<?php echo $row['Id']?>" onclick="return confirmAction()">Delete</a></td>
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