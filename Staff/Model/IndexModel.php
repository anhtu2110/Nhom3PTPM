<?php
    require_once '../Connect/connectDatabase.php';
    class Index_Model{
        private $db = null;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function ShowNew_Oder(){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM orders ORDER BY OrderID DESC LIMIT 5";
            $result = $conn->query($query);
            return $result;
        }
        public function setAll_CountCustomer(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS total_Customer FROM user WHERE IDRole = 3";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            return $row;
        }
        public function setStatus_Customer(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS check_online FROM user WHERE IDRole = 3 AND Status = 1";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            return $row;
        }
        public function setSum_Money(){
            $conn = $this->db->getConnection();
            $query = "SELECT Total_Price FROM orders";
            $result = $conn->query($query);
            $item = [];
            while($row = $result->fetch_assoc()){
                $item[] =$row['Total_Price'];
            }
            return $item;
        }
        public function ShowCount_Oder(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS sum_order FROM orders";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            return $row;
        }
        public function setAll_Count_Staff(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS total__Staff FROM user WHERE IDRole = 2";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            return $row;
        }
        public function setStatus__Staff(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS check_online FROM user WHERE IDRole = 2 AND Status = 1";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            return $row;
        }
        public function Show_NewLogin(){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM login_new ORDER BY LoginNewID DESC LIMIT 8";
            $result = $conn->query($query);
            return $result;
        }
        public function Show_NewContact(){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM contact ORDER BY ContactID DESC LIMIT 4";
            $result = $conn->query($query);
            return $result;
        }
    }
?>