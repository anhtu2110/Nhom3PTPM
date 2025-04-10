<?php
    require_once '../Model/Admin_OrderModel.php';
    class Update_OrderController{
        private $model = null;
        public function __construct(){
            $this->model = new Admin_OrderModel();
        }
        public function UpdateOrder($OrderID,$status){
            $result = $this->model->UpdateOrder($OrderID,$status);
            return $result;
        }
    }
    if(isset($_POST['OrderID']) && isset($_POST['status'])){
        $OrderID = $_POST['OrderID'];
        $status = $_POST['status'];
        $controller = new Update_OrderController();
        $result = $controller->UpdateOrder($OrderID,$status);
        if($result){
            header('Content-Type: application/json');
            echo json_encode(['check'=>true]);
        }else{
            header('Content-Type: application/json');
            echo json_encode(['check'=>false]);
        }
    }
?>