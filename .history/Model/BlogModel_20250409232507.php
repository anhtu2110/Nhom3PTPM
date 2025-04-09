<?php
    //require_once './Connect/connectDatabase.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Connect/connectDatabase.php';
    class BlogModel{
        private $conn= null;

        public function __construct()
        {
            $this->conn = new Database();
        }

        public function getBlogModel(){
            $db = $this->conn->getConnection();
            $query = "SELECT * FROM blog WHERE IsActive = 1";
            $result = $db->query($query);
            $BlogItem = [];

            while($row = $result->fetch_assoc()){
                $BlogItem[] = $row;
            }
            return $BlogItem;
        }

    }
?>