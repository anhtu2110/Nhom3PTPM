<?php
    require_once '../Model/Profile_Model.php';
    require_once '../Model/CheckLogin_AdminModel.php';
    session_start();

    class Update_Profile_Controller{
        private $model = null;

        public function __construct()
        {
            $this->model= new Profile_Model();
        }
        public function Update_Information($userID,$fullname,$phone,$email,$password){
            return $this->model->Update_Information($userID,$fullname,$phone,$email,$password);
        }
    }
    $data = json_decode(file_get_contents('php://input'),true);
    if($_SESSION['is_admin']){
        $userID = $_SESSION['is_admin'];
        if(isset($data[0]['fullname']) && isset($data[0]['phone']) && isset($data[0]['email']) && isset($data[0]['password'])) {
            $fullname = $data[0]['fullname'];
            $phone = $data[0]['phone'];
            $email = $data[0]['email'];
            $password = $data[0]['password'];
            
        $controller = new Update_Profile_Controller();
        $result = $controller->Update_Information($userID,$fullname,$phone,$email,$password);
        if($result){
            header('Content-type: application/json');
            echo json_encode(['check'=>true,'message'=>'Cập nhật thông tin thành công!']);
        }else{
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Cập nhật thông tin thất bại!']);
        }
    }
}
?>