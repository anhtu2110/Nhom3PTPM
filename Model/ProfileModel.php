<?php 
    //require_once $_SERVER['DOCUMENT_ROOT'].'/Connect/connectDatabase.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Connect/connectDatabase.php';
    class Profile_Model{
        private $db = null;

        public function __construct()
        {   
            $this->db = new Database();
        }

        public function Show_ProfileModel($UserID){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM user WHERE UserID = '$UserID'";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Avatar($UserID,$img){
            $conn = $this->db->getConnection();
            $query = "UPDATE user SET Image = '$img' WHERE UserID = $UserID";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Information($UserID,$Title,$UserName,$Password,$Email,$Phone_Number,$Address){
            $conn = $this->db->getConnection();
            $Passwords = md5($Password);
            $query = "UPDATE user SET Title = '$Title', UserName = '$UserName', Password = '$Passwords',
             Email = '$Email', Phone_Number = '$Phone_Number', Address = '$Address' WHERE UserID = $UserID";
            $result = $conn->query($query);
            return $result;

        }
    }
?>