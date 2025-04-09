<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Admin/Model/Admin_export_VTA_model.php';
    class Admin_VTA_Controller{
        private $model = null;
        public function __construct()
        {
            $this->model = new Admin_export_VTA_model();
        }
        public function export_VTA($orderID){
            $result = $this->model->export_VTA($orderID);
            return $result;
        }
    }
?>