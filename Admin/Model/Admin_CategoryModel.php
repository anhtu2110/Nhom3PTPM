<?php
require_once '../Connect/connectDatabase.php';
    class Admin_CategoryModel {
        private $db = null;

        public function __construct() {
            $this->db = new Database();
        }

        public function ShowCategory_Limit($limit, $offset) {
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM category LIMIT $limit OFFSET $offset";
            $result = $conn->query($query);
            $data = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function get_Count(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) as total FROM category";
            $result = $conn->query($query);
            $data = $result->fetch_assoc();
            return $data;

    }
        public function Add_Category($title){
            $conn = $this->db->getConnection();
            $query = "INSERT INTO category (Title) VALUES ('$title')";
            $result = $conn->query($query);
            return $result;
        }
        public function Delete_Category($id){
            $conn = $this->db->getConnection();
            $query = "DELETE FROM category WHERE CategoryID = $id";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Category($id, $title){
            $conn = $this->db->getConnection();
            $query = "UPDATE category SET Title = '$title' WHERE CategoryID = $id";
            $result = $conn->query($query);
            return $result;
        }
        public function showCateGoryID($CategoryID){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM category WHERE CategoryID = $CategoryID";
            $result = $conn->query($query);
            $data = $result->fetch_assoc();
            return $data;
        }
}
?>