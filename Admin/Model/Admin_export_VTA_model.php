<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Admin/Connect/connectDatabase.php';
    class Admin_export_VTA_model{
        private $db = null;
        public function __construct()
        {
           $this->db = new Database();
        }
        public function export_VTA($orderID){
            $conn = $this->db->getConnection();
            $sql = "SELECT * FROM Orders WHERE OrderID = $orderID";
            $result = $conn->query($sql);
            return $result;
        }
    }
?>