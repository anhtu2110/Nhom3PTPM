<?php
    require_once './Model/Admin_BlogModel.php';
    class Admin_BlogController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_BlogModel();
        }
        public function Display_BlogController($limit,$offset){
            return $this->model->PhanTrang_Blog($limit,$offset);
        }
        public function getCount(){
            return $this->model->getTotal_Model();
        }
        public function Display_BlogControllers($blogID){
            return $this->model->Show_Blog($blogID);
        }
    }

?>