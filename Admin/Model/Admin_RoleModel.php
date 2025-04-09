<?php
    require_once '../Connect/connectDatabase.php';
    class Admin_RoleModel{
        private $db = null;

        public function __construct(){
            $this->db = new Database();
        }
        public function show_Role_Limit($limit,$offset){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM role LIMIT $limit OFFSET $offset";
            $result = $conn->query($query);
            return $result;
        }
        public function count_Role(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS total_role FROM role";
            $result = $conn->query($query);
            return $result;
        }
        public function Delete_Role($id){
            $conn = $this->db->getConnection();
            $query = "DELETE FROM role WHERE IDRole = $id";
            $result = $conn->query($query);
            return $result;
        }
        public function Add_Role($role){
            $conn = $this->db->getConnection();
            $query = "INSERT INTO role(Role) VALUES('$role')";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Role($id,$role){
            $conn = $this->db->getConnection();
            $query = "UPDATE role SET Role = '$role' WHERE IDRole = $id";
            $result = $conn->query($query);
            return $result;
        }
        public function show_Role($id){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM role WHERE IDRole = $id";
            $result = $conn->query($query);
            return $result;
        }
    }
?>