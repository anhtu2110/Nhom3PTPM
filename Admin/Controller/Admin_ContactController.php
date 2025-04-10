<?php
    require_once './Model/Admin_ContactModel.php';
    class Admin_ContactController{
       private $model = null;

        public function __construct()
        {
            $this->model = new Admin_ContactModel();
        }

        public function Display_ContactController($limit,$offset){
            return $this->model->Show_ContactModel($limit,$offset);
        }
        public function getTotal_Contacts(){
            return $this->model->getTotal_Contact();
        }
        public function Display_Contact($ContactID){
            return $this->model->Show_Contact($ContactID);
        }
    }
?>