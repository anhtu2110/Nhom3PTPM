<?php
    //require_once '../Connect/connectDatabase.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/TestCNPM/Connect/connectDatabase.php';
    class ResetPasswordModel{
        private $db = null;

        public function __construct(){
            $this->db = (new Database())->getConnection();
        }

        public function Check_MailDataBase($email){
            $query = "SELECT * FROM user WHERE Email = ? AND IDRole = 3";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return true;
            }
            return false;
        }
        public function ResetPassword($email, $password) {
            $password_hash = md5($password);
            $query = "UPDATE user SET Password = ? WHERE Email = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ss", $password_hash, $email);
            $result = $stmt->execute();
            if ($result) {
                return true;
            } else {
                printf("Error: %s.\n", $stmt->error);
            }
            return false;  
        }
    }
?>