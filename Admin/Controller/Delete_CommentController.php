<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Admin/Model/Admin_CommentModel.php';
    class Delete_CommentController{
        private $model = null;
        
        public function __construct(){
            $this->model = new Admin_CommentModel();
        }
        
        public function DeleteComment($id){
            $result = $this->model->DeleteComment($id);
            return $result;
        }
    }
    $controller = new Delete_CommentController();
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $result = $controller->DeleteComment($id);
        if($result){
            header('content-type: application/json');
            echo json_encode(true);
        }else{
            header('content-type: application/json');
            echo json_encode(false);
        }
    }
?>