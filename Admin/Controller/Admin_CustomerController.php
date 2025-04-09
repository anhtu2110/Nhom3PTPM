<?php
    require_once './Model/Admin_CustomerModel.php';
    class Admin_CustomerController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_CustomerModel();
        }

        public function Display_Customer($limit,$offset){
            return $this->model->Show_Customers($limit,$offset);
        }
        
        public function getCount_Customer(){
            return $this->model->getTotal_Customer();
        }
        public function Show_CustomerID($CustomerID){
            return $this->model->Show_Customer($CustomerID);
        }
    }
?>