<?php
    class Database {
        private $hostname = 'localhost';
        private $username = 'cnpm';
        private $password ='123456';
        private $database = 'dacn';
        
        private $conn = null;

        public function __construct(){
            $this->conn = new mysqli($this->hostname,$this->username,$this->password,$this->database);

            if($this->conn->connect_error){
                die("Kết nối thất bại :".$this->conn->connect_error);
            }
            else{
                $this->conn->set_charset('utf8');
            }

        }
        public function getConnection(){
            return $this->conn;
        }
    }
?>