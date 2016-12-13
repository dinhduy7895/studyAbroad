<?php include '../connect.php'; ?>
<?php include 'header.php'; 
   if (isset($_SESSION['admin'])) {
      header('Location: news.php');
   }
?>

<div class="wrapper">

   <?php include 'sidebar.php'; ?>
   <div class="container-fluid">
   <?php include 'navbar.php'; ?>
      <div class="row">
         <div class="col-xs-12">

            <h3 class="page-header">
               Dashboard <small>Dashboard and statistics</small>
            </h3>

            <h3 style="display: inline-block; float: right;"><a href="university_addnews.php">Add news</a></h3>
            <?php
               $nameUniversity = $_SESSION['university'];
               $stmt = $conn->prepare("SELECT IdUniversity FROM university WHERE NameUniversity = :nameUniversity");
               $stmt->execute(array(':nameUniversity'=>$nameUniversity));
               $row = $stmt->fetch(PDO::FETCH_ASSOC);
               $idUniversity =  $row['IdUniversity'];
               $_SESSION['idUniversity'] = $idUniversity;
               $sql = "SELECT * FROM news WHERE IdUniversity = {$idUniversity}";
               $q = $conn->query($sql);
               $q->setFetchMode(PDO::FETCH_ASSOC);
            ?>
            <table class="table table-bordered table-condensed">
               <thead>
                  <tr>
                     <th>ID</th>
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
                  <td><?php echo htmlspecialchars($row['IdScholarship']); ?></td>
                  <td><?php echo htmlspecialchars($row['Title']); ?></td>
                  <td><?php echo htmlspecialchars($row['HeadContext']); ?></td>
                  <td><?php echo htmlspecialchars($row['Datenews']); ?></td>
                  <td><a href="university_view.php?id=<?php echo $row['Id']?>">View</a></td>
                  <td><a href="university_edit.php?id=<?php echo $row['Id']?>">Edit</a></td>
                  <td><a href="university_del.php?id=<?php echo $row['Id']?>" onclick="return confirmAction()">Delete</a></td>
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
<?php include 'footer.php'; ?>