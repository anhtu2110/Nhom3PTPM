<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Model/CommentModel.php';
    class CommentController{
        private $commentModel = null;
        public function __construct()
        {
            $this->commentModel = new CommentModel();
        }
        public function showComment($DetailssID){
            $result = $this->commentModel->showComment($DetailssID);
            return $result;
        }
        public function Save_Comment($DetailID,$UserName,$Image,$Content,$Star,$Date){
            $result = $this->commentModel->Save_Comment($DetailID,$UserName,$Image,$Content,$Star,$Date);
            return $result;
        }
    }
    if(isset($_POST['rating'])){
        $DetailID = $_POST['DetailsID'];
        $UserName = $_POST['UserName'];
        $Image = $_POST['Image'];
        $Content = $_POST['textarea'];
        $Star = $_POST['rating'];
        $Date = $_POST['Date'];
        $commentController = new CommentController();
        $result = $commentController->Save_Comment($DetailID,$UserName,$Image,$Content,$Star,$Date);
        if($result){
           header('content-type: application/json');
              echo json_encode(true);
        }else{
            header('content-type: application/json');
            echo json_encode(false);
        }
    }
?>