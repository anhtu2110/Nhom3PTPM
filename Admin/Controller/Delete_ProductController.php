<?php
    require_once '../Model/Admin_ProductModel.php';
    require_once '../Model/Admin_DetailsModel.php';
    class Delete_ProductController{
        private $model = null;
        private $modelDt  = null;
        public function __construct()
        {
            $this->model = new Admin_ProductModel();
            $this->modelDt = new Admin_DetailModel();
        }
        public function Delete_Product($ProductID){
            return $this->model->Delete_Product($ProductID);
        }
        public function Delete_Details($IDDetail){
            return $this->modelDt->Delete_Detail($IDDetail);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $ProductID = $_POST['ProductID'];
        $IDDetail = $_POST['IDDetail'];
        
        $controller = new Delete_ProductController();
        $details = $controller->Delete_Details($IDDetail);
        $result = $controller->Delete_Product($ProductID);

        if($result && $details){
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