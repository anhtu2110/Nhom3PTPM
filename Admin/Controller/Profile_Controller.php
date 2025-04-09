<?php
    require_once './Model/Profile_Model.php';
    class Profile_Controller{
        private $model = null;

        public function __construct()
        {
            $this->model = new Profile_Model();
        }
        public function DisplayProfile_Controller($userid){
            return $this->model->SetProfile_Model($userid);
        }
    }
   
?>