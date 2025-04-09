<?php
    require_once '../Model/Admin_RoleModel.php';
    class Add_Role{
        private $model = null;
        public function __construct(){
            $this->model = new Admin_RoleModel();
        }
        public function Add_Role($role){
            $result = $this->model->Add_Role($role);
            return $result;
        }
    }
    if(isset($_POST['role'])){
        $role = $_POST['role'];
        $conn = new Add_Role();
        $result = $conn->Add_Role($role);
        if($result){
            echo json_encode(['check'=>true,'message'=>'Thêm bản ghi thành công']);
        }else{
            echo json_encode(['check'=>false,'message'=>'Thêm bản ghi thất bại']);
        }
    }
?>