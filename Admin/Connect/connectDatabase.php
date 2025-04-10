<?php
    class Database{
        private $localhost = 'localhost';
        private $username = 'cnpm';
        private $password = '123456';
        private $db = 'dacn';
        private $conn = null;

        public function __construct()
        {
            $this->conn = new mysqli($this->localhost,$this->username,$this->password,$this->db);
            if($this->conn->connect_error){
                die('Loi kn'.$this->conn->connect_error);
            }else{
                $this->conn->set_charset('utf8');
            }
        }

        public function getConnection(){
            return $this->conn;
        }
    }
?>