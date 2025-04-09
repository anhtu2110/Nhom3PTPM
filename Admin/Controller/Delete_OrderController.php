<?php
    require_once '../Model/Admin_OrderModel.php';
    class   Delete_OrderController{
        private $model = null;
        public function __construct(){
            $this->model = new Admin_OrderModel();
        }
        public function DeleteOrder($OrderID){
            $result = $this->model->DeleteOrder($OrderID);
            return $result;
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $OrderID = $_POST['OrderID'];
        if($OrderID == 1){
            header('Content-type: application/json');
            echo json_encode(['check' => false,'message'=>'Không thể xóa đơn hàng này']);
        }else{
            $controller = new Delete_OrderController();
            $result = $controller->DeleteOrder($OrderID);
            if($result){
                header('Content-type: application/json');
                echo json_encode(['check' => true,'message'=>'Xóa đơn hàng thành công']);
            }else{
                header('Content-type: application/json');
                echo json_encode(['check' => false,'message'=>'Xóa đơn hàng thất bại']);
            }
        }
    }
?>