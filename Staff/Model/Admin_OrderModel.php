<?php
    require_once '../Connect/connectDatabase.php';

    class Admin_OrderModel{
        private $db = null;
        public function __construct(){
            $this->db = new Database();
        }
      public function ShowOder_Limit($limit,$offset){
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM orders WHERE status = 1 OR status = 2 OR status = 3 OR status = 4 OR status = 5
          LIMIT $limit OFFSET $offset";
        $result = $conn->query($sql);
        return $result;
      }
      public function getCount(){
        $conn = $this->db->getConnection();
        $sql = "SELECT COUNT(*) as total FROM orders";
        $result = $conn->query($sql);
        return $result;
      }
      public function UpdateOrder($OrderID,$status){
        $conn = $this->db->getConnection();
        $sql = "UPDATE orders SET status = '$status' WHERE OrderID = '$OrderID'";
        $result = $conn->query($sql);
        return $result;
      }
      public function DeleteOrder($OrderID){
        $conn = $this->db->getConnection();
        $sql = "DELETE FROM orders WHERE OrderID = '$OrderID'";
        $result = $conn->query($sql);
        return $result;
      }
      public function ShowOder($ID){
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM orders WHERE OrderID = '$ID'";
        $result = $conn->query($sql);
        return $result;
      }

    }

?>