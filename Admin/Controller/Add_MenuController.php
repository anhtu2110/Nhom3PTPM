<?php 
    require_once '../Model/Admin_MenuModel.php';
    class Add_MenuController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_MenuModel();
        }
        public function Add_MenuController($Title,$IsActive,$Levels,$ParentID,$MenuOrder,$Link){
            return $this->model->Add_Menu($Title,$IsActive,$Levels,$ParentID,$MenuOrder,$Link);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['Title'];
        $IsActive = $_POST['IsActive'];
        $Levels = $_POST['Levels'];
        $ParentID = $_POST['ParentID'];
        $MenuOrder = $_POST['MenuOrder'];
        $Link = $_POST['Link'];

        $controller = new Add_MenuController();
        $result = $controller->Add_MenuController($title,$IsActive,$Levels,$ParentID,$MenuOrder,$Link);
        if($result){
            header('Content-type: application/json');
            echo json_encode(['check'=>true,'message'=>'Thêm menu thành công!']);
        }else{
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Thêm menu thất bại!']);
        }
    }else{
        header('Content-type: application/json');
        echo json_encode(['check'=>false,'message'=>'Không có yêu cầu POST!']);
    }
?>