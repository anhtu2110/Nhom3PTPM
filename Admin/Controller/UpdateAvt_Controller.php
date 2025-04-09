<?php

require_once '../Model/Profile_Model.php';
require_once '../Model/CheckLogin_AdminModel.php';
session_start();
class UpdateFile {
    private $model = null;
    
    public function __construct() {
        $this->model = new Profile_Model();   
    }
    
    public function setAvtProfile_Controller($userid, $link) {
        return $this->model->UpdateAvt($userid, $link);
    }
}

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_FILES['file'])){
        $thumuc = "../img/";
        $link = $thumuc.basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'], $link)){
            $save = new UpdateFile();
            $userid = $_SESSION['is_admin'];
            $links = basename($_FILES['file']['name']);
            $result = $save->setAvtProfile_Controller($userid, $links);
            if($result){
                header('Content-type: application/json');
                echo json_encode(['check'=>true,'message'=>'Cập nhật ảnh đại diện thành công!']);
            } else {
                header('Content-type: application/json');
                echo json_encode(['check'=>false,'mesage'=>'có lỗi xảy ra']);
            }
        } else {
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Không thể lưu ảnh']);
        }
    } else {
        header('Content-type: application/json');
        echo json_encode(['check'=>false,'message'=>'Máy chủ không phản hồi']);
    }
} else {
    header('Content-type: application/json');
    echo json_encode(['check'=>false,'message'=>'không có yêu cầu post']);
}
?>
