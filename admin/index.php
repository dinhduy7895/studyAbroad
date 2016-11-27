<?php include '../connect.php'; ?>
<?php include 'header.php'; ?>
<div class="wrapper">

  <?php include 'sidebar.php'; ?>
  <div class="container-fluid">
    <?php include 'navbar.php'; ?>
    <div class="row">
            <div class="col-xs-12">
            
            <h3 class="page-header">
              Dashboard <small>Dashboard and statistics</small>
            </h3>
      <?php
          $sql = "SELECT Id, FirstName, LastName FROM user";
          $q = $conn->query($sql);
          $q->setFetchMode(PDO::FETCH_ASSOC);
      ?> 
      <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Id']); ?></td>
                            <td><?php echo htmlspecialchars($row['FirstName']); ?></td>
                            <td><?php echo htmlspecialchars($row['LastName']); ?></td>
                            <td><a href="/admin/baiviet_edit.php?id=<?php echo $row['Id']?>">Edit</a></td>
              <td><a href="/admin/baiviet_del.php?id=<?php echo $row['Id']?>" onclick="return confirmAction()">Delete</a></td>
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