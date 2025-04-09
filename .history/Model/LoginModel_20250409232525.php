<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Connect/connectDatabase.php';
// require_once './Connect/connectDatabase.php';
class LoginModel{
    private $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function CheckLoginModel($username, $password){
        $conn = $this->db->getConnection();
        $username = mysqli_real_escape_string($conn, $username); 
        $password = mysqli_real_escape_string($conn, $password); 
        $passwords = md5($password);
        $query = "SELECT UserName,UserID, Password,Image FROM user WHERE UserName = '$username' AND Password = '$passwords'";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $UserID = $row['UserID'];
            $UserName = $row['UserName'];
            $img = $row['Image'];
            session_start();
            $_SESSION['userID'] = $UserID;
            $_SESSION['userName'] = $UserName;
            $_SESSION['img'] = $img;
            return true; 
        } else {
            return false;
        }
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

    public function setUserCustomer($Title, $UserName, $Password, $Email, $Phone_Numbers, $Address, $RegistrationDate){
        $conn = $this->db->getConnection();
        $Title = mysqli_real_escape_string($conn, $Title); 
        $UserName = mysqli_real_escape_string($conn, $UserName); 
        $Password = mysqli_real_escape_string($conn, $Password); 
        $passwords =md5($Password);
        $Email = mysqli_real_escape_string($conn, $Email);
        $Phone_Numbers = mysqli_real_escape_string($conn, $Phone_Numbers);
        $Address = mysqli_real_escape_string($conn, $Address);
        $RegistrationDate = mysqli_real_escape_string($conn, $RegistrationDate);
    
        $query = "INSERT INTO user(Title, UserName, Password, Email, Phone_Number, Address, RegistrationDate,Status, IDRole,Image) 
                  VALUES
                  ('$Title', '$UserName', '$passwords', '$Email', '$Phone_Numbers', '$Address', '$RegistrationDate','1', 3,'img/avt_trang.jpg')";
        $conn->query($query);
        $conn->close();
    }
    public function CheckUser($username,$email){
        $conn = $this->db->getConnection();
        $username = mysqli_real_escape_string($conn, $username); 
        $query = "SELECT UserName FROM user WHERE UserName = '$username' OR Email = '$email'";
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}
?>