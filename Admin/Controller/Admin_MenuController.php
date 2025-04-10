<?php
    require_once './Model/Admin_MenuModel.php';
    class Admin_MenuController{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_MenuModel();
        }
        public function ShowLimitMenu($limit,$offset){
            return $this->model->ShowMenuLimit($limit,$offset);
        }
        public function setCount(){
            return $this->model->setCount();
        }
        public function ShowMenu_TheoID($menuID){
            return $this->model->Show_Menu($menuID);
           }
    }
?>