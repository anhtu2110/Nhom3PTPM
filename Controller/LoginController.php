<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];  
    require_once '../Model/LoginModel.php';
    
    class LoginController{
        private $model = null;

        public function __construct()
        {
            $this->model = new LoginModel();
        }
        
        public function Set_NewLogin($UserID){
            $result = $this->model->NewLogin_Customer($UserID);
            $row = $result->fetch_assoc();
            $fullname = $row['Title'];
            $username = $row['UserName'];
            $role = $row['IDRole'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date("Y-m-d H:i:s");
            return $this->model->Save_newLogin($username,$fullname,$time,$role);
        }        
        
        public function CheckLogin_Controller($username,$password){
            $result = $this->model->CheckLoginModel($username,$password);
            if ($result) {
                $UserID = $_SESSION['userID'];
                $this->Set_NewLogin($UserID);
                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('success' => false)); 
            }
        }
    }
    
    $loginController = new LoginController();
    $loginController->CheckLogin_Controller($username, $password);
    
} else {
    echo "Có lỗi xảy ra trong quá trình kiểm tra đăng nhập.";
}
?>
