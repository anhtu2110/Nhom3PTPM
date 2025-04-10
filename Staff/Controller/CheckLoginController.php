<?php
    require_once '../Model/CheckLogin_AdminModel.php';
    class CheckLoginController{
        private $model = null;

        public function __construct()
        {
            $this->model = new CheckLogin_model();
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
        public function CheckLogincontroller($username,$password){
            return $this->model->CheckLoginModel($username,$password);
        }
    }
    
    $data = json_decode(file_get_contents('php://input'),true);
    $username = $data['username'];
    $password = $data['password'];
    $controller = new CheckLoginController();
    $result = $controller->CheckLogincontroller($username,$password);
    if($result){
        header('Content-type: application/json');
        $UserID = $_SESSION['staffID'];
        $controller->Set_NewLogin($UserID);
        echo json_encode(['check'=> true,'message'=> 'ok']);
    }else{
        header('Content-type: application/json');
        echo json_encode(['check'=> false,'message'=> 'Tên đăng nhập hoặc mật khẩu không đúng!']);
    }
?>    