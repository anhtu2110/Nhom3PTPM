<?php
    require_once '../Model/Admin_DetailsModel.php';
    class Delete_DetailController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_DetailModel();
        }
        public function Delete_DetailController($IDDetail){
            return $this->model->Delete_Detail($IDDetail);
        }
        
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $IDDetail = $_POST['IDDetail'];
        $controller = new Delete_DetailController();
        $result = $controller->Delete_DetailController($IDDetail);
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