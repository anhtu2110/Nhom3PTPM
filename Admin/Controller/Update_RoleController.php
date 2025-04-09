<?php
    require_once '../Model/Admin_RoleModel.php';
    class Update_RoleController{
        private $model = null;
        public function __construct(){
            $this->model = new Admin_RoleModel();
        }
        public function Update_Role($id,$role){
            $result = $this->model->Update_Role($id,$role);
            return $result;
        }
    }
    if(isset($_POST['roleName'])){
        $controller = new Update_RoleController();
        $id = $_POST['role_id'];
        $role = $_POST['roleName'];
        $result = $controller->Update_Role($id,$role);
        if($result){
            header('Content-type: application/json');
            echo json_encode(['check'=>true,'message'=>'Cập nhật Role thành công!']);
        } else {
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'mesage'=>'có lỗi xảy ra']);
        }
    }
?>