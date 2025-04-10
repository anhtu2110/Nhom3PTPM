<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/MyHouseDecor/Admin/Model/Admin_CommentModel.php';
    class Admin_CommentController{
        private $model = null;
        
        public function __construct(){
            $this->model = new Admin_CommentModel();
        }
        
        public function showComment($limit,$offset){
            $result = $this->model->showComment($limit,$offset);
            return $result;
        }
        public function getCount(){
            $result = $this->model->getCount();
            return $result;
        }
        public function getNameProduct($id) {
            $result = $this->model->getNameProduct($id);
            return $result;
        }
    }
?>