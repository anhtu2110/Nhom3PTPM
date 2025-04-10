<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Model/Add_To_CartModel.php';

    class Update_Controller {
        private $model = null;
        public function __construct() {
            $this->model = new Cart_Model();
        }

        public function Update_Quantity_Product_Exist_Status_Null_Controller($UserID, $ProductID, $quantity, $total_price) {
            $result = $this->model->Update_Quantity_Product_Exist_Status_Null($UserID, $ProductID, $quantity, $total_price);
            return $result;
        }
        public function Get_Total_Price_Product_Status_Null_Controller($UserID) {
            $result = $this->model->Get_Total_Price_Product_Status_Null($UserID);
            return $result;
        }
    }

    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){   
        $controller = new Update_Controller();
        $UserID = $_SESSION['userID'];
        $quantity = $_POST['quantity'];
        $ProductID = $_POST['product_id'];
        $price = $_POST['price'];
        $total_price = $price * $quantity;
        $controller->Update_Quantity_Product_Exist_Status_Null_Controller($UserID, $ProductID, $quantity, $total_price);
        // if($result){
        //     header('Content-Type: application/json');
        //     echo json_encode(['success'=>true,'message'=>'Thêm vào giỏ hàng thành công']);
        // }else{
        //     header('Content-Type: application/json');
        //     echo json_encode(['success'=>false,'message'=>'Không thể thêm vào giỏ hàng']);
        // }
        $total_prices = number_format($controller->Get_Total_Price_Product_Status_Null_Controller($UserID), 0, ",", ".") . " VND";
        echo $total_prices;
    }
?>