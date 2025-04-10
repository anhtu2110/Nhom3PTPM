<?php
session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Model/Add_To_CartModel.php';
    class Cart_Controller{
        private $model = null;
        public function __construct(){
            $this->model = new Cart_Model();
        }
        public function Save_Tmp_OrderController($Title, $ProductID, $UserID, $username, $price, $quantity, $total_price){
            $result = $this->model->Save_Tmp_Order($Title, $ProductID, $UserID, $username, $price, $quantity, $total_price);
            return $result;
        }
        public function check_product_exist_with_UserID_Controller($UserID, $ProductID) {
            $result = $this->model->check_product_exist_with_UserID($UserID, $ProductID);
            return $result;
        }
        public function check_product_exist_to_add_order_Controller($UserID, $ProductID) {
            $result = $this->model->check_product_exist_to_add_order($UserID, $ProductID);
            return $result;
        }
        public function check_product_exist_to_new_order_Controller($UserID, $ProductID) {
            $result = $this->model->check_product_exist_to_new_order($UserID, $ProductID);
            return $result;
        }
        public function get_quantity_product_exist_Controller($UserID, $ProductID) {
            $result = $this->model->get_quantity_product_exist($UserID, $ProductID);
            return $result;
        }
        public function Update_Quantity_Product_Exist_Controller($UserID, $ProductID, $quantity, $total_price) {
            $result = $this->model->Update_Quantity_Product_Exist($UserID, $ProductID, $quantity, $total_price);
            return $result;
        }
        public function Update_Quantity_Product_Exist_Status_Null_Controller($UserID, $ProductID, $quantity, $total_price) {
            $result = $this->model->Update_Quantity_Product_Exist_Status_Null($UserID, $ProductID, $quantity, $total_price);
            return $result;
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){   
        $controller = new Cart_Controller();
        $UserID = $_SESSION['userID'];
        $username = $_SESSION['userName'];
        $ProductID = $_POST['ProductID'];
        $Price = $_POST['Price'];
        $Title = $_POST['Title'];
        if ($controller->check_product_exist_with_UserID_Controller($UserID, $ProductID)) {
            if($controller->check_product_exist_to_add_order_Controller($UserID, $ProductID) > 0) {
                $quantity = $controller->check_product_exist_to_add_order_Controller($UserID, $ProductID) + 1;
                $total_price = $quantity * $Price;
                $result = $controller->Update_Quantity_Product_Exist_Status_Null_Controller($UserID, $ProductID, $quantity, $total_price);
            } else {
                $quantity = 1;
                $total_price = $quantity * $Price;
                $result = $controller->Save_Tmp_OrderController($Title, $ProductID, $UserID, $username, $Price, $quantity, $total_price);
            }
        } else {
            $quantity = 1;
            $total_price = $quantity * $Price;
            $result = $controller->Save_Tmp_OrderController($Title, $ProductID, $UserID, $username, $Price, $quantity, $total_price);
        }
        
        if($result){
            //header('Content-Type: application/json');
            echo json_encode(['success'=>true,'message'=>'Thêm vào giỏ hàng thành công']);
        }else{
            //header('Content-Type: application/json');
            echo json_encode(['success'=>false,'message'=>'Không thể thêm vào giỏ hàng']);
        }
    }

?>