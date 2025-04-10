<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Connect/connectDatabase.php';
    class CommentModel{
        private $db = null;

        public function __construct()
        {
            $this->db = new Database();
        }
        public function showComment($DetailssID){
            $conn = $this->db->getConnection($DetailssID);
            $query = "SELECT * FROM comment WHERE DetailsID = $DetailssID AND Status = 1 ORDER BY CmtID DESC";
            $result = $conn->query($query);
            return $result;
        }
        public function Save_Comment($DetailID,$UserName,$Image,$Content,$Star,$Date){
            $conn = $this->db->getConnection($DetailID);
            $query = "INSERT INTO comment(DetailsID,UserName,Image,Content,Star,Date,Status) VALUES ('$DetailID','$UserName','$Image','$Content','$Star','$Date',0)";
            $result = $conn->query($query);
            return $result;
        }
        public function showTotalComment($DetailssID){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS Total FROM comment WHERE DetailsID = ? AND Status = 1";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $DetailssID);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
        
        public function setSum($DetailssID){
            $conn = $this->db->getConnection();
            $query = "SELECT SUM(Star) AS Sum FROM comment WHERE DetailsID = ? AND Status = 1";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $DetailssID);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
        
    }
?>