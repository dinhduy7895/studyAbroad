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
         $id = $_GET['id'];
         $stmt_edit = $conn->prepare('SELECT * FROM news where Id =:id');
         $stmt_edit->execute(array(':id'=>$id));
         $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
         extract($edit_row);
          if (isset($_POST['submit'])) {
               $tenhinh ="";
               $tenhinh = ($_FILES['image_news']['name']);
               if ($tenhinh != ""){
                  $arr_tachfile = explode('.',$tenhinh);
                  $dem = count ($arr_tachfile);
                  $duoifile = $arr_tachfile[$dem-1];
                  unset ($arr_tachfile[$dem-1]);
                  $str_noifile = '';
                  foreach ($arr_tachfile as $key => $value) {
                     if ($key == 0) {
                        $str_noifile = $str_noifile.$value;
                     } else {
                        $str_noifile = $str_noifile.'_'.$value;
                     }              
                  }
                  $time = time();
                  $tenfilemoi = 'Img'.'_'.$time.'.'.$duoifile;
                  echo $tenfilemoi;
                  $tmp_name = $_FILES['image_news']['tmp_name'];
                  $path_upload = 'files/'.$tenfilemoi;
                  unlink('files/'.$edit_row['Image']);
                  $result = move_uploaded_file($tmp_name, $path_upload);
                  
                  $hinhanh = $tenfilemoi;
               } else {
                  $hinhanh = "";
               }
              $IdUniversity = $_POST["IdUniversity"];
              $Title = $_POST['title'];
              $Context = $_POST['cktext'];
              $Datenews = date("Y-m-d");
              $upd = "UPDATE news SET IdUniversity='{$IdUniversity}', Title='{$Title}', Context='{$Context}', Datenews='{$Datenews}',Image='{$hinhanh}' WHERE Id = {$id}";
              $q = $conn->query($upd);
              if($q){
                header("location: news.php?msg=Updated");exit();
              }else {
                header("location: news.php?msg=Error");exit();
              }
          }
          ?>
        <section id="main-content">
          <div class="container">
         <h2 class="margin-bottom-10">Thêm bài viết</h2>
            

          <p>(*): Không được để trống</p>
          <form action="" class="templatemo-login-form" id="add_news" method="post" enctype="multipart/form-data" novalidate="novalidate">
             <?php
                  
                  $sql = "SELECT * FROM news where Id = {$id}";
                  $q = $conn->query($sql);
                  $q->setFetchMode(PDO::FETCH_ASSOC);
                  while ($row = $q->fetch()) {
                   $IdUniversity = $row['IdUniversity'];
                   $Title= $row['Title'];
                   $Context = $row['Context'];
                   $Image = $row['Image'];
                  ?>
            <div class="row form-group">
              <div class="col-lg-6">
                <label>ID University</label>
                <input type="text" name="IdUniversity" class="form-control" id="IdUniversity" value="<?php echo $IdUniversity; ?>">
              </div>
            </div>    
            <div class="row form-group">
              <div class="col-lg-6">
                <label>Tên bài viết (*)</label>
                <input type="text" name="title" class="form-control" id="inputFirstName" value="<?php echo $Title; ?>">
              </div>
            </div>
            
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="control-label templatemo-block">Hình ảnh</label> 
                <img src="files/<?php echo $Image; ?>" alt="">
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
                <p>Dung lượng tối đa hình ảnh là 5 MB.</p>                  
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12 form-group" id="editor"> 
                <label class="control-label">Chi tiết</label>
                <textarea name="cktext" rows="7" cols="90" class="input-long ckeditor" style="visibility: hidden; display: none;"></textarea>
              </div>
            </div>
            <div class="form-group text-right">
            <input type="submit"  name="submit"  class="templatemo-blue-button" value="Đăng"/>
            <input type="reset" class="templatemo-white-button" value="Nhập lại" />
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
        "ten_bv": {
          required: "Vui lòng nhập vào đây",
        },
        cktext:{ 
          required:"Vui lòng nhập vào khung Giới thiệu thành viên", 
          minlength:"Bạn không được để trống khung này" 
        } 
      }
    });
  }); 
</script>
