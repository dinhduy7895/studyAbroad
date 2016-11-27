<?php $title = 'Search';?>
<?php
    session_start(); 
    include('connect.php');
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
<?php include 'header.php';?>
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
          $sql = $conn->prepare('Select IdUniversity,NameUniversity from university ');
          $sql->execute();
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
              $idUniversity = $row['IdUniversity'];
              $nameUniversity         = $row['NameUniversity'];
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
          $sql = $conn->prepare("Select IdMajor,Name from major ");
          else
           $sql = $conn->prepare("Select m.IdMajor,m.Name from major m ,scholarshipinfor s where m.IdMajor=s.IdMajor  and s.IdUniversity = '$universitySelected'");
          $sql->execute();
          while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
              $idMajor   = $row['IdMajor'];
              $nameMajor = $row['Name'];
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
        <tr>
          <th>University</th>
          <th>Major</th>
          <th>From</th>
          <th>To</th>
          <th>Register</th>
        </tr>
          <?php
          $today    = date("Y-m-d");
          $array    = $user->search($universitySelected, $majorSelected);
          $len      = count($array);
          for ($count = 0; $count < $len; $count++) {
              $arrayRow = $array[$count];
?>

          <tr>
            <td>
              <?php
              echo $arrayRow['NameUniversity'];
?>
            </td>
            <td>
              <?php
              echo $arrayRow['Name'];
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
                  <a data-toggle="modal" href="#myModal">OK</a>
                  <?php
              }
?>
              </th>
          </tr>
          <?php
          }
?>

      </table>
        </div>
    </div>
  </section>
  <?php include 'footer.php'; ?>