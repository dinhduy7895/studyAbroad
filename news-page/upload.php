<?php
    $allowedExts = array("doc", "docx", "pdf");
     if(isset($_POST['upload'])){
        $target_dir = "CV/";
		$target_file = $target_dir . basename($_FILES["fileCV"]["name"]);
        $extension = pathinfo($target_file,PATHINFO_EXTENSION);
        if ( in_array($extension, $allowedExts))
        {
            if ($_FILES["fileCV"]["error"] > 0)
            {
            echo "Return Code: " . $_FILES["fileCV"]["error"] . "<br>";
            }
            else
            {   
                $time = time();
                $idUser = $_SESSION['idUser'];
                $today    = date("Y-m-d");
               
                $sql = "INSERT INTO studentsubmit (IdUser,SubmitDate,IdScholarship) Values ($idUser, '$today', $idScholarship ) ";
				$q = $conn->query($sql);

                $sql = "SELECT * FROM studentsubmit where SubmitDate = '$today'";
                $q = $conn->query($sql);
                $q->setFetchMode(PDO::FETCH_ASSOC);
                $row = $q->fetch();
                $idSubmit = $row['IdSubmit'];

                echo "Upload: " . $_FILES["fileCV"]["name"] . "<br>";
                echo "Type: " . $_FILES["fileCV"]["type"] . "<br>";
                echo "Size: " . ($_FILES["fileCV"]["size"] / 200000) . " kB<br>";
                echo "Temp file: " . $_FILES["fileCV"]["tmp_name"] . "<br>";
                $fileName = $idScholarship."_".$idSubmit."_".$uname.".".$extension;
                
                move_uploaded_file($_FILES["fileCV"]["tmp_name"],
                "../admin/files/CV/" .$fileName);
                echo "Stored in: " . "CV/" . $fileName;
                $_SESSION['upload'] = true;
                
                
            }
        }
        else
        {
            $_SESSION['upload'] = false;
            echo "Invalid file";
        }
    }
    header("HTTP/1.1 303 See Other");
        header("Location: ".$_SESSION['url']);
		die();
?>