<?php
    require_once './Model/Admin_OrderModel.php';
    class Admin_OrderController{
        private $model = null;
        public function __construct(){
            $this->model = new Admin_OrderModel();
        }
        public function ShowOder_Limit($limit,$offset){
            $result = $this->model->ShowOder_Limit($limit,$offset);
            return $result;
        }
        public function getCount(){
            $result = $this->model->getCount();
            return $result;
        }
        public function ShowOrder($id){
            $result = $this->model->ShowOder($id);
            return $result;
        }
    }
?>