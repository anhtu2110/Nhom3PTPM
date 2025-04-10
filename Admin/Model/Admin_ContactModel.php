<?php
    require_once '../Connect/connectDatabase.php';
    class Admin_ContactModel{
     private $db = null;
     
     public function __construct()
     {
        $this->db = new Database();
     }
     public function Show_Contact($ContactID){
        $conn = $this->db->getConnection();
        $query = "SELECT * FROM contact WHERE ContactID = $ContactID";
        $result = $conn->query($query);
        return $result;
     }

     public function Show_ContactModel($limit,$offset){
        $conn = $this->db->getConnection();
        $query = "SELECT * FROM contact LIMIT $limit OFFSET $offset";
        $result = $conn->query($query);
        return $result;
     }
     public function getTotal_Contact(){
        $conn = $this->db->getConnection();
        $query = "SELECT COUNT(*) AS total_contact FROM contact";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        return $row;
     }
     public function Delete_Contact($ContactID){
      $conn = $this->db->getConnection();
      $query = "DELETE FROM Contact WHERE ContactID = $ContactID";
      $result = $conn->query($query);
      return $result;
     }
     public function UpdateStatus($ContactID){
      $conn = $this->db->getConnection();
      $query = "UPDATE contact 
                SET Status = 1
                WHERE ContactID = $ContactID";
      $result = $conn->query($query);
      return $result;
     }
}
?>