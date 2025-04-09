<?php 
    require_once './Model/Admin_ProductModel.php';
    class Admin_Product_Controller{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_ProductModel();
        }
        public function Display_Product($limit,$offset){
            return $this->model->ShowProductLimit($limit,$offset);
        }
        public function ShowTotal_Product(){
            return $this->model->GetTotal_Product();
        }
        public function DisPlay_ProductID(){
            return $this->model->showAdd_Product();
        }
        public function Display_ProductUpdate($productID){
            return $this->model->show_Product($productID);
        }
    }
?>