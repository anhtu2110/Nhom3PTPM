<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/TestCNPM/Admin/Connect/connectDatabase.php';
    class Admin_CommentModel{
       private $db = null;

       public function __construct(){
           $this->db = (new Database())->getConnection();
       }

       public function showComment($limit,$offset){
        $sql = "SELECT * FROM comment LIMIT $limit OFFSET $offset";
        $result = $this->db->query($sql);
        return $result;
       }
        public function getCount(){
            $sql = "SELECT COUNT(*) as total FROM comment";
            $result = $this->db->query($sql);
            return $result;
        } 
        public function DeleteComment($id){
            $sql = "DELETE FROM comment WHERE CmtID = $id";
            $result = $this->db->query($sql);
            return $result;
        }
        public function UpdateComment($id){
            $sql = "UPDATE comment SET Status = 1 WHERE CmtID = $id";
            $result = $this->db->query($sql);
            return $result;
        }
        public function getNameProduct($id) {
            // $query = "SELECT Title FROM products WHERE ProductID = $id";
            // $result = $this->db->query($query);
            // return $result;
            $sql = "SELECT Title FROM products WHERE ProductID = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $product = $result->fetch_assoc();
            $stmt->close();
            return $product['Title'];
        }
    }
?>