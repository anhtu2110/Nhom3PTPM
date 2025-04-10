<?php
    require_once './Model/Admin_CategoryModel.php';
    class Admin_CategoryController {
        private $model = null;
        public function __construct() {
            $this->model = new Admin_CategoryModel();
        }
        public function ShowCategory_Limit($limit, $offset) {
            $data = $this->model->ShowCategory_Limit($limit, $offset);
            return $data;
        }
        public function get_Count(){
            $data = $this->model->get_Count();
            return $data;
        }
        public function ShowCategoryID($CategoryID){
            $data = $this->model->showCateGoryID($CategoryID);
            return $data;
        }
    }
?>