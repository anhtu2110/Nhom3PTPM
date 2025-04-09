<?php
    require_once '../Connect/connectDatabase.php';
    class Profile_Model{
        private $db = null;

        public function __construct()
        {
            $this->db = new Database();
        }
        public function SetProfile_Model($userId){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM user WHERE UserID = '$userId' AND IDRole = 1";
            $result = $conn->query($query);
            $itemProfile =[];
            if($result && $result->num_rows > 0){
                $row = $result->fetch_assoc();
                $itemProfile[] = $row;
            }
            return $itemProfile;
        }
        public function UpdateAvt($userid,$link){
            $conn = $this->db->getConnection();
            $query = "UPDATE user SET Image = 'img/$link' WHERE UserID = $userid";
            $result = $conn->query($query);
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function Update_Information($userID,$fullname,$phone,$email,$password){
            $conn = $this->db->getConnection();
            $password_hash = md5($password);
            $query = "UPDATE user SET Title = '$fullname',Phone_Number = '$phone',Email ='$email',Password ='$password_hash' WHERE UserID = $userID";
            $result = $conn->query($query);
            if($result){
                return true;
            }else{
                return false;
            }
        }

    }
?>