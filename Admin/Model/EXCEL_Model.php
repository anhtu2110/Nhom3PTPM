<?php
    require_once '../Connect/connectDatabase.php';

    class get_ExcelModel{
       private $db = null;

         public function __construct(){
              $this->db = (new Database())->getConnection();
         }

         public function get_ExcelCustomer(){
              $sql = "SELECT * FROM user WHERE IDRole = 3";
              $result = $this->db->query($sql);
              return $result;        
         }
         public function get_ExcelStaff(){
              $sql = "SELECT * FROM user WHERE IDRole = 2";
              $result = $this->db->query($sql);
              return $result;        
         }
    }
?>