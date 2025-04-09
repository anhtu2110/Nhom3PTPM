<?php
    require_once './Model/Admin_UserModel.php';
    class Admin_UserController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_UserModel();
        }
        public function Display_AdminUser($limit,$offset){
            return $this->model->Show_UserModel($limit,$offset);
        }
        public function Display_Update_Staff_Controller($userID){
            return $this->model->Show_Staff($userID);
        }
    } 

    ?>  