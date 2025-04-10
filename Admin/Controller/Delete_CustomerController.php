<?php
    require_once '../Model/Admin_CustomerModel.php';
    class Delete_CustomerController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_CustomerModel();
        }
        public function Delete_CutomerController($CustomerID){
            return $this->model->Delete_customer($CustomerID);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $CustomerID = $_POST['CustomerID'];
        $controller = new Delete_CustomerController();
        $result = $controller->Delete_CutomerController($CustomerID);
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