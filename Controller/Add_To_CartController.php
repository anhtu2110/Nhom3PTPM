<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Nhom3PTPM/Model/Add_To_CartModel.php';

class Cart_Controller {
    private $model = null;

    public function __construct() {
        $this->model = new Cart_Model();
    }

    public function Show_CartController($UserID) {
        $result = $this->model->Show_CartModel($UserID);
        return $result;
    }

    public function Update_Tmp_Order_ChuyenController($ProductID, $quantity, $username, $total_price) {
        $result = $this->model->Update_Tmp_Order_Chuyen($ProductID, $quantity, $username, $total_price);
        return $result;
    }
    public function Update_Quantity_SoldDetail($quantity,$IDDetail){
        $result = $this->model->Update_Quantity_SoldDetail($quantity,$IDDetail);
        return $result;
    }
    public function Get_Total_Price_Controller($UserID) {
        $result = $this->model->Get_Total_Price($UserID);
        return $result;  
    }
    public function Get_Total_Price_Product_Status_Null_Controller($UserID) {
        $result = $this->model->Get_Total_Price_Product_Status_Null($UserID);
        return $result;  
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['FormData'])) {
        $orders = $input['FormData'];
        foreach ($orders as $order) {
            $ProductID = $order['ProductID'];
            $quantity = $order['Quantity'];
            $username = $order['UserName'];
            $total_price = $order['Total_Price'];
            $detail_id = $order['IDDetail'];
            $controller = new Cart_Controller();
            $controller->Update_Quantity_SoldDetail($quantity,$detail_id);
            $controller->Update_Tmp_Order_ChuyenController($ProductID, $quantity, $username, $total_price);
        }
        echo json_encode(['check' => true]);
    } else {
        echo json_encode(['check' => false, 'message' => 'Invalid FormData']);
    }
}
?>