<?php
    require_once './Model/Admin_DecorModel.php';
    class Admin_DecorController{
        private $model = null;
        public function __construct(){
            $this->model = new Admin_DecorModel();
        }
        public function ShowDecor_Limit($limit,$offset){
            $result = $this->model->ShowDecor_Limit($limit,$offset);
            return $result;
        }
        public function CountDecor(){
            $result = $this->model->CountDecor();
            return $result;
        }
        public function ShowDecor($id){
            $result = $this->model->ShowDecor($id);
            return $result;
        }
    }
?>