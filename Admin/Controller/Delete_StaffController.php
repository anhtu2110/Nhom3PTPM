<?php
    require_once '../Model/Admin_UserModel.php';
    class Delete_StaffController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_UserModel();
        }
        public function Delete_StaffController($userID){
            return $this->model->Delete_Staff($userID);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $userID = $_POST['UserID'];
        $controller = new Delete_StaffController();
        $result = $controller->Delete_StaffController($userID);
        if($result){
            header('Content-type: application/json');
            echo json_encode(['check'=> true,'message'=> 'Đã xóa thành công!']);
        }else{
            header('Content-type: application/json');
            echo json_encode(['check'=> false,'message'=> 'Xóa thất bại!']);
        }
    }else{
        header('Content-type: application/json');
            echo json_encode(['check'=> false,'message'=> 'không có yêu cầu POST!']);
    }
?>