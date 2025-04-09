<?php 
    require_once '../Model/Admin_ProductModel.php';
    class Add_Product_Controller{
        private $model = null;

        public function __construct()
        {
            $this->model = new Admin_ProductModel();
        }
        public function Add_Product($Title,$img,$oldprice,$price,$isbestseller,$extratime,$IDDetail){
            return $this->model->Add_ProductModel($Title,$img,$oldprice,$price,$isbestseller,$extratime,$IDDetail);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $Title = $_POST['Title'];
        $oldprice = $_POST['OldPrice'];
        $price = $_POST['Price'];
        $isbestseller = $_POST['IsBestSeller'];
        $extratime = $_POST['ExtraTime'];
        $IDDetail = $_POST['IDDetail'];
        $img = $_POST['file'];

        $controller = new Add_Product_Controller();
        $result = $controller->Add_Product($Title,$img,$oldprice,$price,$isbestseller,$extratime,$IDDetail);
        if($result){
            header('Content-type: application/json');
            echo json_encode(['check'=>true,'message'=>'Thêm thành công sản phẩm vào cơ sở dữ liệu!']);
        }else{
            header('Content-type: application/json');
            echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình thêm!']);
        }
    }
    ?>