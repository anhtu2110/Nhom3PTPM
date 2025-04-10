<?php
    require_once '../Model/Admin_ProductModel.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/Admin/Model/Admin_DetailsModel.php';
    class Update_Product_Controller{
        private $model = null;
        private $modelDetail = null;

        public function __construct()
        {
            $this->model = new Admin_ProductModel();
            $this->modelDetail = new Admin_DetailModel();
        }
        public function Update_Product($ProductID,$Title,$Image,$OldPrice,$Price,$IsBestSeller,$ExtraTime,$IDDetail){
            return $this->model->Update_Product($ProductID,$Title,$Image,$OldPrice,$Price,$IsBestSeller,$ExtraTime,$IDDetail);
        }
        public function update_Details_ByProduct($IDDetail,$Title,$Image,$oldprice,$price){
            return $this->modelDetail->update_Details_ByProduct($IDDetail,$Title,$Image,$oldprice,$price);
        }
    }
    if(isset($_SERVER['REQUEST_METHOD'])&& $_SERVER['REQUEST_METHOD'] == 'POST'){
        $ProductID = $_POST['product_id'];
        $Title = $_POST['title'];
        $OldPrice = $_POST['oldPrice'];
        $Price = $_POST['currentPrice'];
        $IsBestSeller = $_POST['bestSeller'];
        $ExtraTime = $_POST['entryDate'];
        $IDDetail = $_POST['detailID'];

        if(isset($_FILES['image'])){
            
            $documentRoot = $_SERVER['DOCUMENT_ROOT'];
            $documenttg = '/img/';
            $dirimg = $documenttg.basename($_FILES['image']['name']);

            if(move_uploaded_file($_FILES['image']['tmp_name'],$documentRoot.$dirimg)){
                $controller = new Update_Product_Controller();
                $results = $controller->update_Details_ByProduct($IDDetail,$Title,"img/".basename($_FILES['image']['name']),$OldPrice,$Price);
                $result = $controller->Update_Product($ProductID,$Title,"img/".basename($_FILES['image']['name']),$OldPrice,$Price,$IsBestSeller,$ExtraTime,$IDDetail);
                if($results && $result){
                    header('Content-type: application/json');
                    echo json_encode(['check'=>true,'message'=>'Sửa thành công Sản Phẩm!']);
                }else{
                    header('Content-type: application/json');
                    echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình sửa!']);
                }
            }
        }else{
            $img = $_POST['image'];
            $controller = new Update_Product_Controller();
            $resultn = $controller->update_Details_ByProduct($IDDetail,$Title,$img,$OldPrice,$Price);
                $resultns = $controller->Update_Product($ProductID,$Title,$img,$OldPrice,$Price,$IsBestSeller,$ExtraTime,$IDDetail);
                if($resultns && $resultn){
                    header('Content-type: application/json');
                    echo json_encode(['check'=>true,'message'=>'Sửa thành công Sản Phẩm!']);
                }else{
                    header('Content-type: application/json');
                    echo json_encode(['check'=>false,'message'=>'Có lôĩ xảy ra trong quá trình sửa!']);
                }
        }
    }else{
        header('Content-type: application/json');
        echo json_encode(['check'=>false,'message'=>'Không có yêu cầu POST!']);
    }
?>