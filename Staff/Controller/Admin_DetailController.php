<?php
    require_once './Model/Admin_DetailsModel.php';
    class Admin_DetailController{
        private $model = null;
        public function __construct()
        {
            $this->model = new Admin_DetailModel();
        }
        public function getCount(){
            $result = $this->model->getCount();
            return $result;
        }
        public function showDetail_Limit($limit,$offset){
            $result = $this->model->showDetail_Limit($limit,$offset);
            return $result;
        }
        public function showDetail_update($DetailID){
            $result = $this->model->Show_DetailUpdate($DetailID);
            return $result;
        }
    }
?>