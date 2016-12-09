<?php include('../connect.php');
   include 'header.php'; 
   if (!isset($_SESSION['admin'])) {
      header('Location: index.php');
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
            <section id="main-content">
               <div class="container">
                  <h2 class="margin-bottom-10">News View Detail</h2>
                  <p>(*): Not be empty</p>
                  
                  <table>
                  <?php
                     $id = $_GET['id'];
                     $sql = "SELECT * FROM news where Id = {$id}";
                     $q = $conn->query($sql);
                     $q->setFetchMode(PDO::FETCH_ASSOC);
                     while ($row = $q->fetch()) {
                        $idUniversity = $row['IdUniversity'];
                        $idScholarship = $row['IdScholarship'];
                        $title= $row['Title'];
                        $headContext = $row['HeadContext'];
                        $context = $row['Context'];
                        $image = $row['Image'];
                  ?>
                     <tbody>
                        <tr>
                           <th>Id University</th>
                           <td><?php echo $idUniversity; ?></td>
                        </tr>
                         <tr>
                           <th>Id Scholarship</th>
                           <td><?php echo $idScholarship; ?></td>
                        </tr>
                         <tr>
                           <th>Title</th>
                           <td><?php echo $title; ?></td>
                        </tr>
                         <tr>
                           <th>HeadContext</th>
                           <td><?php echo $headContext; ?></td>
                        </tr>
                         <tr>
                           <th>Context</th>
                           <td><?php echo $context; ?></td>
                        </tr>
                         <tr>
                           <th>Image</th>
                           <td><img class="img-responsive" src="<?php echo $idUniversity; ?>" alt="img"></td>
                        </tr>
                     </tbody>
                     <?php } ?>
                  </table>
               </div>
            </section>
         </div>
      </div>
   </div>
   <?php include 'footer.php'; ?>