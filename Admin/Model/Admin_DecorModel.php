<?php
    require_once '../Connect/connectDatabase.php';
    class Admin_DecorModel{
        private $db = null;
        public function __construct(){
            $this->db = new Database();
        }
       public function ShowDecor_Limit($limit,$offset){
            $conn = $this->db->getConnection();
            $sql = "SELECT * FROM decor LIMIT $limit OFFSET $offset";
            $result = $conn->query($sql);
            return $result;
        }
        public function CountDecor(){
            $conn = $this->db->getConnection();
            $sql = "SELECT COUNT(*) AS total FROM decor";
            $result = $conn->query($sql);
            return $result;
        }
        public function ShowDecor($id){
            $conn = $this->db->getConnection();
            $sql = "SELECT * FROM decor WHERE DecorID = $id";
            $result = $conn->query($sql);
            return $result;
        }
        public function DeleteDecor($id){
            $conn = $this->db->getConnection();
            $sql = "DELETE FROM decor WHERE DecorID = $id";
            $result = $conn->query($sql);
            return $result;
       }
       public function Add_Decor($title,$content,$image,$decorOder,$isActive,$levels){
            $conn = $this->db->getConnection();
            $sql = "INSERT INTO decor (Title,Content,Image,DecorOder,IsActive,Levels) 
            VALUES ('$title','$content','$image',$decorOder,$isActive,$levels)";
            $result = $conn->query($sql);
            return $result;
        }
        public function updateDecor($id,$title,$content,$image,$decorOder,$isActive,$levels){
            $conn = $this->db->getConnection();
            $sql = "UPDATE decor SET Title = '$title',Content = '$content',Image = '$image',
            DecorOder = $decorOder,IsActive = $isActive,Levels = $levels WHERE DecorID = $id";
            $result = $conn->query($sql);
            return $result;
        }
    }
?>