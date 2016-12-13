<?php include '../functions/connect.php'; ?>
<?php include 'inc/header.php'; 
   if (isset($_SESSION['admin'])) {
      header('Location: news.php');
   }
?>
<div class="wrapper">

   <?php include 'inc/sidebar.php'; ?>
   <div class="container-fluid">
   <?php include 'inc/navbar.php'; ?>
      
      <div class="row">
         <div class="col-xs-12">
         <h3>Student Submit </h3>
         <?php
		 	

            $result = $conn->prepare("SELECT * FROM studentsubmit");
            $result->execute();
            $arraySS=$result->fetchAll(PDO::FETCH_ASSOC);
            $lenSS = count($arraySS); //tổng số lượng

            $sql = "SELECT * FROM university where NameUniversity = '".$_SESSION['university']."'";
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
         ?> 
         <table class="table table-bordered table-condensed">
            <thead>
               <tr>
                  <th>University</th>
                  <th>Number</th>
                  <th>Person</th>
               </tr>
            </thead>
            <tbody>
            <?php $row = $q->fetch();
                $result = $conn->prepare("SELECT studentsubmit.IdScholarship   from studentsubmit,scholarshipinfor where studentsubmit.IdScholarship = scholarshipinfor.IdScholarship and scholarshipinfor.IdUniversity=".$row['IdUniversity']);
                $result->execute();
                $numOfStudent=$result->fetchAll(PDO::FETCH_ASSOC); //tong so sinh vien/truong
                $countStudent = count($numOfStudent);
                $percent = $countStudent/$lenSS * 100;
            ?>
            <tr>
               <td><?php echo htmlspecialchars($row['NameUniversity']); ?></td>
               <td><?php echo $countStudent; ?></td>
               <td><?php echo $percent; ?> %</td>
            </tr>
           
            </tbody>
         </table>  
         </div>
      </div> <!-- / .row -->
      <div class="row">
         <div class="col-xs-12">
         <h3>Detail </h3>
         <?php
         

            $sql = "SELECT us.FirstName, us.LastName, u.NameUniversity, ss.SubmitDate from user us, university u , studentsubmit ss, scholarshipinfor s WHERE ss.IdUser = us.Id and ss.IdScholarship = s.IdScholarship AND s.IdUniversity = u.IdUniversity and u.NameUniversity = '".$_SESSION['university']."'";
            $q = $conn->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
         ?> 
         <table class="table table-bordered table-condensed">
            <thead>
               <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>University</th>
                  <th>Submit Date</th>
               </tr>
            </thead>
            <tbody>
            <?php while ($row = $q->fetch()): 
    
            ?>
            <tr>
               <td><?php echo htmlspecialchars($row['FirstName']); ?></td>
               <td><?php echo htmlspecialchars($row['LastName']); ?></td>
               <td><?php echo htmlspecialchars($row['NameUniversity']); ?></td>
               <td><?php echo htmlspecialchars($row['SubmitDate']); ?></td>
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