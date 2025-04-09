<?php
    require_once '../Connect/connectDatabase.php';
    class Admin_CustomerModel{
        private $db = null;

        public function __construct()
        {
            $this->db = new Database();
        }
        public function Show_Customer($CustomerID){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM user WHERE UserID = $CustomerID";
            $result = $conn->query($query);
            return $result;
        }

        public function Show_Customers($limit,$offset){
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM user WHERE IDRole = 3 LIMIT $limit OFFSET $offset";
            $result = $conn->query($query);
            return $result;
        }
        public function getTotal_Customer(){
            $conn = $this->db->getConnection();
            $query = "SELECT COUNT(*) AS total_customer FROM user WHERE IDRole = 3";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            return $row;
        }
        public function Add_Customer($fullname,$username,$password,$email,$address,$img,$phone,$date,$status){
            $conn = $this->db->getConnection();
            $pass_hash = md5($password);
            $query = "INSERT INTO user(Title,UserName,Password,Email,Phone_Number,Address,Image,RegistrationDate,Status,IDRole)
            VALUES('$fullname','$username','$pass_hash','$email','$phone','$address','img/$img','$date',$status,3)";
            $result = $conn->query($query);
            return $result;
        }
        public function Delete_customer($CustomerID){
            $conn = $this->db->getConnection();
            $query = "DELETE FROM user WHERE UserID = $CustomerID";
            $result = $conn->query($query);
            return $result;
        }
        public function Update_Customer($CustomerID,$fullname,$username,$password,$email,$address,$img,$phone,$date,$status){
            $conn = $this->db->getConnection();
            $pass_hash = md5($password);
            $query = "UPDATE user
                      SET Title = '$fullname',
                          UserName = '$username',
                          Password ='$pass_hash',
                          Email = '$email',
                          Address ='$address',
                          Image ='img/$img',
                          Phone_Number = '$phone',
                          RegistrationDate = '$date',
                          Status = $status
                      WHERE UserID = $CustomerID";
            $result = $conn->query($query);
            return $result;
        }
    }
?>