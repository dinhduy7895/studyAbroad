<?php include('../connect.php');
include 'header.php'; ?>
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
            $uploadOk = 1;
            $id = $_GET['id'];
            $stmt_edit = $conn->prepare('SELECT * FROM news where Id =:id');
            $stmt_edit->execute(array(':id'=>$id));
            $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
            extract($edit_row);
            if (isset($_POST['submit'])) {
               $imgName ="";
               $imgName = ($_FILES['image_news']['name']);
               if ($_FILES["image_news"]["size"] > 400000) {
                  echo "<span class='error'>Sorry, your file is too large. </span></br>";
                  $uploadOk = 0;
               }
               if ($uploadOk != 0 &&  $imgName != ""){
                  $arr_splitfile = explode('.',$imgName);
                  $count = count ($arr_splitfile);
                  $extension = $arr_splitfile[$count-1];
                  unset ($arr_splitfile[$count-1]);
                  $join = '';
                  foreach ($arr_splitfile as $key => $value) {
                     if ($key == 0) {
                        $join = $join.$value;
                     } else {
                        $join = $join.'_'.$value;
                     }         
                  }
                  $time = time();
                  $imgNewName = 'Img'.'_'.$time.'.'.$extension;
                  // echo $imgNewName;
                  $tmp_name = $_FILES['image_news']['tmp_name'];
                  $path_upload = 'files/'.$imgNewName;
                  unlink('files/'.$edit_row['Image']);
                  $result = move_uploaded_file($tmp_name, $path_upload);
                  $image = $imgNewName;
                  $idUniversity = $_POST["idUniversity"];
                  $idScholarship = $_POST["idScholarship"];
                  $title = $_POST['title'];
                  $headContext = $_POST['cktext1'];
                  $context = $_POST['cktext'];
                  $Datenews = date("Y-m-d");
                  $upd = "UPDATE news SET IdUniversity='{$idUniversity}',IdScholarship='{$idScholarship}', Title='{$title}',HeadContext='{$headContext}', Context='{$context}', Datenews='{$Datenews}',Image='{$image}' WHERE Id = {$id}";
                  $q = $conn->query($upd);
                  if ($q) {
                     header("location: news.php?msg=Updated");exit();
                  } else {
                     header("location: news.php?msg=Error");exit();
                  }
               } else {
                  echo '<span class="error">cannot update. please enter exactly information </span>';
               }

            }
         ?>
        <section id="main-content">
          <div class="container">
         <h2 class="margin-bottom-10">Edit News</h2>
            

          <p>(*): Not be empty</p>
          <form action="" class="templatemo-login-form" id="add_news" method="post" enctype="multipart/form-data" novalidate="novalidate">
             <?php
                  
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
            <div class="row form-group">
              <div class="col-lg-6">
                <label>ID University</label>
                <input type="text" name="idUniversity" class="form-control" id="idUniversity" value="<?php echo $idUniversity; ?>">
              </div>
            </div>    
            <div class="row form-group">
              <div class="col-lg-6">
                <label>ID Scholarship</label>
                <input type="text" name="idScholarship" class="form-control" id="idScholarship" value="<?php echo $idScholarship; ?>">
              </div>
            </div> 
            <div class="row form-group">
              <div class="col-lg-6">
                <label>Title (*)</label>
                <input type="text" name="title" class="form-control" id="inputFirstName" value="<?php echo $title; ?>">
              </div>
            </div>
            
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="control-label templatemo-block">Image</label> 
                <img src="files/<?php echo $image; ?>" alt="">
                <input type="file" name="image_news" id="fileToUpload" value="" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true" data-icon="false" onchange="viewImg(this)">
                <script>
                function viewImg(img) {
                  var fileReader = new FileReader;
                  fileReader.onload = function(img) {
                    var avartarShow = document.getElementById("avartar-img-show");
                    
                    avartarShow.src = img.target.result
                  }, fileReader.readAsDataURL(img.files[0])
                }
                </script>     
                <p>Maximum Filesize is 400kB.</p>                  
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12 form-group" id="editor"> 
                <label class="control-label">Head Context</label>
                <textarea name="cktext1" rows="7" cols="90" class="input-long ckeditor" style="visibility: hidden; display: none;"><?php echo $headContext; ?></textarea>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12 form-group" id="editor"> 
                <label class="control-label">Detail Info</label>
                <textarea name="cktext" rows="7" cols="90" class="input-long ckeditor" style="visibility: hidden; display: none;"><?php echo $context; ?></textarea>
              </div>
            </div>
            <div class="form-group text-right">
            <input type="submit"  name="submit"  class="templatemo-blue-button" value="Submit"/>
            <input type="reset" class="templatemo-white-button" value="reset" />
            </div>   
            <?php } ?>                        
          </form>
          </div>
        </section>
      </div>

    </div>
   </div> <!-- / .row -->
</div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript">
    $(document).ready(function () {
    $('#add_news').validate({
      rules: {
        "name": {
          required: true,
        },
        cktext:{ 
          required: function() 
          {
            CKEDITOR.instances.cktext.updateElement(); 
          }, 
          minlength:1,
        } 
      },
      messages: {
        cktext:{ 
          required:"Please enter here",
          minlength:"Please enter here",
        } 
      }
    });
  }); 
</script>
