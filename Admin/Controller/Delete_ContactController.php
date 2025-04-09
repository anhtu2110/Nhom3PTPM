<?php
    require_once '../Model/Admin_ContactModel.php';
    class Delete_ContactController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_ContactModel();
        }
        public function Delete_ContactController($ContactID){
            return $this->model->Delete_Contact($ContactID);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $ContactID = $_POST['ContactID'];
        $controller = new Delete_ContactController();
        $result = $controller->Delete_ContactController($ContactID);
        if($result){
            header('Content-type: application/json');
            echo json_encode(['check'=>true,'message'=>'Xóa Thông tin thành công!']);
        }else{
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Xóa Thông tin thất bại!']);
        }
    }else{
        header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Không có yêu cầu POST!']);
    }
?>