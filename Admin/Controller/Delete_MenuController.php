<?php
    require_once '../Model/Admin_MenuModel.php';
    class Delete_MenuController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_MenuModel();
        }
        public function Delete_MenuController($MenuID){
            return $this->model->Delete_Menu($MenuID);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $MenuID = $_POST['MenuID'];
        $controller = new Delete_MenuController();
        $result = $controller->Delete_MenuController($MenuID);
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