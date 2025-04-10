<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Model/Add_To_CartModel.php';
    class Delete_TmpOrder{
        private $model = null;
        public function __construct(){
            $this->model = new Cart_Model();
        }
        public function Delete_Tmp_Order_Controller($OrderID) {
            $result = $this->model->Delete_Tmp_Order($OrderID);
            return $result;
        }
        public function Delete_TmpOrder_Proudct_Status_Null_Controller($ProductID, $userID){
            $result = $this->model->Delete_Tmp_Product_Status_Null($ProductID, $userID);
            return $result;
        }
    }
    if(isset($_POST['OrderID'])){
        $OrderID = $_POST['OrderID'];
        $controller = new Delete_TmpOrder();
        $result = $controller->Delete_Tmp_Order_Controller($OrderID);
        if($result){
            echo json_encode(array('check'=>true));
        }
        else{
            echo json_encode(array('check'=>false));
        }
    }
    else{
        echo json_encode(array('check'=>false));
    }
?>