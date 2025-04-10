<?php
require_once '../Connect/connectDatabase.php';

class CheckLogin_model {
    private $db = null;

    public function __construct() {
        $this->db = new Database();
    }
    public function NewLogin_Customer($UserID){
        $conn = $this->db->getConnection();
        $query = "SELECT UserName,Title,IDRole FROM user WHERE UserID = $UserID";
        $result = $conn->query($query);
        return $result;    
    }
    public function Save_newLogin($username,$fullname,$time,$idrole){
        $conn = $this->db->getConnection();
        $query = "INSERT INTO login_new(UserName,Fullname,Time,IDRole) VALUES ('$username','$fullname','$time',$idrole)";
        $result = $conn->query($query);
        return $result; 
    }

    public function CheckLoginModel($username, $password) {
        $conn = $this->db->getConnection();
        $password_hash = md5($password);
        $query = "SELECT * FROM user WHERE UserName = ? AND Password = ? AND IDRole = 2";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password_hash);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userID = $row['UserID'];
            $userName = $row['UserName'];
            $img = $row['Image'];
            session_start();
            $_SESSION['staffID'] = $userID;
            $_SESSION['taikhoan'] = $userName;
            $_SESSION['file'] = $img;
            return true;
        } else {
            return false;
        }
    }
}
?>
