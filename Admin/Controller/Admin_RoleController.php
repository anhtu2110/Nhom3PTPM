<?php
    require_once './Model/Admin_RoleModel.php';
    class Admin_RoleController{
        private $model = null;
        public function __construct(){
            $this->model = new Admin_RoleModel();
        }
        public function show_Role_Limit($limit,$offset){
            $result = $this->model->show_Role_Limit($limit,$offset);
            return $result;
        }
        public function count_Role(){
            $result = $this->model->count_Role();
            return $result;
        }
        public function show_Role($id){
            $result = $this->model->show_Role($id);
            return $result;
        }
    }
?>