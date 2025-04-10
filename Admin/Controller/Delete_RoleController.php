<?php
    require_once '../Model/Admin_RoleModel.php';
    class Delete_RoleController{
        private $model = null;
        public function __construct(){
            $this->model = new Admin_RoleModel();
        }
        public function Delete_Role($id){
            $result = $this->model->Delete_Role($id);
            return $result;
        }
    }
    if(isset($_POST['IDRole'])){
        $IDRole = $_POST['IDRole'];
        $conn = new Delete_RoleController();
        $result = $conn->Delete_Role($IDRole);
        if($result){
            echo json_encode(['check'=>true,'message'=>'Xóa bản ghi thành công']);
        }else{
            echo json_encode(['check'=>false,'message'=>'Xóa bản ghi thất bại']);
        }
    }
?>