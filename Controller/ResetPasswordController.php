<?php
session_start();
    require_once '../Model/ResetPasswordModel.php';
    class ResetPassword_Controller{
        private $model = null;
        public function __construct(){
            $this->model = new ResetPasswordModel();
        }
        public function Check_MailDataBase($email){
            return $this->model->Check_MailDataBase($email);
        }
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $_SESSION['Password_Email'] = $email;
        $controller = new ResetPassword_Controller();
        if($controller->Check_MailDataBase($email)){
           header('content-type: application/json');
              echo json_encode(['status'=>true]);
        }else{
            header('content-type: application/json');
            echo json_encode(['status'=>false]);
        }
    }
?>