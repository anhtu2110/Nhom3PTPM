<?php
    require_once '../Model/Admin_BlogModel.php';
    class Delete_BlogController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_BlogModel();
        }
        public function Delete_BlogController($BlogID){
            return $this->model->Delete_Blog($BlogID);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $BlogID = $_POST['blogID'];
        $controller = new Delete_BlogController();
        $result = $controller->Delete_BlogController($BlogID);
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