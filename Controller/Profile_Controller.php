<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Model/ProfileModel.php';
    class Profile_Controller{
        private $model = null;
        public function __construct()
        {
            $this->model = new Profile_Model();
        }
        public function Show_Profile($UserID){
            $result = $this->model->Show_ProfileModel($UserID);
            return $result;
        }
        public function Update_Avatar($UserID,$img){
            $result = $this->model->Update_Avatar($UserID,$img);
            return $result;
        }
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_FILES['file']){
            $root = $_SERVER['DOCUMENT_ROOT'].'/TestCNPM';
            $folder = '/img/';
            $img = $folder.basename($_FILES['file']['name']);
            $userID = $_POST['UserID'];
            if(move_uploaded_file($_FILES['file']['tmp_name'],$root.$img)){
                $controller = new Profile_Controller();
                $result = $controller->Update_Avatar($userID,$img);
              if($result){
                header('Content-type: application/json');
                echo json_encode(['status'=>true,'message'=>'Cập nhật ảnh đại diện thành công!']);
              }else{
                header('Content-type: application/json');
                echo json_encode(['status'=>false,'message'=>'Có lỗi xảy ra trong quá trình cập nhật ảnh!']);
              }
            }
        }
    }
?>