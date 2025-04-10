<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Admin/Model/Admin_CommentModel.php';
    class Update_CommentController{
        private $model = null;
        
        public function __construct(){
            $this->model = new Admin_CommentModel();
        }
        
        public function UpdateComment($id){
            $result = $this->model->UpdateComment($id);
            return $result;
        }
    }
    $controller = new Update_CommentController();
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $result = $controller->UpdateComment($id);
        if($result){
            header('content-type: application/json');
            echo json_encode(true);
        }else{
            header('content-type: application/json');
            echo json_encode(false);
        }
    }
?>