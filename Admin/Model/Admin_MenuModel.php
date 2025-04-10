<?php
    require_once '../Connect/connectDatabase.php';
    class Admin_MenuModel{
        private $db = null;
        
        public function __construct()
        {
            $this->db =  new Database();
        }
        public function Show_Menu($MenuID){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM tbl_menu WHERE MenuID = $MenuID";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            return $row;
        }
        public function ShowMenuLimit($limit,$offset){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM tbl_menu LIMIT $limit OFFSET $offset";
            $result = $conn->query($query);
            return $result;
        }
        public function SetCount(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS total_menu FROM tbl_menu";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            return $row;
        }
        public function Add_Menu($Title,$IsActive,$Levels,$ParentID,$MenuOrder,$Link){
            $conn = $this->db->getConnection();
            $query ="INSERT INTO tbl_menu(Title,IsActive,Levels,ParentID,MenuOrder,Link)
            VALUES('$Title',$IsActive,$Levels,$ParentID,$MenuOrder,'$Link')";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Menu($menuID,$Title,$IsActive,$Levels,$ParentID,$MenuOrder,$Link){
            $conn = $this->db->getConnection();
            $query = "UPDATE tbl_menu 
                      SET Title = '$Title',
                          IsActive = $IsActive,
                          Levels = $Levels,
                          ParentID = $ParentID,
                          MenuOrder = $MenuOrder,
                          Link = '$Link'
                      WHERE MenuID = $menuID";
            $result = $conn->query($query);
            return $result;
        }
        public function Delete_Menu($MenuID){
            $conn = $this->db->getConnection();
            $query = "DELETE FROM tbl_menu WHERE MenuID = $MenuID";
            $result = $conn->query($query);
            return $result;
        }
    }
?>