<?php
 //require_once './Connect/connectDatabase.php';
 require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Connect/connectDatabase.php';
    class MenuModel{
        private $db = null;

        public function __construct(){
            $this->db = new Database();
        }

        public function getMenuItems(){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM tbl_menu WHERE Levels = 1 AND IsActive = 1 
            AND ParentID = 0 ORDER BY MenuOrder";
            $result = $conn->query($query);
            $menuItem = [];    
            
        while($row = $result->fetch_assoc()){
            $menuItem[] = $row;
        }
        return $menuItem;
        }
        public function getDropdownItems($ParentID){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM tbl_menu WHERE ParentID = $ParentID";
            $result = $conn->query($query);
            $menuDropdownItem = array();

            while($row = $result-> fetch_assoc()){
                $menuDropdownItem[] = $row;
            }
             return $menuDropdownItem;
        }

    }
?>