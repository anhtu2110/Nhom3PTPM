<?php
    require_once '../Connect/connectDatabase.php';
    class Admin_ProductModel{
        private $db = null;

        public function __construct()
        {
            $this->db = new Database();
        }
        public function ShowProductLimit($limit,$offset){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM products LIMIT $limit OFFSET $offset";
            $result = $conn->query($query);
            return $result;
        }
        public function GetTotal_Product(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS total_product FROM products";
            $result = $conn->query($query);
            $row =$result->fetch_assoc();
            return $row;
        }
        public function showAdd_Product(){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM details ORDER BY IDDetail DESC LIMIT 1";
            $result = $conn->query($query);
            return $result;
        }
        public function Add_ProductModel($Title,$img,$oldprice,$price,$isbestseller,$extratime,$IDDetail){
            $conn = $this->db->getConnection();
            $query ="INSERT INTO products(Title,Image,OldPrice,Price,IsBestSeller,ExtraTime,IDDetail)
            VALUES ('$Title','$img',$oldprice,$price,$isbestseller,'$extratime',$IDDetail)";
            $result = $conn->query($query);
            return $result;
        }
        public function Delete_Product($ProductID){
            $conn = $this->db->getConnection();
            $query = "DELETE FROM products WHERE ProductID = $ProductID";
            $result = $conn->query($query);
            return $result;
        }
        public function show_Product($ProductID){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM products WHERE ProductID = $ProductID";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Product($ProductID,$Title,$Image,$OldPrice,$Price,$IsBestSeller,$ExtraTime,$IDDetail){
            $conn = $this->db->getConnection();
            $query = "UPDATE products SET Title = '$Title',Image = '$Image',OldPrice = $OldPrice,Price = $Price,
            IsBestSeller = $IsBestSeller,ExtraTime = '$ExtraTime',IDDetail = $IDDetail WHERE ProductID = $ProductID";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_ProductByDetail($Title, $Image, $OldPrice, $Price, $IDDetail) {
            $conn = $this->db->getConnection();
            $query = "UPDATE products SET Title = '$Title', Image = '$Image', OldPrice = $OldPrice, Price = $Price WHERE IDDetail = $IDDetail";
            $result = $conn->query($query);
            return $result;
        }
        
    }
?>