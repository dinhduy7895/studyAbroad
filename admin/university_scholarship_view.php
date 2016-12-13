<?php include('../functions/connect.php');
include 'inc/header.php';
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
              <h3 class="page-header">
Dashboard <small>Dashboard and statistics</small>
</h3>
              <section id="main-content">
                <div class="container">
                  <h2 class="margin-bottom-10"Scholarship View Detail</h2>
                 

                  <table class="table table-bordered table-condensed">
                    <thead>
                  <tr>
                     <th>IdUniversity</th>
                     <th>IdScholarship</th>
                     <th>Fee</th>
                     <th>Scholarship</th>
                     <th>StartDay</th>
                     <th>EndDay</th>
                     <th>Number Of Year</th>
                  
                  </tr>
               </thead>
                    <?php
                  $sql = "SELECT * FROM university where NameUniversity = '".$_SESSION['university']."'";
                  $q = $conn->query($sql);
                  $q->setFetchMode(PDO::FETCH_ASSOC);
                  $row = $q->fetch();
                  $id = $row['IdUniversity'];

                  $sql = "SELECT * FROM scholarshipinfor where IdUniversity = {$id}";
                  $q = $conn->query($sql);
                  $q->setFetchMode(PDO::FETCH_ASSOC);
                  while ($row = $q->fetch()) {
                      $idUniversity = $row['IdUniversity'];
                      $idScholarship = $row['IdScholarship'];
                      $idMajor= $row['IdMajor'];
                      $fee = $row['Fee'];
                      $scholarship = $row['Scholarship'];
                      $starDay = $row['StartDay'];
                      $endDay = $row['EndDay'];
                      $numberOfYear = $row['NumberOfYear'];
                      ?>
                      <tbody>
                        <tr>
                          
                          <td>
                            <?php echo $idUniversity; ?>
                          </td>
                        
                          <td>
                            <?php echo $idScholarship; ?>
                          </td>
                      
                          <td>
                            <?php echo $fee; ?>
                          </td>
                    
                          <td>
                            <?php echo $scholarship; ?>
                          </td>
                       
                          <td>
                            <?php echo $starDay; ?>
                          </td>
                       
                          <td>
                            <?php echo $endDay; ?>
                          </td>
                      
                          <td>
                            <?php echo $numberOfYear; ?>
                          </td>
                        </tr>
                      
                      <?php } ?>
                      </tbody>
                  </table>
                </div>
              </section>
            </div>
          </div>
      </div>
      <?php include 'inc/footer.php'; ?>