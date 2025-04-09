<?php
    require_once '../Connect/connectDatabase.php';

    class Admin_OrderModel{
        private $db = null;
        public function __construct(){
            $this->db = new Database();
        }
      public function Get_list_status_order() {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM status_order";
        $result = $conn->query($sql);
        return $result;
      }
      public function ShowOder_Limit($limit,$offset){
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM orders WHERE status IN (1, 2, 3, 4, 5, 6)
        ORDER BY OrderID DESC
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
        $sql = "UPDATE orders INNER JOIN status_order ON orders.status = status_order.id_status SET status = '$status' WHERE orders.OrderID = '$OrderID'";
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