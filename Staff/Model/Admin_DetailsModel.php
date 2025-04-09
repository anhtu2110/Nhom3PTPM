<?php
    require_once '../Connect/connectDatabase.php';
    class Admin_DetailModel{
        private $db = null;

        public function __construct()
        {
            $this->db = new Database();
        }
        public function Add_DetailModel($Title,$description,$img,$oldprice,$price,$supplier,$quantity,$sold,$categoryID){
            $conn = $this->db->getConnection();
            $query ="INSERT INTO details(Title,Describes,Image,OldPrice,Price,Supplier,Quantity,Sold,CategoryID)
            VALUES ('$Title','$description','img/$img',$oldprice,$price,'$supplier',$quantity,$sold,$categoryID)";
            $result = $conn->query($query);
            return $result;
        }
        public function showDetail_Limit($limit,$offset){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM details LIMIT $limit OFFSET $offset";
            $result = $conn->query($query);
            return $result;
        }
        public function getCount(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) as total FROM details";
            $result = $conn->query($query);
            return $result;
        }
        public function Show_DetailUpdate($DetailID){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM details WHERE IDDetail = $DetailID";
            $result = $conn->query($query);
            return $result;
        }
        public function Delete_Detail($IDDetail){
            $conn = $this->db->getConnection();
            $query = "DELETE FROM details WHERE IDDetail = $IDDetail";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Detail($DetailID,$Title,$description,$img,$oldprice,$price,$supplier,$quantity,$sold,$categoryID){
            $conn = $this->db->getConnection();
            $query = "UPDATE details 
                      SET Title= '$Title',
                          Describes= '$description',
                          Image ='$img',
                          OldPrice= $oldprice,
                          Price= $price,
                          Supplier= '$supplier',
                          Quantity = $quantity,
                          Sold = $sold,
                          CategoryID = $categoryID
                      WHERE IDDetail = $DetailID";
            $result = $conn->query($query);
            return $result;
        } 
        public function update_Details_ByProduct($IDDetail,$Title,$Image,$oldprice,$price){
            $conn = $this->db->getConnection();
            $query = "UPDATE details 
                      SET Title= '$Title',
                          Image ='$Image',
                          OldPrice= $oldprice,
                          Price= $price
                      WHERE IDDetail = $IDDetail";
            $result = $conn->query($query);
            return $result;
        }  
    }
?>