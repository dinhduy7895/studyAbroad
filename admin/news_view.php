<?php include('../functions/connect.php');
   include 'inc/header.php'; 
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
   <?php include 'inc/footer.php'; ?>