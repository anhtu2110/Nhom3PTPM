<?php
    require_once '../Model/Admin_BlogModel.php';
    class Admin_BlogController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_BlogModel();
        }
        public function Save_BlogController($title,$content,$img,$isactive,$date){
            return $this->model->Add_BlogModel($title,$content,$img,$isactive,$date);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $isactive = $_POST['status'];
        $date = $_POST['date'];
        $dates = date('Y-m-d', strtotime($date));

        if(isset($_FILES['file'])){

            $documentRoot = $_SERVER['DOCUMENT_ROOT'];

            $dirTarget = basename($_FILES['file']['name']);
            if(move_uploaded_file($_FILES['file']['tmp_name'],"$documentRoot/img/$dirTarget")){
                $add = new Admin_BlogController();
                $result = $add->Save_BlogController($title,$content,basename($_FILES['file']['name']),$isactive,$dates);
                if($result){
                    header('Content-type: application/json');
                    echo json_encode(['check'=>true,'message'=>'Thêm thành công blog vào cơ sở dữ liệu!']);
                }else{
                    header('Content-type: application/json');
                    echo json_encode(['check'=>false,'message'=>'Thêm thất bại!']);
                }
            }else{
                header('Content-type: application/json');
                    echo json_encode(['check'=>false,'message'=>'Lưu ảnh lỗi!']);
            }
        }else{
            header('Content-type: application/json');
                    echo json_encode(['check'=>false,'message'=>'Không có yêu cầu ảnh!']);
        }
    }
?>