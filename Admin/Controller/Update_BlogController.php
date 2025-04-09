<?php
    require_once '../Model/Admin_BlogModel.php';
    class Update_BlogController{
        private $model = null;

        public function __construct()
        {
            $this->model= new Admin_BlogModel();
        }
        public function Update_Blog($Blogid,$title,$content,$img,$isactive,$date){
            return $this->model->Update_Blog($Blogid,$title,$content,$img,$isactive,$date);
        }
        
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $blogid = $_POST['blogid'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $isactive = $_POST['status'];
        $date = $_POST['date'];
        $dates = date('Y-m-d', strtotime($date));

        if(isset($_FILES['file'])){
            $dirTarget = basename($_FILES['file']['name']);
            if(move_uploaded_file($_FILES['file']['tmp_name'],"D:/laragon/www/img/$dirTarget")){

                $add = new Update_BlogController();
                $result = $add->Update_Blog($blogid,$title,$content,basename($_FILES['file']['name']),$isactive,$dates);
                if($result){
                    header('Content-type: application/json');
                    echo json_encode(['check'=>true,'message'=>'Sửa thành công!']);
                }else{
                    header('Content-type: application/json');
                    echo json_encode(['check'=>false,'message'=>'Sửa thất bại!']);
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