<?php
    require_once '../Model/Admin_DecorModel.php';
    class Update_DecorController{
        private $model = null;
        public function __construct(){
            $this->model = new Admin_DecorModel();
        }
        public function ShowDecor($id){
            $result = $this->model->ShowDecor($id);
            return $result;
        }
        public function updateDecor($id,$title,$content,$image,$decorOder,$isActive,$levels){
            $result = $this->model->updateDecor($id,$title,$content,$image,$decorOder,$isActive,$levels);
            return $result;
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['decor_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $decorOder = $_POST['position'];
        $isActive = $_POST['status'];
        $levels = $_POST['level'];

        if(isset($_FILES['image'])){ 
            $documentRoot = $_SERVER['DOCUMENT_ROOT'];
            $documenttg = '/img/';
            $dirimg = $documenttg.basename($_FILES['image']['name']);

            if(move_uploaded_file($_FILES['image']['tmp_name'],$documentRoot.$dirimg)){
                $controller = new Update_DecorController();
                $results = $controller->updateDecor($id,$title,$content,"img/".basename($_FILES['image']['name']),$decorOder,$isActive,$levels);
                if($results){
                    header('Content-type: application/json');
                    echo json_encode(['check'=>true,'message'=>'Sửa thành công Sản Phẩm!']);
                }else{
                    header('Content-type: application/json');
                    echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình sửa!']);
                }
            }
        }else{
            $img = $_POST['image'];
            $controller = new Update_DecorController();
            $results = $controller->updateDecor($id,$title,$content,$img,$decorOder,$isActive,$levels);
            if($results){
                header('Content-type: application/json');
                echo json_encode(['check'=>true,'message'=>'Sửa thành công Sản Phẩm!']);
            }else{
                header('Content-type: application/json');
                echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình sửa!']);
            }
        }
    }else{
        header('Content-type: application/json');
        echo json_encode(['check'=>false,'message'=>'Không có yêu cầu POST!']);
    }
?>