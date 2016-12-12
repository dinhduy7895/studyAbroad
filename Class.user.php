<?php

class USER
{
    private $db;
    
    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }
    
    public function register($fname,$lname,$name,$email,$pass,$phone,$year)
    {
        if ($name == 'admin') {
            $error = 'cannot register user with admin name';
            header('Location: index2.php?msg='.$error);
            return ;
        }
        try
        {
            $pass = md5($pass);
            $stmt = $this->db->prepare("INSERT INTO user (Name, Email, Pass,FirstName,LastName,YearOld,PhoneNumber)
            VALUES(:name, :email, :pass,:fname,:lname,:year,:phone)");
            
            $stmt->bindparam(":name", $name);
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":pass", $pass);
            $stmt->bindparam(":year", $year);
            $stmt->bindparam(":phone", $phone);
            
            $stmt->execute();
            
            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function contact($name,$from,$to,$startYear,$numYear,$country,$opinion)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO sinhvien  (Name, AidFrom, AidTo,StartYear,NumberOfYear,Country,Opinion)
            VALUES(:name, :afrom , :ato,:startYear,:numYear,:country,:opinion)");
            
            $stmt->bindparam(":name", $name);
            $stmt->bindparam(":afrom", $from);
            $stmt->bindparam(":ato", $to);
            $stmt->bindparam(":startYear", $startYear);
            $stmt->bindparam(":numYear", $numYear);
            $stmt->bindparam(":country", $country);
            $stmt->bindparam(":opinion", $opinion);
            
            $stmt->execute();
            
            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function search($universityID,$majorID)
    {
        $sql = 'SELECT  u.NameUniversity, m.NameMajor,u.Country,s.Fee,s.Scholarship,s.NumberOfYear,s.StartDay, s.EndDay, n.Url   FROM news n ,scholarshipinfor s, university u, major m where n.IdScholarship = s.IdScholarship and u.IdUniversity = s.IdUniversity and m.IdMajor = s.IdMajor ';
        if($universityID != "None"){
            $sql .= "and u.IdUniversity = '$universityID' ";
        }
        if($majorID != "None"){
            $sql .= "and m.IdMajor = '$majorID'  ";
        }
        $result = $this->db->prepare($sql);
        $result->execute();
        $array=$result->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }
    public function login($uname,$umail,$upass)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM user WHERE Name=:uname OR Email=:umail LIMIT 1");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0)
            {
                if($upass == $userRow['Pass'])
                {
                    $_SESSION['user_session'] = $userRow['Name'];
                    $_SESSION['FirstName'] = $userRow['FirstName'];
                    $_SESSION['LastName'] = $userRow['LastName'];
                    $_SESSION['idUser'] = $userRow['Id'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else{
                return false;
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }
    
    public function redirect($url)
    {
        header("Location: $url");
    }
    
    //    public function logout()
    //    {
    //         session_destroy();
    //         unset($_SESSION['user_session']);
    //         return true;
    //    }
}
?>