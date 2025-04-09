<?php 
    require_once '../Model/Admin_MenuModel.php';
    class Update_MenuController{
       private $model = null;

       public function __construct()
       {
        $this->model = new Admin_MenuModel();
       }
       
       public function Update_MenuController($menuID,$Title,$IsActive,$Levels,$ParentID,$MenuOrder,$Link){
        return $this->model->Update_Menu($menuID,$Title,$IsActive,$Levels,$ParentID,$MenuOrder,$Link);
       }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $menuID = $_POST['MenuID'];
        $Title = $_POST['Title'];;
        $IsActive = $_POST['IsActive'];
        $Levels = $_POST['Levels'];
        $ParentID = $_POST['ParentID'];
        $MenuOrder = $_POST['MenuOrder'];
        $Link = $_POST['Link'];

        $controller = new Update_MenuController();
        $result = $controller->Update_MenuController($menuID,$Title,$IsActive,$Levels,$ParentID,$MenuOrder,$Link);
        if($result){
            header('Content-type: application/json');
            echo json_encode(['check'=>true,'message'=>'Sửa Menu Thành Công!']);
        }else{
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Sửa menu thất bại!']);
        }
    }else{
        header('Content-type: application/json');
        echo json_encode(['check'=>false,'message'=>'Không có yêu cầu POST!']);
    }
?>