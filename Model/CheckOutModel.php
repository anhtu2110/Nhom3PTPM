<?php
    //require_once $_SERVER['DOCUMENT_ROOT'].'/Connect/connectDatabase.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Connect/connectDatabase.php';
    class Save_Information{
        private $db = null;

        public function __construct(){
            $this->db = new Database();
        }

        public function Save_Information($UserID,$Information){
            $conn = $this->db->getConnection();
            $query = "UPDATE orders SET Information = '$Information', status = '1' WHERE UserID = $UserID AND status IS NULL";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Information_With_OrderID($OrderID, $UserID, $Information) {
            $conn = $this->db->getConnection();
            $query = "UPDATE orders SET Information = '$Information' WHERE UserID = $UserID AND OrderID = $OrderID";
            $result = $conn->query($query);
            return $result;
        }
        public function Show_Tinh(){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM devvn_tinhthanhpho";
            $result = $conn->query($query);
            return $result;
        }
        public function Show_Huyen($id){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM devvn_quanhuyen WHERE matp = $id";
            $result = $conn->query($query);
            return $result;
        }
        public function Show_Xa($id){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM devvn_xaphuongthitran WHERE maqh = $id";
            $result = $conn->query($query);
            return $result;
        }
        
    }
?>