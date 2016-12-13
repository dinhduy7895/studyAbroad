<?php $title = 'Search';?>
<?php 
    session_start(); 
    include('functions/connect.php');
    $universitySelected = $majorSelected  ="None";
    if(count($_POST) > 0) {
        $_SESSION['univer'] = $_POST['univer'];
        $_SESSION['major']  = $_POST['major'];
        header("HTTP/1.1 303 See Other");
        header("Location: search.php");
        die();
    }
    else if (isset($_SESSION['univer'])){
        $universitySelected = $_SESSION['univer'];
        $majorSelected  = $_SESSION['major'];
        session_unset();
        session_destroy();
    }
?>
<?php include 'inc/header.php';?>

  <section class="search-field">
    <div class="container">
        <div class=" search row">
               <script type="text/javascript">
      $(document).ready(function() {
        $(".univer").change(function() {
          var iduniver = $(this).val();

          $.ajax({
            type: "POST",
            url: "ajax_city.php",
            data: {
              id: iduniver
            },
            cache: false,
            success: function(html) {
              $(".major").html(html);
            }
          });

        });

      });
    </script>
      <form method="post" action="search.php?true">
        <label for="univer" class="fleft col-lg-2">University : </label> 
        <select name="univer" class="univer fleft col-lg-3">
          <option selected="selected" value = "None">None</option>

          <?php
          $sql = $conn->prepare('Select IdUniversity,NameUniversity,Url from university ');
          $sql->execute();
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
              $idUniversity = $row['IdUniversity'];
              $nameUniversity = $row['NameUniversity'];
              $urlUniversity = $row['Url']; 
              if(  $universitySelected ==  $idUniversity )
              echo '<option  value="' . $idUniversity . '" selected="selected" >' . $nameUniversity . '</option>';
              else 
              echo '<option  value="' . $idUniversity . '"  >' . $nameUniversity . '</option>';
          }
?>
        </select>
        
        <label for="major" class="fleft col-lg-1">Major : </label>
        <select name="major" class="major col-lg-3">
          <option selected="selected">None</option>
          <?php
         if($universitySelected =="None")
          $sql = $conn->prepare("Select IdMajor,NameMajor from major ");
          else
           $sql = $conn->prepare("Select m.IdMajor,m.NameMajor from major m ,scholarshipinfor s where m.IdMajor=s.IdMajor  and s.IdUniversity = '$universitySelected'");
          $sql->execute();
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
              $idMajor   = $row['IdMajor'];
              $nameMajor = $row['NameMajor'];
               if(   $majorSelected ==  $idMajor )
               echo '<option value="' . $idMajor . '" selected="selected" >' . $nameMajor . '</option>';
               else
               echo '<option value="' . $idMajor . '"  >' . $nameMajor . '</option>';
          }
?>
        </select>
        <input class="col-lg-2 fright" type="submit" value = " Seach"> 
      </form>

      <table class="table table-hover table-striped bdt" id="bootstrap-table">
        <thead>
          <tr>         
            <th>University</th>
            <th>Major</th>
            <th>Country</th>
            <th>Fee ( USD/Year )</th>
            <th>Scholarship(%)</th>
            <th>Recruitin From</th>
            <th>End </th>
            <th>Recruiting</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $today    = date("Y-m-d");
          $array    = $user->search($universitySelected, $majorSelected);
          $len      = count($array);
          for ($count = 0; $count < $len; $count++) {
              $arrayRow = $array[$count];
          ?>
          
          <tr>
            <td>
              <a href="<?php echo $urlUniversity; ?>">
                <?php
                  echo $arrayRow['NameUniversity'];
                ?>
              </a>
            </td>
            <td>
              <?php
              echo $arrayRow['NameMajor'];
              ?>
            </td>
            <td>
              <?php
              echo $arrayRow['Country'];
            ?>
            </td>
            <td>
              <?php
              echo $arrayRow['Fee'];
            ?>
            </td>
            <td>
              <?php
              echo $arrayRow['Scholarship'];
            ?>
            </td>
            <td>
              <?php
              echo $arrayRow['StartDay']
              ?>
            </td>
            <td>
              <?php
              echo $arrayRow['EndDay'];
              ?>
            </td>
            <?php
              $start = $arrayRow['StartDay'];
              $end   = $arrayRow['EndDay'];
            ?>
              <th>
                <?php
              if ($start <= $today && $end >= $today) {
              ?>
                  <a style="padding: 0px 16px; font-size: 15px; font-weight: bold;" class ="btn  btn-success " data-toggle="modal" href="<?php echo $arrayRow['Url'] ?>">Detail</a>
                  <?php
              }
              ?>
              </th>
          </tr>
          <?php
          }
          ?>
      </tbody>
      </table>
        </div>
    </div>
    
  </section>
  <?php include 'inc/footer.php'; ?>