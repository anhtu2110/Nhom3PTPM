<?php
    require_once '../Connect/connectDatabase.php';
    class Admin_BlogModel{
        private $db = null;
        public function __construct()
        {
            $this->db = new Database();
        }
        public function PhanTrang_Blog($limit,$offset){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM blog LIMIT $limit OFFSET $offset";
            $result = $conn->query($query);
            $BlogItem = [];

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $BlogItem[] = $row;
                }
                return $BlogItem;
            }else{
                echo 'khong co ban ghi nao';
            }
        }
        public function getTotal_Model(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS total_blog FROM blog";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            return $row;
        }
        public function Show_Blog($blogID){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM blog WHERE BlogID = $blogID";
            $result = $conn->query($query);
            $blogItem = [];

            if($result && $result->num_rows>0){
                $row = $result->fetch_assoc();
                $blogItem[] = $row;
            }
            return $blogItem;
        }
        public function Add_BlogModel($title,$content,$img,$isactive,$date){
            $conn = $this->db->getConnection();
            $query ="INSERT INTO blog(Title,Content,Image,IsActive,DateOfWriting)
            VALUES('$title','$content','img/$img',$isactive,'$date')";
            $result = $conn->query($query);
            if($result){
                return true;
            }
        }
        public function Delete_Blog($blogID){
            $conn = $this->db->getConnection();
            $BlogID = intval($blogID);
            $query = "DELETE FROM blog WHERE BlogID = $BlogID";
            return $conn->query($query);
        }
        public function Update_Blog($blogid,$title,$content,$img,$isactive,$date){
            $conn = $this->db->getConnection();
            $query = "UPDATE blog 
          SET Title = '$title', 
              Content = '$content', 
              Image = 'img/$img', 
              IsActive = $isactive, 
              DateOfWriting = '$date' 
          WHERE BlogID = $blogid";
            $result = $conn->query($query);
            if($result){
                return true;
            }
        }
    }        
?>