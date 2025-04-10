<?php
    require_once '../Model/Admin_DecorModel.php';
    class Add_DecorController{
        private $model = null;
        public function __construct(){
            $this->model = new Admin_DecorModel();
        }
        public function Add_Decor($title,$content,$image,$decorOder,$isActive,$levels){
            $result = $this->model->Add_Decor($title,$content,$image,$decorOder,$isActive,$levels);
            return $result;
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

            $title = $_POST['title'];
            $content = $_POST['content'];
            $position = $_POST['position'];
            $status = $_POST['status'];
            $level = $_POST['level'];

            if(isset($_FILES['image'])){
                $documentRoot = $_SERVER['DOCUMENT_ROOT'];
                $dirtarget = '/img/';
                $img = $dirtarget.basename($_FILES['image']['name']);
    
                if(move_uploaded_file($_FILES['image']['tmp_name'],$documentRoot.$img)){
                $controller = new Add_DecorController();
                $result = $controller->Add_Decor($title,$content,'img/'.basename($_FILES['image']['name']),$position,$status,$level);
                if($result){
                    header('Content-type: application/json');
                    echo json_encode(['check'=>true,'message'=>'Thêm thành công sản phẩm vào cơ sở dữ liệu!']);
                }else{
                    header('Content-type: application/json');
                    echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình thêm!']);
                }
                }else{
                    header('Content-type: application/json');
                    echo json_encode(['check'=>false,'message'=>'Không có yêu cầu ảnh!']);
                }
            }else{
                header('Content-type: application/json');
                echo json_encode(['check'=>false,'message'=>'Không có yêu cầu POST!']);
            }
        }
?>