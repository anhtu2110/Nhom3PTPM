<?php
    require_once '../Connect/connectDatabase.php';
    class Admin_UserModel{
        private $db = null;

        public function __construct()
        {
            $this->db = new Database();
        }
        public function getTotalUsers() {
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS total FROM user WHERE IDRole = 2";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            return $row;
        }
        public function Show_UserModel($limit,$offset){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM user WHERE IDRole = 2 LIMIT $limit OFFSET $offset";
            $result = $conn->query($query);
            return $result;
        }
        public function Show_Staff($userID){
            $conn=$this->db->getConnection();
            $query = "SELECT * FROM user WHERE UserID = $userID";
            $result = $conn->query($query);
            return $result;
        }
        public function Add_Staff($fullname,$username,$password,$email,$phone,$address,$image,$extraTime,$status){
            $conn=$this->db->getConnection();
            $hashed_password = md5($password);
            $query = "INSERT INTO user(Title,UserName,Password,Email,Phone_Number,Address,Image,RegistrationDate,Status,IDRole)
            VALUES ('$fullname','$username','$hashed_password','$email','$phone','$address','img/$image','$extraTime',$status,2)";
            $result = $conn->query($query);
            if($result){
                return true;
            }
            else{
                return false;
            }
        }
        public function Delete_Staff($userID){
            $conn = $this->db->getConnection();
            $query = "DELETE FROM user WHERE UserID = $userID";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Staff($userID,$fullname,$username,$password,$email,$phone,$address,$image,$extraTime,$status){
            $conn=$this->db->getConnection();
            $hashed_password = md5($password);
            $query = "UPDATE user 
          SET Title = '$fullname', 
              UserName = '$username', 
              Password = '$hashed_password', 
              Email = '$email', 
              Phone_Number = '$phone', 
              Address = '$address', 
              Image = 'img/$image', 
              RegistrationDate = '$extraTime', 
              Status = $status
          WHERE UserID = $userID";

            $result = $conn->query($query);
            if($result){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>