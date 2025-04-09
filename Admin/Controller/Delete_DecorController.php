<?php
    require_once '../Model/Admin_DecorModel.php';
    class Delete_DecorController{
        private $model = null;
        public function __construct(){
            $this->model = new Admin_DecorModel();
        }
        public function DeleteDecor($id){
            $result = $this->model->DeleteDecor($id);
            return $result;
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['DecorID'];
        $controller = new Delete_DecorController();
        $result = $controller->DeleteDecor($id);
        if($result){
            header('Content-type: application/json');
            echo json_encode(['check'=>true,'message'=>'Xóa thành công Decor trong cơ sở dữ liệu!']);
        }else{
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình xóa!']);
        }
    }
?>